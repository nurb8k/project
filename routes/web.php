<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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
//
//Route::get('/', function () {
//    return redirect(route('login'));
//});
Route::get('/set/locale/{lang}', function (Request $request, $lang) {
    $request->session()->put('localization', $lang);
    return redirect()->back();
})->name('set.locale');

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('events')->name('web.')
    ->group(function () {
//        Route::get('/', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');
        Route::get('/create', [\App\Http\Controllers\Client\Event\MainController::class, 'create'])->name('events.create');
////        Route::post('/', [\App\Http\Controllers\EventController::class, 'store'])->name('events.store');
        Route::get('/{event}', [\App\Http\Controllers\Client\Event\MainController::class, 'show'])->name('events.show');
//        Route::get('/{event}/edit', [\App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
////        Route::put('/{event}', [\App\Http\Controllers\EventController::class, 'update'])->name('events.update');
//        Route::delete('/{event}', [\App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
    });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__ . '/auth.php';
