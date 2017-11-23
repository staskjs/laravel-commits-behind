# Laravel Commits Behind

## Installation

    composer require staskjs/laravel-commits-behind

If you are using laravel 5.5+, package will be automatically registered.

If not, then add `Staskjs\CommitsBehind\CommitsBehindServiceProvider` to `config/app.php`

`php artisan commits-behind` command will be registered, as well as `/debug/commits-behind` route.

## Usage

`php artisan commits-behind --branch=develop --type=local`

Use type `local` when git folder is directly in the root folder

Use type `cap` is you are deployed with capistrano

Same parameters go for route, just pass them as get params.
