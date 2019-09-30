<?php

Route::post('/test/getTableData', 'TestController@getTableData')->name('test.getTableData');
Route::resource('/test', 'TestController');

Route::get('/', 'MainController@index')->name('main.index');
Route::get('/logout', 'MainController@logout')->name('main.logout');
Route::post('/login', 'MainController@login')->name('main.login');

Route::get('/dashboardsuara/{id_pemilihan}/partai', 'MainController@dashboardsuarapartai')->name('dashboard.suarapartai.index');
Route::get('/dashboardsuara/{id_pemilihan}/dpd', 'MainController@dashboardsuaradpd')->name('dashboard.suaradpd.index');
Route::get('/dashboardsuara/{id_pemilihan}/capres', 'MainController@dashboardsuaracapres')->name('dashboard.suaracapres.index');

Route::get('/pdfsuara/{id_pemilihan}/partai', 'MainController@pdfsuarapartai')->name('dashboard.suarapartai.pdf');
Route::get('/pdfsuara/{id_pemilihan}/dpd', 'MainController@pdfsuaradpd')->name('dashboard.suaradpd.pdf');
Route::get('/pdfsuara/{id_pemilihan}/capres', 'MainController@pdfsuaracapres')->name('dashboard.suaracapres.pdf');

Route::middleware(['MustLoggedIn'])->group(function () {
	Route::get('/profil', 'MainController@profil')->name('main.profil');
	Route::put('/profil', 'MainController@saveProfil')->name('main.saveProfil');

	Route::resources([
		'kabupaten' => 'KabupatenController',
		'periode' => 'PeriodeController',
		'partai' => 'PartaiController',
		'calondpd' => 'CalonDPDController',
		'pasloncapres' => 'PaslonCapresController',
		'pemilihan' => 'PemilihanController',
		'user' => 'UserController',
	]);

	Route::get('/detilsuara/{id_suara}', 'DetilSuaraController@index')->name('detilsuara.index');
	Route::get('/detilsuara/{id_suara}/create', 'DetilSuaraController@create')->name('detilsuara.create');
	Route::post('/detilsuara/{id_suara}', 'DetilSuaraController@store')->name('detilsuara.store');
	Route::get('/detilsuara/{id}/edit', 'DetilSuaraController@edit')->name('detilsuara.edit');
	Route::put('/detilsuara/{id}', 'DetilSuaraController@update')->name('detilsuara.update');
	Route::delete('/detilsuara/{id}', 'DetilSuaraController@destroy')->name('detilsuara.destroy');

	Route::get('/suara/{id_pemilihan}', 'SuaraController@index')->name('suara.index');
	Route::get('/suara/{id_pemilihan}/create', 'SuaraController@create')->name('suara.create');
	Route::post('/suara/{id_pemilihan}', 'SuaraController@store')->name('suara.store');
	Route::get('/suara/{id}/edit', 'SuaraController@edit')->name('suara.edit');
	Route::put('/suara/{id}', 'SuaraController@update')->name('suara.update');
	Route::delete('/suara/{id}', 'SuaraController@destroy')->name('suara.destroy');

	Route::get('/kecamatan/{id_kabupaten}', 'KecamatanController@index')->name('kecamatan.index');
	Route::get('/kecamatan/{id_kabupaten}/create', 'KecamatanController@create')->name('kecamatan.create');
	Route::post('/kecamatan/{id_kabupaten}', 'KecamatanController@store')->name('kecamatan.store');
	Route::get('/kecamatan/{id}/edit', 'KecamatanController@edit')->name('kecamatan.edit');
	Route::put('/kecamatan/{id}', 'KecamatanController@update')->name('kecamatan.update');
	Route::delete('/kecamatan/{id}', 'KecamatanController@destroy')->name('kecamatan.destroy');
});