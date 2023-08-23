<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;

use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\UserController;

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

Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('/admin/password/edit', [AdminProfileController::class, 'passwordEdit'])->name('admin.password.edit');
Route::put('/admin/password', [AdminProfileController::class, 'passwordUpdate'])->name('admin.password.update');


Route::middleware([
    'auth:sanctum,web', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [WelcomeController::class, 'index']);

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/logout', 'destroy')->name('user.logout');
    Route::get('/profile/edit', 'edit')->name('user.profile.edit');
    Route::put('/profile', 'update')->name('user.profile.update');
    Route::get('/password/edit', 'passwordEdit')->name('user.password.edit');
    Route::put('/password', 'passwordUpdate')->name('user.password.update');
});

Route::controller(BrandController::class)->prefix('brand')->group(function () {
    Route::get('/create', 'create')->name('brand.create');
    Route::post('/', 'store')->name('brand.store');
    Route::get('/{brand}/edit', 'edit')->name('brand.edit');
    Route::put('/{brand}', 'update')->name('brand.update');
    Route::get('/{brand}', 'destroy')->name('brand.destroy');
});
// Route::resource('brand', BrandController::class)->except('index', 'show');

