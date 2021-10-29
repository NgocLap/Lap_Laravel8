<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminPermissionController;
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
            ->name('show_category')
            ->middleware('can:category-list');

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
            ->name('show_menu')
            ->middleware('can:menu-list');

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

    //Route slider
    Route::prefix('slider')->group(function () {

        Route::get('/',  [SliderController::class, 'show'])
            ->name('show_slider');

        Route::get('/create', [SliderController::class, 'create'])
            ->name('create_slider');

        Route::post('/store', [SliderController::class, 'store'])
            ->name('store_slider');

        Route::get('/edit/{id}', [SliderController::class, 'edit'])
            ->name('edit_slider');

        Route::post('/update/{id}',  [SliderController::class, 'update'])
            ->name('update_slider');

        Route::get('/delete/{id}',  [SliderController::class, 'delete'])
            ->name('delete_slider');
    });

    //Route setting
    Route::prefix('setting')->group(function () {

        Route::get('/',  [SettingController::class, 'show'])
            ->name('show_setting');

        Route::get('/create', [SettingController::class, 'create'])
            ->name('create_setting');

        Route::post('/store', [SettingController::class, 'store'])
            ->name('store_setting');

        Route::get('/edit/{id}', [SettingController::class, 'edit'])
            ->name('edit_setting');

        Route::post('/update/{id}',  [SettingController::class, 'update'])
            ->name('update_setting');

        Route::get('/delete/{id}',  [SettingController::class, 'delete'])
            ->name('delete_setting');
    });

    //Route user
    Route::prefix('user')->group(function () {

        Route::get('/',  [AdminUserController::class, 'show'])
            ->name('show_user');

        Route::get('/create', [AdminUserController::class, 'create'])
            ->name('create_user');

        Route::post('/store', [AdminUserController::class, 'store'])
            ->name('store_user');

        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])
            ->name('edit_user');

        Route::post('/update/{id}',  [AdminUserController::class, 'update'])
            ->name('update_user');

        Route::get('/delete/{id}',  [AdminUserController::class, 'delete'])
            ->name('delete_user');
    });

    //Route permission
    Route::prefix('role')->group(function () {
        Route::get('/',  [AdminRoleController::class, 'show'])
            ->name('show_role');

        Route::get('/create', [AdminRoleController::class, 'create'])
            ->name('create_role');

        Route::post('/store', [AdminRoleController::class, 'store'])
            ->name('store_role');

        Route::get('/edit/{id}', [AdminRoleController::class, 'edit'])
            ->name('edit_role');

        Route::post('/update/{id}',  [AdminRoleController::class, 'update'])
            ->name('update_role');

        Route::get('/delete/{id}',  [AdminRoleController::class, 'delete'])
            ->name('delete_role');
    });

     //Route role
     Route::prefix('permission')->group(function () {
        // Route::get('/',  [AdminPermissionController::class, 'show'])
        //     ->name('show_permission');

        Route::get('/create', [AdminPermissionController::class, 'create'])
            ->name('create_permission');

        Route::post('/store', [AdminPermissionController::class, 'store'])
            ->name('store_permission');

        // Route::get('/edit/{id}', [AdminPermissionController::class, 'edit'])
        //     ->name('edit_permission');

        // Route::post('/update/{id}',  [AdminPermissionController::class, 'update'])
        //     ->name('update_permission');

        // Route::get('/delete/{id}',  [AdminPermissionController::class, 'delete'])
        //     ->name('delete_permission');
    });
});
