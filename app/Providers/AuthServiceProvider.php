<?php

namespace App\Providers;

use App\Models\Kos;
use App\Policies\KosPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Kos::class => KosPolicy::class,
    ];

    public function boot(): void
    {
        //
    }
}
