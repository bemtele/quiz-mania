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

/*
Pages No or Little logic
*/

Route::get('/', 'PagesController@index');



/*
QUIZ ROUTING
*/
Route::get('/create','QuizController@create');
Route::post('/saveQuize', 'QuizController@saveQuiz');
Route::get('/quize','QuizController@index');
Route::get('/answermcq','QuizController@showquestion');
Route::post('/checkuseranswer', 'QuizController@checkanswer');
Route::get('/donequestions', 'QuizController@leaderboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
