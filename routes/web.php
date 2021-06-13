<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Comments;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::livewire('/', 'home');

Route::get('/about', About::class)->name("about");
Route::middleware("auth")->group(function () {
    Route::get('/', Comments::class)->name("home");
    Route::get('/logout', Comments::class)->name("logout");
});
Route::middleware("guest")->group(function () {
    Route::get('/login', Login::class)->name("login");
    Route::get('/register', Register::class)->name("register");
});
