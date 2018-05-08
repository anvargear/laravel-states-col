# Laravel Departaments And Cities (Colombia)

[![Total Downloads](https://poser.pugx.org/anvargear/laravel-states-col/downloads.svg)](https://packagist.org/packages/anvargear/laravel-states-col)
[![Latest Stable Version](https://poser.pugx.org/anvargear/laravel-states-col/v/stable.svg)](https://packagist.org/packages/anvargear/laravel-states-col)
[![Latest Unstable Version](https://poser.pugx.org/anvargear/laravel-states-col/v/unstable.svg)](https://packagist.org/packages/anvargear/laravel-states-col)

Laravel Departaments and Cities Colombia is a bundle for Laravel, providing Almost ISO 3166_3, Dane Code and Capital

## Installation

Add `anvargear/laravel-states-col` to `composer.json`.

    "anvargear/laravel-states-col": "dev-master"
    
Run `composer update` to pull down the latest version of Departaments and Cities Colombia List.

**If you're using Laravel 5.5, you don't have to edit `app/config/app.php`.**

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => [
        'AnvaGear\States\StatesServiceProvider',
    ]

Now add the alias.

    'aliases' => [
        'StatesCol' => 'AnvaGear\States\StatesFacade',
    ]
    
## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `Colstates` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish
    
Next generate the migration file:

    $ php artisan countries:migration
    $ composer dump-autoload    