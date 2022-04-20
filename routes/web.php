<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/post/{slug}', 'App\Http\Controllers\HomeController@post_list')->name('post_list');
Route::get('/post/details/{slug}', 'App\Http\Controllers\HomeController@post_detail')->name('post.details');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');
Route::post('/contact', 'App\Http\Controllers\HomeController@send_mail')->name('contact');
Route::get('/about-us', 'App\Http\Controllers\HomeController@about')->name('about');
Route::post('add-comment', 'App\Http\Controllers\CommentController@save')->name('comment.add');

Route::get('/admin', 'App\Http\Controllers\Frontend\HomeController@index')->name('admin');

Route::group(['prefix'  =>   'categories', 'middleware'=>'auth'], function() {

    Route::get('/', 'App\Http\Controllers\CategoryController@index')->name('admin.categories.index');
    Route::get('/create', 'App\Http\Controllers\CategoryController@create')->name('admin.categories.create');
    Route::post('/store', 'App\Http\Controllers\CategoryController@store')->name('admin.categories.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update', 'App\Http\Controllers\CategoryController@update')->name('admin.categories.update');
    Route::get('/{id}/delete', 'App\Http\Controllers\CategoryController@delete')->name('admin.categories.delete');

});

Route::group(['prefix' => 'blog', 'middleware'=>'auth'], function () {
    
    Route::get('/create', 'App\Http\Controllers\BlogController@create')->name('blog.create');
    Route::post('/create', 'App\Http\Controllers\BlogController@save')->name('blog.create');
    Route::get('/index', 'App\Http\Controllers\BlogController@index')->name('blog');
    Route::get('/delete/{id}', 'App\Http\Controllers\BlogController@delete')->name('blog.delete');
    Route::get('/edit/{id}/{notify}', 'App\Http\Controllers\BlogController@edit_notify')->name('blog.edit.notify');
    Route::get('/edit/{id}/', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
    Route::post('/update', 'App\Http\Controllers\BlogController@update')->name('blog.update');
    Route::post('/update-menu', 'App\Http\Controllers\BlogController@update_menu')->name('blog.update.menu');
    Route::post('/publish', 'App\Http\Controllers\BlogController@publish')->name('publish');
    Route::get('/comment-delete/{id}', 'App\Http\Controllers\CommentController@delete')->name('comment.delete');
    Route::get('/user-post', 'App\Http\Controllers\BlogController@user_post')->name('user.post');
    Route::post('/delete-notify', 'App\Http\Controllers\BlogController@delete_notify')->name('delete.notify');
 
});
Route::post('/notify', 'App\Http\Controllers\BlogController@notify')->name('notify');

Route::group(['prefix' => 'user', 'middleware'=>'auth'], function () {
    
    Route::get('/create', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/create', 'App\Http\Controllers\UserController@save')->name('user.create');
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
    Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::post('/update', 'App\Http\Controllers\UserController@update')->name('user.update');
});

Route::group(['prefix' => 'profile','middleware'=>'auth'], function () {
    
    Route::get('/', 'App\Http\Controllers\UserController@profile_edit')->name('profile.edit');
    Route::post('/update', 'App\Http\Controllers\UserController@profile_update')->name('profile.update');
    Route::post('/change-password', 'App\Http\Controllers\UserController@password_reset')->name('password');
    Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('profile.dashboard');

});

Route::group(['prefix' => 'notification','middleware'=>'auth'], function () {
    
    Route::get('/view', 'App\Http\Controllers\NotificationController@view')->name('notify.view');
    Route::post('/delete', 'App\Http\Controllers\NotificationController@delete')->name('notify.delete');
});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/posts', 'App\Http\Controllers\HomeController@all_posts')->name('all.posts');
Route::get('/posts/{slug}', 'App\Http\Controllers\HomeController@category_posts')->name('category.posts');
Route::get('/post/details/{slug}', 'App\Http\Controllers\HomeController@post_details')->name('post.details');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');
Route::get('/about-us', 'App\Http\Controllers\HomeController@about_us')->name('about');
Route::post('add-comment', 'App\Http\Controllers\CommentController@save')->name('comment.add');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
