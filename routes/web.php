<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\Accueil::class, 'index'])->name('accueil');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["prefix" => 'entreprises'], function () {
    Route::get('/', [App\Http\Controllers\EntreprisesController::class, 'index'])->middleware(['role:admin,gestionnaire,utilisateur'])->name('entreprises');
    Route::get('{entreprise}/edit', [App\Http\Controllers\EntreprisesController::class, 'edit'])->middleware(['role:admin,gestionnaire,null'])->name('entreprises.edit');
    Route::get('{entreprise}/show', [App\Http\Controllers\EntreprisesController::class, 'show'])->middleware(['role:admin,gestionnaire,utilisateur'])->name('entreprises.show');
    Route::get('/create', [App\Http\Controllers\EntreprisesController::class, 'create'])->middleware(['role:admin,gestionnaire,null'])->name('entreprises.create');
    Route::post('/create', [App\Http\Controllers\EntreprisesController::class, 'store'])->middleware(['role:admin,gestionnaire,null'])->name('entreprises.ajouter');
    Route::delete('{entreprise}/delete', [App\Http\Controllers\EntreprisesController::class, 'delete'])->middleware(['role:admin,null,null'])->name('entreprises.supprimer');
    Route::put('{entreprise}/update', [App\Http\Controllers\EntreprisesController::class, 'update'])->middleware(['role:admin,gestionnaire,null'])->name('entreprises.update');
});

Route::group(["prefix" => 'collaborateurs'], function () {
    Route::get('/', [App\Http\Controllers\CollaborateursController::class, 'index'])->middleware(['role:admin,gestionnaire,utilisateur'])->name('collaborateurs');
    Route::get('/create', [App\Http\Controllers\CollaborateursController::class, 'create'])->middleware(['role:admin,gestionnaire,null'])->name('collaborateurs.create');
    Route::get('{collaborateur}/show', [App\Http\Controllers\CollaborateursController::class, 'show'])->middleware(['role:admin,gestionnaire,utilisateur'])->name('collaborateurs.show');
    Route::post('/create', [App\Http\Controllers\CollaborateursController::class, 'store'])->middleware(['role:admin,gestionnaire,null'])->name('collaborateurs.ajouter');
    Route::get('{collaborateur}/edit', [App\Http\Controllers\CollaborateursController::class, 'edit'])->middleware(['role:admin,gestionnaire,null'])->name('collaborateurs.edit');
    Route::put('{collaborateur}/update', [App\Http\Controllers\CollaborateursController::class, 'update'])->middleware(['role:admin,gestionnaire,null'])->name('collaborateurs.update');
    Route::delete('{collaborateur}/delete', [App\Http\Controllers\CollaborateursController::class, 'delete'])->middleware(['role:admin,null,null'])->name('collaborateurs.supprimer');
});
