<?php


//Route::get('/articles/{slug}', 'IndexController@show');
//Route::get('/{id}', 'IndexController@show');

Route::resource('/articles', 'IndexController');

//Route::post('image/upload', 'ImageController@upload')->name('image.upload');
Route::post('image/upload', 'IndexController@upload')->name('image.upload');


Auth::routes();


