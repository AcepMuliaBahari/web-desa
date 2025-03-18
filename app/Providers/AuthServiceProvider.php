<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\VillageRegulation;
use App\Policies\VillageRegulationPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }

    /**
     * Register policies.
     *
     * @return void
     */
    protected function registerPolicies()
    {
        $this->policies = [
            VillageRegulation::class => VillageRegulationPolicy::class,
        ];
    }
} 