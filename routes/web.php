<?php

use App\Http\Controllers\ClickMapController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\TestStatus\Risky;

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
    return view('welcome');
});
Route::get('/page2', function () {
    return view('page2');
});


Route::get('/clickmap.js/{code}', function ($code)  {
    return view('clickmap',['code'=>$code]);
});

// Route::view('/clickmap.js/{code}', 'clickmap',['CODE'=>$code]);


Route::get('/click', function () {
    return view('clickmap');
});



Route::get('/check', [ClickMapController::class,'ClickCheck']);

