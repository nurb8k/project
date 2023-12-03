<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/set/locale/{lang}', function (Request $request, $lang){
        $request->session()->put('localization',$lang);
        return redirect()->back();
})->name('set.locale');

Route::get('/',function (){
    return redirect()->route('dashbaord');
});
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('events', EventController::class);
});
require __DIR__.'/auth.php';
