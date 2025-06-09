<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Kos;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TotalKosWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-kos-widget';

    public int $totalKos;
    public int $activeKos;
    public int $availableRooms;
    public string $trendStatus;
    public int $trendPercentage;
    public string $lastUpdated;

    public function mount(): void
    {
        $user = Auth::user();

        if ($user && $user->role === 'owner') {
            // Data untuk owner spesifik
            $this->totalKos = Kos::where('user_id', $user->id)->count();
            $this->activeKos = Kos::where('user_id', $user->id)
                                  ->whereNull('deleted_at')
                                  ->count();
            
            // Hitung trend bulanan untuk owner
            $currentMonth = Kos::where('user_id', $user->id)
                               ->whereMonth('created_at', Carbon::now()->month)
                               ->count();
            $lastMonth = Kos::where('user_id', $user->id)
                            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                            ->count();
        } else {
            // Data untuk admin (semua kos)
            $this->totalKos = Kos::count();
            $this->activeKos = Kos::whereNull('deleted_at')->count();
            
            // Hitung trend bulanan untuk admin
            $currentMonth = Kos::whereMonth('created_at', Carbon::now()->month)->count();
            $lastMonth = Kos::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        }

        // Hitung available rooms dari semua kos aktif
        $this->availableRooms = $this->activeKos;

        // Tentukan trend
        if ($lastMonth == 0) {
            $this->trendStatus = 'new';
            $this->trendPercentage = 100;
        } else {
            $diff = $currentMonth - $lastMonth;
            $this->trendPercentage = round(($diff / $lastMonth) * 100);
            $this->trendStatus = $diff >= 0 ? 'up' : 'down';
        }

        $this->lastUpdated = Carbon::now()->format('H:i');
    }

    protected function getViewData(): array
    {
        return [
            'totalKos' => $this->totalKos,
            'activeKos' => $this->activeKos,
            'availableRooms' => $this->availableRooms,
            'trendStatus' => $this->trendStatus,
            'trendPercentage' => $this->trendPercentage,
            'lastUpdated' => $this->lastUpdated,
        ];
    }
}
