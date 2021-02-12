<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//controllers 

use App\Http\controllers\SongController;
use App\Http\controllers\UserController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::group(['middleware' => ['auth:sanctum', 'verified'] ], function() {

	Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
	})->name('dashboard');

    //CRUD Songs
	Route::get('/songs',[SongController::class,'index'])->name('songs');
    Route::get('/songs/{id}', [SongController::class,'show'])->name('detailSong');
	Route::post('/songs',[SongController::class,'store'])->name('createSong');


    Route::put('/songs/{id}',[SongController::class,'update'])->name('songs.update');
    Route::get('/delete/{id}',[SongController::class,'destroy'])->name('songs.destroy');

    //génération lien 
    Route::get('/generate',[SongController::class,'generate'])->name('songs.generate');
});


