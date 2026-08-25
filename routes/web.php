<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\shopController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
//admin categories

Route::get('/admin/categories', [CategoryController::class, 'index'])
    ->middleware(AdminMiddleware::class)
    ->name('admin.categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])
    ->middleware(AdminMiddleware::class)
    ->name('admin.categories.create');

Route::post('/admin/categories', [CategoryController::class, 'store'])
    ->middleware(AdminMiddleware::class)
    ->name('admin.categories.store');


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');


Route::get('/admin/login', [AuthController::class, 'adminshowLogin'])
        ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'adminLogin'])
        ->name('admin.login.submit');

Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->middleware(AdminMiddleware::class)
        ->name('admin.dashboard');


        //product
       

        Route::get('/admin/products', [ProductsController::class, 'index'])
        ->middleware(AdminMiddleware::class)
        ->name('admin.products.index');

        Route::post('/admin/products', [ProductsController::class, 'store'])
        ->middleware(AdminMiddleware::class)
        ->name('admin.products.store');

        Route::post('/admin/logout', [AuthController::class, 'adminLogout'])
        ->name('admin.logout');


        //shop

        Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop');