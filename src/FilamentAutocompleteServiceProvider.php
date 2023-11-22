<?php

namespace ArtMin96\FilamentAutocomplete;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAutocompleteServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-autocomplete';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        FilamentAsset::register([
            Css::make('filament-autocomplete', __DIR__ . '/../dist/css/filament-autocomplete.css')->loadedOnRequest(),
            AlpineComponent::make('filament-autocomplete', __DIR__ . '/../dist/js/filament-autocomplete.js'),
        ], package: 'artmin96/filament-autocomplete');
    }
}
