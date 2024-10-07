<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FirstController::class, 'first'])->name('first');
Route::get('/anime/{workId}', [FirstController::class, 'getAnimeDetails'])->name('getAnimeDetails');
Route::get('/animes/{anime}',[FirstController::class,'anime'])->name('anime');
Route::get('/sleds',[FirstController::class,'sled'])->name('sled');
Route::get('/bbc/{id}', [FirstController::class, 'show'])->name('show');
Route::middleware('auth')->group(function () {Route::get('/sleds/create',[FirstController::class,'create'])->name('create');});
Route::resource('bbc',FirstController::class);
Route::resource('comment', FirstController::class);
Route::resource('sleds', FirstController::class);
Route::post('sleds/{sled}/comment', [FirstController::class, 'storeComment'])->name('comment.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/annict',[FirstController::class, 'redirectToAnnict'])->name('auth.annict');
Route::get('/auth/callback',[FirstController::class, 'handleAnnictCallback'])->name('auth.callback');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
