<?php

use App\Http\Controllers\ColaboradorController;
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
    return view('auth.login');
});



Route::get('/colaborador/create', function () {
    return view('colaborador.create');
})->middleware('auth');

/*
Route::get('/colaborador/form', function () {
    return view('colaborador.form');
});*/

Route::get('/colaborador', [ColaboradorController::class,'index'])->middleware('auth');

Route::get('/colaborador/{id}/edit',[ColaboradorController::class,'edit'])->middleware('auth');

Route::put('/colaborador/{id}',[ColaboradorController::class,'update'])->middleware('auth');

Route::post('/colaborador', [ColaboradorController::class, 'store'])->middleware('auth');

Route::delete('/colaborador/{colaborador}', [ColaboradorController::class, 'destroy'])->middleware('auth');


Route::get('download-pdf',[ColaboradorController::class, 'generar_pdf'])->name('download-pdf')->middleware('auth');



Auth::routes(['reset'=>false]);

Route::get('/home', [ColaboradorController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [ColaboradorController::class, 'index'])->name('home');
});


