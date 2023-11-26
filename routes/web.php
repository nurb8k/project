<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
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
Route::get('/set/locale/{lang}', function (Request $request, $lang){
        $request->session()->put('localization',$lang);
        return redirect()->back();
})->name('set.locale');


Route::get('/', [HomeController::class, 'index'])->name('home');

