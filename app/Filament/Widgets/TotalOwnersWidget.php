<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TotalOwnersWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-owners-widget';
    protected static bool $isLazy = false;
    protected int | string | array $columnSpan = 1;
    protected static ?int $sort = 1; // Posisi pertama setelah Total Kos dihapus

    public int $totalOwners;
    public $ownerTrendUp; // bisa int atau string ('baru')

    public function mount(): void
    {
        $this->totalOwners = User::where('role', 'owner')->count();

        $currentMonth = now()->format('m');
        $lastMonth = now()->subMonth()->format('m');

        $thisMonthOwners = User::where('role', 'owner')
            ->whereMonth('created_at', $currentMonth)
            ->count();

        $lastMonthOwners = User::where('role', 'owner')
            ->whereMonth('created_at', $lastMonth)
            ->count();

        if ($lastMonthOwners == 0 && $thisMonthOwners == 0) {
            $this->ownerTrendUp = 0;
        } elseif ($lastMonthOwners == 0 && $thisMonthOwners > 0) {
            $this->ownerTrendUp = 'baru';
        } else {
            $this->ownerTrendUp = round((($thisMonthOwners - $lastMonthOwners) / $lastMonthOwners) * 100);
        }    }

    public static function canView(): bool
    {
        return Auth::user()->role === 'admin';
    }
}
