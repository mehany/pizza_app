<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


//Route::resource('pizzas', 'PizzaController', ['only' => [
//    'index', 'show'
//]]);

Route::post('pizzas/{pizza_id}/toppings', 'PizzaController@addToppings');

Route::get('pizzas/{pizza_id}/toppings', 'PizzaController@getToppings');

Route::resource('pizzas', 'PizzaController');

Route::resource('toppings', 'ToppingController');

