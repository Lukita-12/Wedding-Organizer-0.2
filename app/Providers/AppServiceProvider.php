<?php

namespace App\Providers;

use App\Models\Kerjasama;
use App\Models\PaketPernikahan;
use App\Models\Pelanggan;
use App\Models\RequestMitra;
use App\Policies\KerjasamaPolicy;
use App\Policies\PaketPernikahanPolicy;
use App\Policies\PelangganPolicy;
use App\Policies\RequestMitraPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::policy(Pelanggan::class, PelangganPolicy::class);
        Gate::policy(RequestMitra::class, RequestMitraPolicy::class);
        Gate::policy(Kerjasama::class, KerjasamaPolicy::class);
        Gate::policy(PaketPernikahan::class, PaketPernikahanPolicy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
}
