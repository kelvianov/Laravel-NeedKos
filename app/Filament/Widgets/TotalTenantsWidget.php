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

    public function mount(): void
    {
        $this->totalTenants = User::where('role', 'tenant')->count();
    }

      public static function shouldRender(): bool
{
    $user = Auth::user();
    return $user && $user->role === 'admin';
}
}
