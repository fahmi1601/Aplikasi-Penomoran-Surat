<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ReportController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/mysurat', [SuratController::class, 'index']);
Route::get('/mysurat/new', [SuratController::class, 'create']);
Route::post('/mysurat/new', [SuratController::class, 'store']);
Route::get('/mysurat/edit/{id}', [SuratController::Class, 'edit']);
Route::post('/mysurat/edit/{id}', [SuratController::Class, 'update']);
Route::get('/report', [ReportController::Class, 'index']);
Route::post('/report', [ReportController::Class, 'index']);
Route::get('/report/export', [ReportController::Class, 'export']);
Route::post('/report/export', [ReportController::Class, 'export']);
