<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\HeroController;

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


Route::middleware(['auth:admin'])->group(function () {
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
});

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

Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('/create', 'create')->name('category.create');
    Route::post('/', 'store')->name('category.store');
    Route::get('/{category}/edit', 'edit')->name('category.edit');
    Route::put('/{category}', 'update')->name('category.update');
    Route::get('/{category}', 'destroy')->name('category.destroy');
});

Route::controller(SubCategoryController::class)->prefix('subCategory')->group(function () {
    Route::get('/create', 'create')->name('subCategory.create');
    Route::post('/', 'store')->name('subCategory.store');
    Route::get('/{subCategory}/edit', 'edit')->name('subCategory.edit');
    Route::put('/{subCategory}', 'update')->name('subCategory.update');
    Route::get('/{subCategory}', 'destroy')->name('subCategory.destroy');
});

Route::controller(SubSubCategoryController::class)->prefix('subSubCategory')->group(function () {
    Route::get('/create', 'create')->name('subSubCategory.create');
    Route::get('/subCategory/ajax/{category_id}', 'GetSubCategory');
    Route::get('/subSubCategory/ajax/{sub_category_id}', 'GetSubSubCategory');
    Route::post('/', 'store')->name('subSubCategory.store');
    Route::get('/{subSubCategory}/edit', 'edit')->name('subSubCategory.edit');
    Route::put('/{subSubCategory}', 'update')->name('subSubCategory.update');
    Route::get('/{subSubCategory}', 'destroy')->name('subSubCategory.destroy');
});

Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store');
    Route::get('/{product}/edit', 'edit')->name('product.edit');
    Route::put('/{product}', 'update')->name('product.update');
    Route::post('/multiImage', 'multiImageUpdate')->name('multiImage.update');
    Route::get('/multiImage/{id}', 'multiImageDestroy')->name('multiImage.destroy');
    Route::get('/inactive/{id}', 'ProductInactive')->name('product.inactive');
    Route::get('/active/{id}', 'ProductActive')->name('product.active');
    Route::get('/{product}', 'destroy')->name('product.destroy');
});

Route::controller(HeroController::class)->prefix('hero')->group(function () {
    Route::get('/create', 'create')->name('hero.create');
    Route::post('/', 'store')->name('hero.store');
    Route::get('/{hero}/edit', 'edit')->name('hero.edit');
    Route::put('/{hero}', 'update')->name('hero.update');
    Route::get('/{hero}', 'destroy')->name('hero.destroy');
    Route::get('/inactive/{id}', 'HeroInactive')->name('hero.inactive');
    Route::get('/active/{id}', 'HeroActive')->name('hero.active');
});
