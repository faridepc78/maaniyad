<?php

namespace App\Providers;

use App\Http\View\Composers\AlbumComposer;
use App\Http\View\Composers\BlogCategoryComposer;
use App\Http\View\Composers\BlogRandomComposer;
use App\Http\View\Composers\SettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('site.layout.header', AlbumComposer::class);

        View::composer(
            [
                'site.blog.index',
                'site.blog.search.index',
                'site.blog.category.index',
                'site.blog.post.index'
            ], BlogCategoryComposer::class);

        View::composer(
            [
                'site.blog.index',
                'site.blog.search.index',
                'site.blog.category.index'
            ], BlogRandomComposer::class);

        View::composer('site.*', SettingComposer::class);
    }
}
