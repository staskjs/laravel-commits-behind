<?php

namespace Staskjs\CommitsBehind;

use Illuminate\Support\ServiceProvider;

class CommitsBehindServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->commands([
            Commands\CommitsBehind::class,
        ]);
        \Route::get('/debug/commits-behind', 'Staskjs\CommitsBehind\CommitsBehindController@show');
    }
}
