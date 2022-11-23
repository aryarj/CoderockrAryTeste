<?php

use App\Http\Controllers\CalculoController;
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

Route::get('/', [CalculoController::class,'calculo'])->name('calculo');
//Route::get('/', [CalculoController::class,'listagem'])->name('listagem');


Route::get('/w', function () {
    return view('welcome');
});
