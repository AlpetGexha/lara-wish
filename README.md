# Laravel Wishlist

Make Eloquent Model models wishlistable

# Installation

You can install the package via composer:

```bash
composer require alpetg/wishlist
```

### Migrations
You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="wishlist-migrations"
php artisan migrate
```

### Configuration
You can publish the config file with:

```bash
php artisan vendor:publish --tag="wishlist-config"
```

# Usage
### Prepare Models

Add `Wishlist` on User Model 

```php
use AlpetG\Wishlist\Traits\Wishlist;

class User extends Authenticatable
{
    use Wishlist;
    
    <...>
}
```
Add `Wishlistable` on every model u want have wishlist on

```php
use AlpetG\Wishlist\Traits\Wishlistable;

class Products extends Model
{
    use Wishlistable;
    
    <...>
}

```
### API

```php
$user    = User::find(1);
$product = Product::find(3);

$user->wish($product);
$user->unwish($product);
$user->toggleWishlist($product);

//Or Dircet from product

$product->wish()
$product->unwish()
$product->toggleWishlist()
```

#### Aggregations
```php
// All
$user->->wishlist()->count();
//or
$user->wishlistCount();

// with type
$user->wishlist()->withType(Product::class)->count(); 
```

#### List with `*_count` attribute:

```
$user = User::withCount('wishlist')->get();

    foreach ($user_count as $user) {
        echo $user->wishlist_count;
    }
```


### Attach the Wishlist status to wishlistable collection

You can use `Wishlist::attachWishlistStatus(Collection $wishlists)` to attach the user Wishlist status, it will set `is_wishlisted` attribute to each model of `$wishlists`:

#### For model

```php
$user1 = User::find(1);

$user->attachWishlistStatus($user1);

// result
[
    "id" => 1
    "name" => "user1"
    "created_at" => "2022-09-24T23:06:47.000000Z"
    "updated_at" => "2022-09-24T23:06:47.000000Z"
    "is_wishlisted" => true  
  ]
```

#### For `Collection | Paginator | LengthAwarePaginator | array`:

```php
$user = auth()->user();

$products = Product::oldest('id')->get();

$products = $user->attachWishlistStatus($products);

$products = $products->toArray();

// result
[
  [
    "id" => 1
    "title" => "product 1"
    "created_at" => "2022-09-24T23:06:47.000000Z"
    "updated_at" => "2022-09-24T23:06:47.000000Z"
    "is_wishlisted" => true  
  ],
  [
    "id" => 2
    "title" => "product 2"
    "created_at" => "2022-09-24T23:06:47.000000Z"
    "updated_at" => "2022-09-24T23:06:47.000000Z"
    "is_wishlisted" => true
  ],
  [
    "id" => 3
    "title" => "product 3"
    "created_at" => "2022-09-24T23:06:47.000000Z"
    "updated_at" => "2022-09-24T23:06:47.000000Z"
    "is_wishlisted" => false
  ],
]
```

#### For pagination

```php
$products = Product::paginate(10);

$user->attachWishlistStatus($products);
```

#### Easy Way to Use
```php
$products = Product::paginate(10);

$user->getMyWish($products);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Alpet Gexha](https://github.com/AlpetG)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
