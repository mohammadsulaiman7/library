<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Models\Author;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('categories' , CategoryController::class)->except('destroy' , 'show');
// Route::resource('books' , BookController::class)->only('index' , 'show');

Route::resource('categories' , CategoryController::class);
Route::resource('books' , BookController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//session training
Route::get('strg_path' , function() {
    return  storage_path('framework/sessions');
});

//put & get session element
Route::get('sess' , function() {
    session()->put('user' , 'ahmad');
    return  session()->get('user') . " is added with key user";
});

//has
Route::get('has-sess' , function() {
    if (session()->has('user'))
        return ' There is $_SESSION[USER] = ' . session()->get('user');
    else
        return "no ses...";
});

//forget
Route::get('forget-sess' , function() {
    session()->forget('user');
    return  session()->get('user') . " is added with key user";    
});

//session()->flush(): delete every key
//session()->flash('key' , 'value' )
//session->pull('key') //get() then forget()


//m-m relation training
Route::get('attach' , function() {
   $book = Book::find('9780269088834');
   $book->authors()->attach(1);
});

Route::get('detach' , function() {
    $book = Book::find('9780269088834');
    $book->authors()->detach(1);
 });


 Route::get('attach-model' , function() {
    $book = Book::find('9780269088834');
    $author = Author::find(2);
    $book->authors()->attach($author);
 });

 Route::get('attach-many' , function() {
    $book = Book::find('9780943883014');
    $book->authors()->attach([5 , 7]);
 });

 Route::get('sync' , function() {
    $book = Book::find('9780943883014');
    $book->authors()->sync([1 , 3]);
 });
 
 