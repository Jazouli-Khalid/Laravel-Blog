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

Route :: get('/', 'PagesController@index');

Route :: get('/about', 'PagesController@about');

Route :: get('/contact', 'PagesController@contact');

Route :: post('/tosend', 'PagesController@tosend');

Route :: resource('posts', 'PostsController');
// Route :: get('/posts/{post}', function () {
// })->name('post.index');
// Route::get('/post/{post}', function () {
// })->name('post.create');
// Route::get('/post/{post}', function () {
// })->name('post.store');
// Route::get('/post/{post}', function () {
// })->name('post.show');
// Route::get('/post/{post}', function () {
// })->name('post.edit');
// Route::get('/post/{post}', function () {
// })->name('post.update');
// Route::get('/post/{post}', function () {
// })->name('post.destroy');
Route::post('/comments/{slug}', 'CommentsController@store')->name('comments.store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
