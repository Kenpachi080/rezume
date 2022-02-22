<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController as RegisterController;
use App\Http\Controllers\LoginController as LoginController;
use App\Http\Controllers\ContractController as ContractController;

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

Route::middleware('guests')->group(function () {


    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);


    Route::get('/registration', function () {
        return view('registration');
    })->name('registration');

    Route::post('/registration', [RegisterController::class, 'save']);
});

Route::middleware('login')->group(function () {

    Route::get('/', [ContractController::class, 'view'])->name('home');

    Route::post('/create', [ContractController::class, 'create_contact'])->name('create');

    Route::post('/', [ContractController::class, 'all']);

    Route::post('/favorite', [ContractController::class, 'favorite'])->name('favoritePost');
    Route::post('/favoriteDelete', [ContractController::class, 'favoriteDelete'])->name('favoritePostDelete');


    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');
});

