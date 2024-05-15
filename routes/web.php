<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', Controllers\IndexController::class)->name('task.index');

Route::post('/create', Controllers\CreateTaskController::class)->name('task.create');

Route::delete('delete/{id}', Controllers\DeleteTaskController::class)->name('task.delete');

Route::post('check/{id}', Controllers\CompleteTaskController::class)->name('task.check');
