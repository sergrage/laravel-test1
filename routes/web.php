<?php


//Route::get('/', 'IndexController@index');
//Route::get('/{id}', 'IndexController@show');

Route::resource('/articles', 'IndexController');




Auth::routes();


