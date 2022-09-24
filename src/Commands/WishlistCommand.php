<?php

namespace AlpetG\Wishlist\Commands;

use Illuminate\Console\Command;

class WishlistCommand extends Command
{
    public $signature = 'wishlist';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
