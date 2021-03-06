<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExampleController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users.index');
            Route::post('', [UserController::class, 'create'])->name('users.create');
            Route::get('create', [UserController::class, 'createForm'])->name('users.create.form');
            Route::get('{user}', [UserController::class, 'show'])->name('users.show');
            Route::put('{user}', [UserController::class, 'update'])->name('users.update');
        });
        Route::prefix('example')->group(function () {
            Route::get('dashboard', [ExampleController::class, 'dashboard'])->name('examples.dashboard');
            Route::get('tables', [ExampleController::class, 'tables'])->name('examples.tables');
            Route::get('billing', [ExampleController::class, 'billing'])->name('examples.billing');
            Route::get('vr', [ExampleController::class, 'vr'])->name('examples.vr');
            Route::get('rtl', [ExampleController::class, 'rtl'])->name('examples.rtl');
            Route::get('profile', [ExampleController::class, 'profile'])->name('examples.profile');
            Route::get('signin', [ExampleController::class, 'signin'])->name('examples.signin');
            Route::get('signup', [ExampleController::class, 'signup'])->name('examples.signup');
        });
    });
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');
});
