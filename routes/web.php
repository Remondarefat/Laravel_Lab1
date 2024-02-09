<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
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
    return view('welcome');
});

// ! List all Users------
Route::get('users',[userController::class ,'index'])->name('users.index');

// ! Show user-----------
Route::get('users/show/{user}',[userController::class ,'show'])
->where('id', '[0-9]+')
->name('users.show');

// ! Add New User---------
Route::get('users/create',[userController::class ,'create'])->name('users.create');
Route::post('users',[userController::class ,'store'])->name('users.store');

// ! Update User Data------
Route::get('users/{user}/edit',[userController::class ,'edit'])
->where('id', '[0-9]+')
->name('users.edit');
Route::put('users/{user}',[userController::class ,'update'])
->name('users.update');

// ! Update User Data------
Route::delete('users/{user}',[userController::class ,'destroy'])->name('users.destroy');


// !
Route::fallback(function(){
    return redirect('/');
});