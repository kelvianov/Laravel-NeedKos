<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use App\Filament\Widgets\TotalOwnersWidget;
use App\Filament\Widgets\TotalTenantsWidget;
use App\Filament\Widgets\PlatformStatsWidget;
use App\Filament\Widgets\RecentReportsWidget;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->authGuard('web')
            ->brandName('Kosku Admin')
         ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Slate,
                'success' => Color::Green,
                'warning' => Color::Amber,
                'danger' => Color::Red,
                'gray' => Color::Gray,
            ]) 
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,  // pastikan ini adalah dashboard bawaan Filament (hapus kustom kamu)
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                \App\Filament\Widgets\KoskuInfoWidget::class,
                TotalOwnersWidget::class,
                TotalTenantsWidget::class,
                PlatformStatsWidget::class,
                RecentReportsWidget::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    // Override method navigationItems untuk pastikan "Dashboard" arahkan ke /admin
    public function getNavigation(): array
    {
        return [
            // Link dashboard ke /admin langsung
            \Filament\Navigation\NavigationItem::make('Dashboard')
                ->url('/admin')
                ->icon('heroicon-o-home'),

            // Contoh resource navigation (Kos)
            \Filament\Navigation\NavigationGroup::make('Master Data')
                ->items([
                    \Filament\Navigation\NavigationItem::make('Kos')
                        ->url('/admin/kos')
                        ->icon('heroicon-o-building'),
                ]),
        ];
    }
}
