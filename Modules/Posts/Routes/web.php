<?php

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

use Modules\Posts\Http\Controllers\PostsController;

Route::prefix('posts')->group(function() {
    Route::get('/', [PostsController::class, 'index']);
});
