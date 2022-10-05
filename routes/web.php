<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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




//, 'random'
Route::middleware(['auth', 'swear'])->group(function () {
    Route::resources([
        'products'=>ProductController::class
    ]);

    Route::post('/categories/{id}/addProduct',[CategoryController::class,'addProduct'])->name('categories.addProduct');

    Route::middleware('age')->group(function(){
        Route::resources([
            'categories'=> CategoryController::class
        ]);
    });


    //......
});



Route::get('/', function () {
    return view('welcome');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
