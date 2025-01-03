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

    // Documents 
    Route::get('/documents', [Documents::class, 'show'])->name('document.show');
    Route::post('/documents', [Classeurs::class, 'create']);
    Route::put('/documents', [Classeurs::class, 'update']);
    Route::delete('/documents', [Classeurs::class, 'delete']);
    
    // Documents > Classeurs
    Route::get('/documents/classeurs/{id}', [Documents::class, 'index'])->name('classeur.more');
    Route::post('/documents/classeurs/{id}', [Documents::class, 'create']);
    Route::put('/documents/classeurs/{id}', [Documents::class, 'update']);
    Route::delete('/documents/classeurs/{id}', [Documents::class, 'delete']);
    Route::post('/documents/share', [Documents::class, 'share']);
    Route::post('/documents/archiving', [Documents::class, 'archiving']);

    // Archivage
    Route::get('/etageres', [Etagere::class, 'index'])->name('etageres.index');
    Route::post('/etageres', [Etagere::class, 'create']);
    Route::put('/etageres', [Etagere::class, 'update']);

    // Archivage > Etageres
    Route::get('/etageres/{id}', [Etagere::class, 'more'])->name('etagere.more');
    Route::get('/etageres-delete', [Etagere::class, 'remove']);
    Route::put('/etageres/{id}', [Classeurs::class, 'update']);
    Route::delete('/etageres/{id}', [Classeurs::class, 'delete']);

    // Archivage > Etageres > Classeurs
    Route::get('/etageres/{etagere_id}/classeurs/{id}', [Classeurs::class, 'more'])->name('etagere.classeur');
    Route::delete('/etageres/{etagere_id}/classeurs/{id}', [Documents::class, 'delete']);

    // Services
    Route::get('/services', [Services::class, 'show'])->name('services.show');
    Route::get('/services/{id}', [ServicesMore::class, 'show'])->name('service.more');
    Route::post('/services/{id}', [ServicesMore::class, 'add_members'])->name('service.addMembers');
    Route::post('/remove-members/{id}', [ServicesMore::class, 'remove_members'])->name('service.blockMembers');
    Route::delete('/services/{id}', [ServicesMore::class, 'remove_class'])->name('service.blockMembers');

    // Services > More > Classeur
    Route::get('/services/{service_id}/classeurs/{id}', [Classeurs::class, 'more'])->name('service.classeur');
    Route::delete('/services/{service_id}/classeurs/{id}', [Documents::class, 'delete']);


    // Route::get('/archivage', [Archivage::class, 'show'])->name('archivage.index');

    // Other Routes
    Route::get('/apropos', [Apropos::class, 'show'])->name('apropos');
    Route::get('/profile', [Profile::class, 'show'])->name('profile');
    Route::put('/profile', [Agents::class, 'updatePassword']);    
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
