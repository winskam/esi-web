<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaeCtrl;

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

Route::get('/pae/students', [PaeCtrl::class, 'students']);

Route::get('/', [PaeCtrl::class, 'accueil']);

Route::get('/pae/student/{id}', [PaeCtrl::class, 'getDetails']);

Route::post('/pae/student/{id}/{course}', [PaeCtrl::class, 'deleteDetails']);