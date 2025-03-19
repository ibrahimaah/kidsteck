<?php

namespace App\Providers;

use App\Models\Story;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share footer data to all views
        View::composer('partials.site._footer', function ($view) 
        {
            $stories = Story::active()->select('id', 'title')->get();
            // dd($stories);
            $view->with('stories', $stories);
        });
    }
}
