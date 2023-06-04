<?php

use App\Http\Controllers\Todo;
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

Route::get('/', function () {
    return redirect('/todos');
});

Route::get('/todos', [Todo::class, 'index']);
Route::get('todos/{id}',[Todo::class, 'show']);
Route::post('todos/{id}',[Todo::class,'store' ]);
Route::put('todos/{id}',[Todo::class,'update']);
Route::delete('todos/{id}',[Todo::class,'destroy']);
