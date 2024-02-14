<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', [TestController::class, 'test'])->name('test');
Route::get('/home', [HomeController::class, 'home'])->name('home');
//ミドルウェアを複数にまとめルート設定　条件：admin' or 'auth'
//Route::get('/post/create', [PostController::class, 'create'])->middleware(['admin','auth']);
//Route::middleware(['admin','auth'])->group(function () {
   //Route::get('/post/create', [PostController::class, 'create']);
    //Route::get('post', [PostController::class, 'index'])->name('post.index');
//});

//laravelでは
//Route::get('post/show/{post}', [PostController::class, 'show'])->name('post.show');

Route::resource('post',PostController::class);







//Route::post('post', [PostController::class, 'store'])->name('post.store');

//Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
//Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
//Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

require __DIR__.'/auth.php';
//Route::get('/item/{id}', [ItemController::class, 'item'])->name('item');

Route::resource('item',ItemController::class);

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/order', [OrderController::class, 'order'])->name('order');
