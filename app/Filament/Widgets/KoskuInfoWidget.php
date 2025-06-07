<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class KoskuInfoWidget extends Widget
{
    protected static string $view = 'filament.widgets.kosku-info-widget';

    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 1,
    ];
}
