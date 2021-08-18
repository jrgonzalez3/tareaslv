<?php

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
    return 'Esta es la url raiz';
});

Route::get('/products', function () {
    return ('Listado de Productos');
});

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/edit/{id}', [App\Http\Controllers\TaskController::class, 'editView'])->name('task.edit_view');
Route::post('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');


Route::put('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('task.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();