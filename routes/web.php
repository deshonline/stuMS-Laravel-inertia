<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Home Page
Route::get('/',[HomeController::class, "index"])->name('dashboard');

//Stud page
Route::prefix('/stud')->group(function () {
    Route::get('/',[StudController::class, "index"])->name('stud');
    Route::get('/list',[StudController::class, "list"])->name('stud.list');
    Route::get('/{task_id}/get',[StudController::class, "get"])->name('stud.get');
    Route::post('/store',[StudController::class, "store"])->name('stud.store');
    Route::get('/edit',[StudController::class, "edit"])->name('stud.edit');
    Route::post('/{task_id}/update',[StudController::class, "update"])->name('stud.update');
    Route::get('/{task_id}/delete',[StudController::class, "delete"])->name('stud.delete');
    Route::get('/{task_id}/status',[StudController::class, "status"])->name('stud.status');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
