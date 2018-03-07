<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function() {
	Auth::routes();
	// Authentication Routes
    Route::get('logout', 'PagesController@logout')->name('logout');

    // Categories Routes
    Route::resource('categories', 'CategoryController', ['expect' => 'create']);

    // Tags Routes
    Route::resource('tags', 'TagController', ['expect' => 'create']);

    // Blog
	Route::get('blog', 'BlogController@getIndex')->name('blog.index');
	Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');

	// Comment
	Route::post('comments/{post_id}', 'CommentController@store')->name('comments.store');
	Route::get('comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
	Route::put('comments/{id}', 'CommentController@update')->name('comments.update');
	// Route::get('comments/{id}/delete', 'CommentController@delete')->name('comments.delete');
	Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');

	// homepage
	Route::get('/', 'PagesController@getIndex');
	Route::get('about', 'PagesController@getAbout');

	Route::get('contact', 'PagesController@getContact');
	Route::post('contact', 'PagesController@postContact');

	// Posts
	Route::resource('posts', 'PostController');
});




