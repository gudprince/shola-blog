<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        Gate::define('super_admin', function (User $user) {
            return $user->user_type == 'super_admin' 
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });
        Gate::define('editor', function (User $user) {
            return $user->user_type == 'super_admin' ||  $user->user_type == 'editor'
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });

        Gate::define('support_team', function (User $user, Post $post) {
            return $user->user_type == 'super_admin' ||  $user->user_type == 'editor' || ($user->id == $post->user_id && $post->published == 0)
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });

        Gate::define('can_delete', function (User $user, Post $post) {
            return $user->user_type == 'super_admin' ||  $user->user_type == 'editor' 
            ||  $user->user_type == 'admin' || $post->user_id == $user->id    
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });

        
        Gate::define('can_delete_comment', function (User $user, Comment $comment) {
            return $user->user_type == 'super_admin' ||  $user->user_type == 'editor' 
            ||  $user->user_type == 'admin' || $comment->user_id == $user->id    
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });

        Gate::define('can_update', function (User $user, Post $post) {
            return $user->user_type == 'super_admin' ||  $user->user_type == 'editor' 
            ||  $user->user_type == 'admin' || $post->user_id == $user->id    
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });

        Gate::define('can_edit', function (User $user, Post $post) {
            return $user->user_type == 'super_admin' ||  $user->user_type == 'editor' 
            ||  $user->user_type == 'admin' || $post->user_id == $user->id    
                ? Response::allow()
                : Response::deny('Access Denied, You must be a Super administrator.');
        });
    }
}