<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Kos;

class TotalKosWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-kos-widget';
    protected static bool $isLazy = false;

    public int $totalKos;

    public function mount(): void
    {
        $this->totalKos = Kos::count();
    }
}
