<?php

namespace AlpetG\Wishlist;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AlpetG\Wishlist\Commands\WishlistCommand;

class WishlistServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('wishlist')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_wishlist_table')
            ->hasCommand(WishlistCommand::class);
    }
}
