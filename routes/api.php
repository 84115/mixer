<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('api')->group(function () {
    Route::get('user', function () {
        return new App\Http\Resources\User(App\User::paginate());
    });
    
    Route::get('user/{id}', function ($id) {
        return new App\Http\Resources\User(App\User::find($id));
    });
    
    Route::get('cocktail', function () {
        return new App\Http\Resources\Cocktail(App\Cocktail::paginate());
    });
    
    Route::get('cocktail/{id}', function ($id) {
        return new App\Http\Resources\Cocktail(App\Cocktail::find($id));
    });
});
