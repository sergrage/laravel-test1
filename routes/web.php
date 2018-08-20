<?php


//Route::get('/', 'IndexController@index');

Route::resource('/articles', 'IndexController');

//Route::get('/{id}', 'IndexController@show');


Auth::routes();


