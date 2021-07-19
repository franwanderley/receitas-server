<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/storage/recipes/{filename}', function ($filename){   
    if(!Storage::exists('recipes/'.$filename)){
        abort(404);
    }   

    return Storage::download('recipes/'.$filename, $filename);
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function (Request $request) {
    $token = csrf_token();

    return $token;
});
