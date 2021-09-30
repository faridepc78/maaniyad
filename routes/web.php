<?php

use Illuminate\Support\Facades\Route;


/*START ADMIN*/

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'my_auth', 'throttle:50,1'],
    'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile', 'ProfileController@update')->name('update_profile');

    Route::resource('sliders', 'SliderController')->except('show');

    Route::resource('projects_categories', 'ProjectCategoryController')->except('show');

    Route::resource('projects', 'ProjectController')->except('show');

    Route::get('projects/gallery/{project_id}', 'ProjectGalleryController@index')->name('projects.gallery.index');
    Route::post('projects/gallery/{project_id}', 'ProjectGalleryController@store')->name('projects.gallery.store');
    Route::delete('projects/gallery/{project_id}/{id}/destroy', 'ProjectGalleryController@destroy')->name('projects.gallery.destroy');

    Route::resource('posts_categories', 'PostCategoryController')->except('show');

    Route::resource('posts', 'PostController')->except('show');

    Route::get('posts/media/{post_id}', 'PostMediaController@index')->name('posts.media.index');
    Route::post('posts/media/{post_id}', 'PostMediaController@store')->name('posts.media.store');
    Route::delete('posts/media/{post_id}/{id}/destroy', 'PostMediaController@destroy')->name('posts.media.destroy');

    Route::resource('team', 'TeamController')->except('show');

    Route::resource('brands', 'BrandController')->except('show');

    Route::resource('services', 'ServiceController')->except('show');

    Route::resource('feedbacks', 'FeedbackController')->except('show');

});

/*END ADMIN*/


/*START AUTH*/

Route::group(['prefix' => '/', 'middleware' => ['web', 'throttle:50,1'],
    'namespace' => 'App\Http\Controllers\Auth'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

    Route::any('logout', 'LoginController@logout')->name('logout')->middleware('auth');
});

/*END AUTH*/


/*START SITE*/

Route::group(['prefix' => '/', 'middleware' => ['web', 'throttle:50,1'],
    'namespace' => 'App\Http\Controllers\Site'], function () {

    Route::get('/', 'MainController@home')->name('home');

    Route::get('about-us', 'MainController@about_us')->name('about-us');

    Route::get('services', 'MainController@services')->name('services');
    Route::get('services/{slug}', 'MainController@service')->name('service');

    Route::get('team','MainController@team')->name('team');

    Route::get('faq','MainController@faq')->name('faq');

    Route::get('projects', 'MainController@projects')->name('projects');
    Route::get('project/{slug}', 'MainController@project')->name('project');

});

/*END SITE*/
