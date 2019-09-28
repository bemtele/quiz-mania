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
Pages Controller
*/

Route::get('/', 'PagesController@index');
Route::get('/mathematics','PagesController@math');
Route::get('/science','PagesController@science');
Route::get('/english','PagesController@english');
Route::get('/history','PagesController@history');
Route::get('/general','PagesController@general');



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
