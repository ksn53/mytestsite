<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Relations\Relation;
//use App\Http\Interfaces\Tagable;
//use App\Http\Interfaces\Commentable;
//use App\Http\Interfaces\HasComments;
//use App\Http\Service\TagExtract;
//use App\Http\Service\CommentAdd;
use App\Models\Post;
use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(Tagable::class, TagExtract::class);
        //$this->app->bind(Commentable::class, CommentAdd::class);
        $this->app->bind(HasTags::class, Post::class, News::class);
        //$this->app->bind(HasTags::class, News::class);
        //$this->app->bind(HasComments::class, Post::class);
        //$this->app->bind(HasComments::class, News::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layout.sidebar', function ($view) {
            $view->with('tagsCloud', \App\Models\Tag::tagsCloud());
        });
        Paginator::defaultView('pagination::bootstrap-4');
        Paginator::defaultSimpleView('pagination::simple-default');
    }
}
