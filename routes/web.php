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


// Stranice odnosno pages
Route::get('/','PagesController@index');
Route::get('/o-nama','PagesController@onama');
Route::get('/cene','PagesController@cene');
Route::get('/politika-privatnosti','PagesController@politika_privatnosti');


// Post tj Usluge
Route::get('/usluge','PostsController@index');
Route::get('/posts/kreiraj','PostsController@create');
Route::get('/usluga/{id}','PostsController@show');
Route::get('/usluga/{id}/edit','PostsController@edit');
Route::post('/usluge','PostsController@store');
Route::put('/usluga/{id}','PostsController@update');
Route::delete('/usluga/{id}/delete','PostsController@destroy');
//Route::resource('posts','PostsController');



// Kategorija za usluge
Route::get('/kategorije','CategoryController@index');
Route::post('/kategorije','CategoryController@store');
Route::delete('/category/{id}','CategoryController@destroy');
Route::get('/usluge/kategorija/{name}','CategoryController@showAll')->name('category.usluge-kategorija');


//Galerija
Route::get('/galerija','GalleryController@index');
Route::get('/gallery/kreiraj','GalleryController@create');
Route::post('/galerija','GalleryController@store');
Route::delete('/gallery/{id}','GalleryController@destroy');


//Contact
Route::get('/kontakt','ContactController@create');
Route::post('/kontakt','ContactController@store');


Auth::routes(['register' => false]);

Route::get('/admin', 'HomeController@adminHome')->name('admin')->middleware('is_admin');
