<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.partials.header', function ($view) {
            $view->with('categories', Category::orderBy('name', 'ASC')->get());
        });

    }
    }
