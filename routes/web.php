<?php

use Illuminate\Support\Facades\Route;

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

// Route::view('/', 'welcome');
Route::get('/', 'CocktailsController@index');

Route::resource('users', 'UsersController');
Route::get('users', 'UsersController@index');
Route::get('users/{id}', 'UsersController@show');

Route::resource('ingredients', 'IngredientsController');
Route::get('ingredients-types', 'IngredientsController@types');
Route::get('ingredients-type/{name}', 'IngredientsController@type');
Route::get('ingredients/pivot/{id}', 'IngredientsController@pivot');

Route::resource('cocktails', 'CocktailsController');
Route::get('cocktails/{id}', 'CocktailsController@show');
Route::post('cocktails/store', 'CocktailsController@store');
Route::get('cocktails/pivot/{id}', 'CocktailsController@pivot');

Route::get('cocktails-categories', 'CocktailsController@categories');
Route::get('cocktails-category/{name}', 'CocktailsController@category');

Route::get('cocktails-ibas', 'CocktailsController@ibas');
Route::get('cocktails-iba/{name}', 'CocktailsController@iba');

Route::resource('mix', 'MixController');

/*Route::get('wsdl', function() {
    $params = [];
    $url = "http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL";

    try {
        $client = new SoapClient($url, $params);
        // dd($client->__getTypes());
        dd($client->GetCityForecastByZIP([
            'ZIP' => '94203',
        ]));
    } catch (SoapFault $fault) {
        echo $fault;
    }
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
