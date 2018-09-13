<?php


//Route::get('/articles/{slug}', 'IndexController@show');
//Route::get('/{id}', 'IndexController@show');



//Route::post('image/upload', 'ImageController@upload')->name('image.upload');
//Route::post('image/upload', 'IndexController@upload')->name('image.upload');

Route::get('/tag/{name}', 'SearchController@searchByTag')->name('tag.search');
Route::get('/author/{name}', 'SearchController@searchByAuthor')->name('author.search');


// Route::get('/articles/{tag}', function($tag){
// 	return 'Hello World' . $tag;
// });


Route::resource('/articles', 'IndexController');


Auth::routes();


