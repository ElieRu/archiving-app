<?php

use App\Http\Controllers\AddAgents;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Agents;
use App\Http\Controllers\Apropos;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Documents;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\Login;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Services;
use App\Http\Controllers\ServicesMore;
use Illuminate\Support\Facades\Route;

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

// The password.reset route must be created...

// Route::middleware(['auth'])->group(function () {
    Route::get('/', [Dashboard::class, 'show'])->name('dashboard');
    Route::get('/documents', [Documents::class, 'show'])->name('documents');
    Route::get('/archivage', [Documents::class, 'show'])->name('classeurs');
    Route::get('/services', [Services::class, 'show'])->name('services');
    Route::get('/services-more', [ServicesMore::class, 'show'])->name('servicesMore');
    Route::get('/agents', [Agents::class, 'show'])->name('agents');
    Route::get('/agents-add', [AddAgents::class, 'show'])->name('addAgents');
    Route::get('/admin', [Admin::class, 'show'])->name('admin');
    Route::get('/apropos', [Apropos::class, 'show'])->name('apropos');
    Route::get('/profile', [Profile::class, 'show'])->name('profile');
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [Dashboard::class, 'show'])->name('dashboard');
    Route::get('/services', [Services::class, 'show'])->name('services');
    Route::get('/services-more', [ServicesMore::class, 'show'])->name('servicesMore');
    
    Route::get('/agents', [Agents::class, 'show'])->name('agents');
    Route::post('/agents', [Agents::class, 'create'])->name('agents');
    
    Route::get('/agents-add', [AddAgents::class, 'show'])->name('addAgents');
    Route::get('/admin', [Admin::class, 'show'])->name('admin');
// });


Route::get('/login', [Login::class, 'show'])->name('login');
Route::get('/forgot-password', [ForgotPassword::class, 'show'])->name('forgotPassword');
