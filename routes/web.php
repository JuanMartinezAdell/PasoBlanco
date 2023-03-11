<?php

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Headline;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'products' => Product::all(),
        'headlines' => Headline::all(),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('user', UserController::class);
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/headlines', [ArticleController::class, 'index'])->name('headlines.index');

Route::get('/headlines', [ArticleController::class, 'index'])->name('headlines.index');
