<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController as RegisterController;
use App\Http\Controllers\LoginController as LoginController;

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
    return view('welcome');
});

Route::name('user.')->group(function () {
    Route::middleware('guests')->group(function () {

        Route::get('/login', function () {
            return view('login');
        })->name('login');


        Route::get('/registration', function () {
            if (Auth::check()) {
                return redirect(route('user.private'));
            }
            return view('registration');
        })->name('registration');

        Route::post('/login', [LoginController::class, 'login']);

        Route::post('/registration', [RegisterController::class, 'save']);
    });

    Route::middleware('login')->group(function () {
        Route::get('/logout', function () {
            Auth::logout();
            return redirect(route('user.login'));
        })->name('logout');

        Route::view('/home', 'home')->name('home');

        Route::view('/private', 'private')->name('private');

        Route::get('/test', function () {
            return view('home');
        });
    });
});

