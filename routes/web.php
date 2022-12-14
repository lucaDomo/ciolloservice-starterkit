<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\AdminManagementController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin route
Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index']);
    //Route Admin Management
    Route::get('/gestioneAdmin', [AdminManagementController::class, 'index']);
    Route::get('/updateAdmin', [AdminManagementController::class, 'indexUpdateAdmin']);
    Route::post('/updateAdmin', [AdminManagementController::class, 'updateAdmin']);
    //Route upload file
    Route::get('/File', [FileController::class, 'index']);
    Route::post('/File', [FileController::class, 'uploadFile']);
    Route::delete('/File', [FileController::class, 'deleteFile']);
});
