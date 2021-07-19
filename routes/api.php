<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RecipesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function (Request $req){
    return 'hello word!';
});

Route::get('/users', [UsersController::class, 'listing']);
Route::post('/users', [UsersController::class, 'create']);
Route::post('/login', [UsersController::class, 'login']);

Route::get('/recipes', [RecipesController::class, 'listing']);
Route::post('/recipes', [RecipesController::class, 'create']);
Route::put('/recipes/{id}', [RecipesController::class, 'update']);

