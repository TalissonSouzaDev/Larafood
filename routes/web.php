<?php
Route::get('admin/plans/create','Admin\plansController@create')->name('plano.create');

Route::get('admin/plans/detalhe/{url}/edita','Admin\plansController@edit')->name('plano.edit');
Route::any('admin/plans/search','Admin\plansController@search')->name('plano.search');
Route::delete('admin/plans/{url}','Admin\plansController@delete')->name('plano.delete');
Route::get('admin/plans/detalhe/{url}','Admin\plansController@show')->name('plano.show');
Route::post('admin/plans','Admin\plansController@store')->name('plano.store');
Route::put('admin/plans/update/{url}','Admin\plansController@update')->name('plano.update');
Route::get('admin/planos','Admin\plansController@index')->name('plano.index');

Route::get('/home','Admin\plansController@index')->name('admin.index');



Route::get('/', function () {
    return view('welcome');
});
?>