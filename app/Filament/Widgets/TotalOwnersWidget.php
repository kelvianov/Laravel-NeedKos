<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TotalOwnersWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-owners-widget';
    protected static bool $isLazy = false;

    public int $totalOwners;

    public function mount(): void
    {
        $this->totalOwners = User::where('role', 'owner')->count();
    }

    public static function shouldRender(): bool
{
    $user = Auth::user();
    return $user && $user->role === 'admin';
}

}
