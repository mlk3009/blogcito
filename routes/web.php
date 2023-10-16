<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionesController;
use App\Models\Publicaciones;

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

Route::get('/', function () {
    return view(
        'mostrarPublicaciones',
        [
            'publicaciones' => Publicaciones::where('activo', true)->get()
        ]
    );
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/publicaciones', [PublicacionesController::class, 'index'])->name('publicaciones.index');

Route::get('/publicaciones/{id}', [PublicacionesController::class, 'view'])->name('publicaciones.view');

Route::post('/publicaciones', [PublicacionesController::class, 'store'])->name('publicaciones.store');
Route::get('/publicaciones/delete/{id}', [PublicacionesController::class, 'destroy'])->name('publicaciones.delete');


require __DIR__ . '/auth.php';
