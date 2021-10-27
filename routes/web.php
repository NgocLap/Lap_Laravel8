<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
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

Route::get('/admin', [AdminController::class, 'loginAdmin']);

Route::post('/admin', [AdminController::class, 'postloginAdmin']);

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    //Route Categories
    Route::prefix('categories')->group(function () {

        Route::get('/',  [CategoryController::class, 'show'])
            ->name('show_category');

        Route::get('/create', [CategoryController::class, 'create'])
            ->name('create_category');

        Route::post('/store', [CategoryController::class, 'store'])
            ->name('store_category');

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])
            ->name('edit_category');

        Route::post('/update/{id}',  [CategoryController::class, 'update'])
            ->name('update_category');

        Route::get('/delete/{id}',  [CategoryController::class, 'delete'])
            ->name('delete_category');
    });

    //Route menu
    Route::prefix('menu')->group(function () {

        Route::get('/',  [MenuController::class, 'show'])
            ->name('show_menu');

        Route::get('/create', [MenuController::class, 'create'])
            ->name('create_menu');

        Route::post('/store', [MenuController::class, 'store'])
            ->name('store_menu');

        Route::get('/edit/{id}', [MenuController::class, 'edit'])
            ->name('edit_menu');

        Route::post('/update/{id}',  [MenuController::class, 'update'])
            ->name('update_menu');

        Route::get('/delete/{id}',  [MenuController::class, 'delete'])
            ->name('delete_menu');
    });

    //Route Products
    Route::prefix('product')->group(function () {

        Route::get('/',  [AdminProductController::class, 'show'])
            ->name('show_product');

        Route::get('/create', [AdminProductController::class, 'create'])
            ->name('create_product');

        Route::post('/store', [AdminProductController::class, 'store'])
            ->name('store_product');

        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])
            ->name('edit_product');

        Route::post('/update/{id}',  [AdminProductController::class, 'update'])
            ->name('update_product');

        Route::get('/delete/{id}',  [AdminProductController::class, 'delete'])
            ->name('delete_product');
    });
});
