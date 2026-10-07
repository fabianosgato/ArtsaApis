<?php

namespace App\Providers;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Força o Filament a reconhecer que as classes do Tailwind v4 vêm do seu app.css principal
        FilamentAsset::register([
            Css::make('custom-theme', asset('build/assets/app.css')), // Ajuste se não usar a pasta build padrão
        ]);

        // Força o Filament a renderizar modais e tabelas usando classes flexíveis de espaçamento
        FilamentView::spa();

    }
}
