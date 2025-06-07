<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TotalTenantsWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-tenants-widget';
    protected static bool $isLazy = false;

    public int $totalTenants;
    public int|string $tenantTrendUp;

    public function mount(): void
    {
        $this->totalTenants = User::where('role', 'tenant')->count();

        $currentMonth = now()->format('m');
        $lastMonth = now()->subMonth()->format('m');

        $thisMonthTenants = User::where('role', 'tenant')
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $lastMonthTenants = User::where('role', 'tenant')
            ->whereMonth('created_at', $lastMonth)
            ->count();

        if ($lastMonthTenants > 0) {
            $this->tenantTrendUp = round((($thisMonthTenants - $lastMonthTenants) / $lastMonthTenants) * 100);
        } elseif ($thisMonthTenants > 0) {
            $this->tenantTrendUp = 'baru';
        } else {
            $this->tenantTrendUp = 0;
        }
    }

    public static function shouldRender(): bool
    {
        $user = Auth::user();
        return $user && $user->role === 'admin';
    }
}
