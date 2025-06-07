<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Kos;
use Illuminate\Support\Facades\Auth;

class TotalKosWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-kos-widget';

    public int $totalKos;

    public function mount(): void
    {
        $user = Auth::user();

        if ($user && $user->role === 'owner') {
            $this->totalKos = Kos::where('user_id', $user->id)->count();
        } else {
            $this->totalKos = Kos::count();
        }
    }
}
