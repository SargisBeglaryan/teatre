<?php

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
Route::any('/',['uses' => 'IndexController@index', 'as' => 'main']);
Route::get('/halls/{id}',['uses' => 'HallsController@allSeans', 'as' => 'hallSeans']);
Route::get('/films/{id}',['uses' => 'FilmsController@allSeans', 'as' => 'filmSeans']);
Route::post('/buy-ticket',['uses' => 'TicketsController@insertNewTicket', 'as' => 'newBuyedTicket']);
Route::get('/halls/{seans}/{id}',['uses' => 'HallsController@currentSeans', 'as' => 'hallCurrentSeans']);
Route::get('/films/{seans}/{is}',['uses' => 'FilmsController@currentSeans', 'as' => 'filmCurrentSeans']);
// Route::get('/', function () {
//     return view('welcome');
// });
