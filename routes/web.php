<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;

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

Route::group(['prefix'=> ''], static function() {

    Route::get('/hello/{name}', static function(string $name): string {
        return "Hello, {$name}";
    });

    Route::get('/info', static function(): string {
        return "Some info";
    });

    

    
    Route::get('/news/{category_id}', [NewsController::class, 'index'])
        ->where( 'category_id', '\d+')
        ->name('news.category');

    Route::get('/news/{id}/show', [NewsController::class,'show'])
        ->where( 'id', '\d+')
        ->name('news.show');

    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories');
    

    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

});