<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


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
    return view('clienForm');
});

Route::get('/admin/index',[\App\Http\Controllers\vehiculeController::class,'index'] );
Route::get('/admin/form',[\App\Http\Controllers\vehiculeController::class,'create'] )->name('create');
Route::post('/admin/form',[\App\Http\Controllers\vehiculeController::class,'store'] )->name('store');
Route::get('/admin/edit/{id}',[\App\Http\Controllers\vehiculeController::class,'edit'] )->name('edite');
Route::patch('/admin/edit/{id}',[\App\Http\Controllers\vehiculeController::class,'update'] );
Route::delete('/admin/index/{id}',[\App\Http\Controllers\vehiculeController::class,'destroy'] )->name('supprimer');
Route::get('/admin/vehicule/{id}',[\App\Http\Controllers\vehiculeController::class,'show'] )->name('show');
Route::get('/clientForm',[\App\Http\Controllers\clientController::class,'create'] );
Route::post('/',[\App\Http\Controllers\clientController::class,'store'] );
Route::get('/admin/many',[\App\Http\Controllers\clientController::class,'show'] );
Route::get('/login', function () {
    return view('login');
});
Route::post('/Board',[\App\Http\Controllers\location::class,'login'] )->name('Board');
Route::post('/louer',[\App\Http\Controllers\location::class,'louer'] );
Route::get('/modification/{id}',[\App\Http\Controllers\clientController::class,'edit'] )->name('update');
Route::patch('/modification/{id}',[\App\Http\Controllers\clientController::class,'update'] );
Route::post('/index',[\App\Http\Controllers\location::class,'choix'] )->name('choix');
Route::get('/admin/client',[\App\Http\Controllers\clientController::class,'index'] );
Route::delete('/admin/client/{id}',[\App\Http\Controllers\clientController::class,'destroy'] )->name('sup');
Route::get('/admin/user',[\App\Http\Controllers\adminController::class,'index'] );
Route::get('/admin/userForm',[\App\Http\Controllers\adminController::class,'create'] );
Route::post('/admin/user',[\App\Http\Controllers\adminController::class,'store'] );
Route::delete('/admin/user/{id}',[\App\Http\Controllers\adminController::class,'destroy'] )->name('spr');
Route::get('/admin/editeur/{id}',[\App\Http\Controllers\adminController::class,'edit'] )->name('mdf');
Route::patch('/admin/editeur/{id}',[\App\Http\Controllers\adminController::class,'update'] );
Route::get('/admin/location',[\App\Http\Controllers\adminController::class,'show'] );
Route::get('/pdf/{id}',[\App\Http\Controllers\adminController::class,'document'] )->name('pdf');
Route::get('/admin',[\App\Http\Controllers\location::class,'auth'] );
Route::post('/admin',[\App\Http\Controllers\location::class,'connection'] );