<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Kos;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PlatformStatsWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public static function canView(): bool
    {
        return Auth::user()->role === 'admin';
    }

    protected function getStats(): array
    {
        // Calculate monthly growth
        $thisMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();

        $currentUsers = User::whereMonth('created_at', $thisMonth->month)->count();
        $lastMonthUsers = User::whereMonth('created_at', $lastMonth->month)->count();
        $userGrowth = $lastMonthUsers > 0 ? round((($currentUsers - $lastMonthUsers) / $lastMonthUsers) * 100) : 0;

        $currentKos = Kos::whereMonth('created_at', $thisMonth->month)->count();
        $lastMonthKos = Kos::whereMonth('created_at', $lastMonth->month)->count();
        $kosGrowth = $lastMonthKos > 0 ? round((($currentKos - $lastMonthKos) / $lastMonthKos) * 100) : 0;

        $pendingReports = Report::where('status', 'pending')->count();
        $activeKos = Kos::whereNull('deleted_at')->count();

        return [
            Stat::make('Total Users', User::count())
                ->description($userGrowth >= 0 ? "+{$userGrowth}% from last month" : "{$userGrowth}% from last month")
                ->descriptionIcon($userGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($userGrowth >= 0 ? 'success' : 'danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Active Properties', $activeKos)
                ->description($kosGrowth >= 0 ? "+{$kosGrowth}% growth" : "{$kosGrowth}% decline")
                ->descriptionIcon($kosGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($kosGrowth >= 0 ? 'success' : 'danger')
                ->chart([15, 4, 10, 2, 12, 4, 12]),

            Stat::make('Pending Reports', $pendingReports)
                ->description($pendingReports > 5 ? 'Needs attention' : 'Under control')
                ->descriptionIcon($pendingReports > 5 ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-circle')
                ->color($pendingReports > 5 ? 'warning' : 'success')
                ->chart([3, 1, 4, 2, 1, 3, $pendingReports]),
        ];
    }
}
