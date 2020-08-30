<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthGuard;
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
Route::get('/', function () {
    return redirect('/login');
});

Route::group([ "prefix" => "user" , "middleware" => [AuthGuard::class] ] , function () {
    Route::group([ "prefix" => "items" ], function(){
       Route::get('/', 'ItemController@show' );
       Route::post('/', 'ItemController@create' );
       Route::post('/status/{id}', 'ItemController@changeStatus');
       Route::delete('/{id}', 'ItemController@delete');
    });
});


Route::group([ "prefix" => "auth" ] , function () {

    Route::post('/login','AuthController@login');
    Route::post('/register','AuthController@register');
    Route::get('/logout','AuthController@logout');
    
});

Route::get('/login','AuthController@showLogin');
Route::get('/register','AuthController@showRegister');