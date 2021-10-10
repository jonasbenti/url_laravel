<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UrlRequestController;

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
// Route::resource('/index', UrlController::class);
Route::resource('/urls', UrlController::class)->middleware(['auth']);
Route::resource('/url_request', UrlRequestController::class);

// Route::get('/teste', function () {
//     $response = Http::get('https://viacep.com.br/ws/89306076/json/');

//     dd($response->json(), $response->status());
//     dd($response->status());
// })->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
