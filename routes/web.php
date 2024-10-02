<?php

use App\Http\Controllers\AddAgents;
use App\Http\Controllers\Agents;
use App\Http\Controllers\Apropos;
use App\Http\Controllers\Archivage;
use App\Http\Controllers\Classeurs;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Documents;
use App\Http\Controllers\Etagere;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [Dashboard::class, 'show'])->name('dashboard');
    Route::get('/home', [Dashboard::class, 'show'])->name('dashboard');
    
    Route::get('/documents', [Documents::class, 'show'])->name('document.show');
    Route::post('/documents', [Documents::class, 'create']);
    Route::put('/documents', [Documents::class, 'update']);
    Route::delete('/documents', [Documents::class, 'delete']);
    Route::post('/share', [Documents::class, 'share']);

    Route::post('/classeurs', [Classeurs::class, 'create']);
    Route::put('/classeurs', [Classeurs::class, 'update']);
    Route::delete('/classeurs', [Classeurs::class, 'delete']);
    // Route::post('/classeurs-more/{id}', [Classeurs::class, 'deleteMore']);
    Route::get('/classeurs/{id}', [Classeurs::class, 'more'])->name('classeur.more');
    Route::get('/services/classeurs/{id}', [Classeurs::class, 'more']);

    Route::get('/services', [Services::class, 'show'])->name('services.show');
    Route::get('/services/{id}', [ServicesMore::class, 'show'])->name('service.more');
    Route::post('/services/{id}', [ServicesMore::class, 'addMermbers'])->name('service.addMembers');
    Route::delete('/services/{id}', [ServicesMore::class, 'deleteMembers'])->name('service.blockMembers');
    
    Route::get('/archivage', [Archivage::class, 'show'])->name('archivage.index');
    Route::get('/apropos', [Apropos::class, 'show'])->name('apropos');
    Route::get('/profile', [Profile::class, 'show'])->name('profile');
    Route::put('/user/password', [Agents::class, 'updatePassword']);

    // Archivage...
    Route::post('/etageres', [Etagere::class, 'create']);
    Route::post('/delete-etageres', [Etagere::class, 'remove']);
    Route::get('/archivage/etageres/{id}', [Etagere::class, 'more'])->name('etagere.more');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/agents', [Agents::class, 'show'])->name('agents');
    Route::post('/agents', [Agents::class, 'create'])->name('agents');
    Route::put('/agents', [Agents::class, 'resetPassword'])->name('agents');
    Route::delete('/agents', [Agents::class, 'delete'])->name('agents.delete');
    Route::get('/agents-add/{id}', [Agents::class, 'findById'])->name('addAgents');
    Route::get('/agents-add', [AddAgents::class, 'show']);
    Route::put('/agents-add', [Agents::class, 'update']);
    Route::put('/upload-image', [Agents::class, 'uploadImage']);
    
    // Services
    Route::post('/services', [Services::class, 'create'])->name('services');
    Route::put('/services', [Services::class, 'update'])->name('services');
    Route::delete('/services', [Services::class, 'delete'])->name('services');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Login::class, 'show'])->name('login');
    // Route::get('/forgot-password', [ForgotPassword::class, 'show'])->name('forgotPassword');
    // Route::get('/reset-password', [ResetPassword::class, 'show'])->name('password.reset');
});
