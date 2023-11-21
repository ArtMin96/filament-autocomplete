<?php

namespace ArtMin96\FilamentAutocomplete;

use Filament\PluginServiceProvider;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;

class FilamentAutocompleteServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-autocomplete';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-filament-autocomplete' => __DIR__ . '/../resources/dist/filament-autocomplete.css',
    ];

    protected array $scripts = [
        'plugin-filament-autocomplete' => __DIR__ . '/../resources/dist/filament-autocomplete.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-filament-autocomplete' => __DIR__ . '/../resources/dist/filament-autocomplete.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('filament-autocomplete', __DIR__ . '/../dist/css/filament-autocomplete.css')->loadedOnRequest(),
            AlpineComponent::make('filament-autocomplete', __DIR__ . '/../dist/js/filament-autocomplete.js'),
        ], package: 'artmin96/filament-autocomplete');
    }
}
