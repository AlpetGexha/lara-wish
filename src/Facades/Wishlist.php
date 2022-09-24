<?php

namespace AlpetG\Wishlist\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AlpetG\Wishlist\Wishlist
 */
class Wishlist extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AlpetG\Wishlist\Wishlist::class;
    }
}
