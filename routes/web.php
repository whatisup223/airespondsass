<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountConnectionController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// User Dashboard Routes
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/user/accounts', function () {
    return view('user.accounts');
})->name('user.accounts');

Route::get('/user/automation', function () {
    return view('user.automation');
})->name('user.automation');

Route::get('/user/inbox', function () {
    return view('user.inbox');
})->name('user.inbox');

Route::get('/user/profile', function () {
    return view('user.profile');
})->name('user.profile');

// Admin Dashboard Routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');

Route::get('/admin/ai-providers', function () {
    return view('admin.ai-providers');
})->name('admin.ai-providers');

Route::get('/admin/plans', function () {
    return view('admin.plans');
})->name('admin.plans');

Route::get('/admin/settings', function () {
    return view('admin.settings');
})->name('admin.settings');

// API Routes for Account Connection
Route::post('/api/accounts/fetch', [AccountConnectionController::class, 'fetchAccounts']);
Route::post('/api/accounts/toggle', [AccountConnectionController::class, 'toggleAccount']);
Route::get('/api/accounts/connected', [AccountConnectionController::class, 'getConnectedAccounts']);
