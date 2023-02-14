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

Route::get('/a', function (){
    return view('welcome');
});

//Route::get('/','Employee@index');
Route::get('/',[\App\Http\Controllers\Employee::class,'index']);

Route::get('/search',[\App\Http\Controllers\Employee::class,'search']);