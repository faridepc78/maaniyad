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

    Route::resource('projects', 'ProjectController')->except('show');

    Route::get('projects/gallery/{project_id}', 'ProjectGalleryController@index')->name('projects.gallery.index');
    Route::post('projects/gallery/{project_id}', 'ProjectGalleryController@store')->name('projects.gallery.store');
    Route::delete('projects/gallery/{project_id}/{id}/destroy', 'ProjectGalleryController@destroy')->name('projects.gallery.destroy');

    Route::resource('posts_categories', 'PostCategoryController')->except('show');

    Route::resource('posts', 'PostController')->except('show');

    Route::get('posts/media/{post_id}', 'PostMediaController@index')->name('posts.media.index');
    Route::post('posts/media/{post_id}', 'PostMediaController@store')->name('posts.media.store');
    Route::delete('posts/media/{post_id}/{id}/destroy', 'PostMediaController@destroy')->name('posts.media.destroy');

    Route::get('posts/comments/pending', 'PostCommentController@pending')->name('posts.comments.pending');
    Route::get('posts/comments/index', 'PostCommentController@index')->name('posts.comments.index');
    Route::get('posts/comments/single/{id}', 'PostCommentController@single')->name('posts.comments.single');
    Route::patch('posts/comments/single/management/{id}', 'PostCommentController@management')->name('posts.comments.management');
    Route::delete('posts/comments/destroy/{id}','PostCommentController@destroy')->name('posts.comments.destroy');
    Route::patch('posts/comments/update_status/{id}','PostCommentController@update_status')->name('posts.comments.update_status');

    Route::resource('albums', 'AlbumController');

    Route::get('albums/{album_id}/products','AlbumController@products')->name('albums.products');

    Route::get('albums/{album_id}/attributes','AlbumAttributeController@index')->name('albums.attributes.index');
    Route::get('albums/{album_id}/attributes/create','AlbumAttributeController@create')->name('albums.attributes.create');
    Route::post('albums/{album_id}/attributes/store','AlbumAttributeController@store')->name('albums.attributes.store');
    Route::get('albums/{album_id}/attributes/edit/{id}','AlbumAttributeController@edit')->name('albums.attributes.edit');
    Route::patch('albums/{album_id}/attributes/update/{id}','AlbumAttributeController@update')->name('albums.attributes.update');
    Route::delete('albums/{album_id}/attributes/destroy/{id}','AlbumAttributeController@destroy')->name('albums.attributes.destroy');

    Route::resource('products', 'ProductController')->except('show');

    Route::get('product/attributes/{product_id}','ProductController@attributes')->name('product.attributes');
    Route::patch('product/attributes/{product_id}','ProductController@attributes_createOrUpdate')->name('product.attributes.createOrUpdate');

    Route::resource('brands', 'BrandController')->except('show');

    Route::resource('feedbacks', 'FeedbackController')->except('show');

    Route::get('contacts', 'ContactController@index')->name('contacts.index');
    Route::get('contacts/single/{id}', 'ContactController@single')->name('contacts.single');

    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings', 'SettingController@do')->name('settings.store');
    Route::patch('settings', 'SettingController@do')->name('settings.update');

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

    Route::get('contact-us', 'MainController@contact_us')->name('contact-us');
    Route::post('contact-us', 'MainController@contact_us_send')->name('contact-us-send');

    Route::get('projects', 'MainController@projects')->name('projects');
    Route::get('project/{slug}', 'MainController@project')->name('project');
    Route::get('projects/search', 'MainController@search')->name('projects.search');

    Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('blog/category/{slug}', 'BlogController@category')->name('blog.category');
    Route::get('blog/post/{slug}', 'BlogController@post')->name('blog.post');
    Route::get('blog/search', 'BlogController@search')->name('blog.search');
    Route::post('blog/register_comment/{post_id}', 'BlogController@register_comment')->name('blog.register_comment');

});

/*END SITE*/
