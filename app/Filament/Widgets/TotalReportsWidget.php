<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class TotalReportsWidget extends ChartWidget
{
    protected static ?string $heading = 'Report Status Overview';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 1;

    public static function canView(): bool
    {
        return Auth::user()->role === 'admin';
    }

    protected function getData(): array
    {
        $pending = Report::where('status', 'pending')->count();
        $inProgress = Report::where('status', 'in_progress')->count();
        $resolved = Report::where('status', 'resolved')->count();
        $closed = Report::where('status', 'closed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Reports',
                    'data' => [$pending, $inProgress, $resolved, $closed],
                    'backgroundColor' => [
                        '#f59e0b', // pending - amber
                        '#3b82f6', // in_progress - blue
                        '#10b981', // resolved - green
                        '#6b7280', // closed - gray
                    ],
                    'borderWidth' => 0,
                ],
            ],
            'labels' => ['Pending', 'In Progress', 'Resolved', 'Closed'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'maintainAspectRatio' => false,
        ];
    }
}
