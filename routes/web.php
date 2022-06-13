<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\RecordController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(PrincipalController::class)->prefix('principal')->group(function () {
        Route::get('/', 'index')->name('principals.index');
        Route::get('/create', 'create')->name('principals.create');
        Route::post('/store', 'store')->name('principals.store');
    });

    Route::controller(RecordController::class)->prefix('record')->group(function () {
        Route::get('/', 'index')->name('records.index');
        Route::get('/create', 'create')->name('records.create');
        Route::post('/store', 'store')->name('records.store');
    });
});
require __DIR__ . '/auth.php';
