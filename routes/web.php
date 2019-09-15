<?php

Route::resources([
	'kabupaten' => 'KabupatenController',
	'periode' => 'PeriodeController',
	'partai' => 'PartaiController',
	'calondpd' => 'CalonDPDController',
	'pasloncapres' => 'PaslonCapresController',
	'pemilihan' => 'PemilihanController',
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
























Route::get('/ndaskumumet', 'TempController@index');

Route::get('/materi/mid', 'MateriController@mid')->name('materi.mid');
Route::post('/materi/mid', 'MateriController@simpanMid')->name('materi.simpanMid');
Route::get('/materi/mid/nilai', 'MateriController@nilaiMid')->name('materi.nilaiMid');
Route::delete('/materi/mid/nilai/{id}', 'MateriController@hapusNilaiMid')->name('materi.hapusNilaiMid');
Route::get('/materi/akhir', 'MateriController@akhir')->name('materi.akhir');
Route::post('/materi/akhir', 'MateriController@simpanAkhir')->name('materi.simpanAkhir');
Route::get('/materi/akhir/nilai', 'MateriController@nilaiAkhir')->name('materi.nilaiAkhir');
Route::delete('/materi/akhir/nilai/{id}', 'MateriController@hapusNilaiAkhir')->name('materi.hapusNilaiAkhir');
Route::get('/materi/{id}/berkas', 'MateriController@berkas')->name('materi.berkas');
Route::get('/materi/{id}/ujian', 'MateriController@ujian')->name('materi.ujian');
Route::post('/materi/{id}/ujian', 'MateriController@simpanUjian')->name('materi.simpanUjian');
Route::get('/materi/{id}/nilai', 'MateriController@nilai')->name('materi.nilai');
Route::delete('/materi/{id}/nilai', 'MateriController@hapusNilai')->name('materi.hapusNilai');

Route::get('/soal/{id_narasi}', 'SoalController@index')->name('soal.index');
Route::get('/soal/{id_narasi}/create', 'SoalController@create')->name('soal.create');
Route::post('/soal/{id_narasi}', 'SoalController@store')->name('soal.store');
Route::get('/soal/{id}/edit', 'SoalController@edit')->name('soal.edit');
Route::put('/soal/{id}', 'SoalController@update')->name('soal.update');
Route::delete('/soal/{id}', 'SoalController@destroy')->name('soal.destroy');

Route::get('/narasi/{id_materi}', 'NarasiController@index')->name('narasi.index');
Route::get('/narasi/{id_materi}/create', 'NarasiController@create')->name('narasi.create');
Route::post('/narasi/{id_materi}', 'NarasiController@store')->name('narasi.store');
Route::get('/narasi/{id}/edit', 'NarasiController@edit')->name('narasi.edit');
Route::put('/narasi/{id}', 'NarasiController@update')->name('narasi.update');
Route::delete('/narasi/{id}', 'NarasiController@destroy')->name('narasi.destroy');

Route::resources([
	'materi' => 'MateriController',
	'user' => 'UserController',
	'mid' => 'MidController',
	'akhir' => 'AkhirController',
]);

// ===========================================================================

Route::get('/', 'MainController@index')->name('main.index');
Route::get('/logout', 'MainController@logout')->name('main.logout');
Route::post('/login', 'MainController@login')->name('main.login');

Route::get('/temp', 'TempController@index')->name('temp.index');
Route::post('/temp', 'TempController@sendData')->name('temp.sendData');

Route::middleware(['MustLoggedIn'])->group(function () {
	Route::get('/profil', 'MainController@profil')->name('main.profil');
	Route::put('/profil', 'MainController@saveProfil')->name('main.saveProfil');

	Route::get('/publicajax/getPegawaiWithBidangSektor', 'PublicAjaxController@getPegawaiWithBidangSektor')->name('publicAjax.getPegawaiWithBidangSektor');
	Route::get('/publicajax/getBidangSektor', 'PublicAjaxController@getBidangSektor')->name('publicAjax.getBidangSektor');
	Route::get('/publicajax/getPegawai', 'PublicAjaxController@getPegawai')->name('publicAjax.getPegawai');

	Route::get('/sewakendaraan/{id_kendaraan}', 'SewaKendaraanController@index')->name('sewakendaraan.index');
	Route::get('/sewakendaraan/{id_kendaraan}/create', 'SewaKendaraanController@create')->name('sewakendaraan.create');
	Route::post('/sewakendaraan/{id_kendaraan}', 'SewaKendaraanController@store')->name('sewakendaraan.store');
	Route::get('/sewakendaraan/{id}/edit', 'SewaKendaraanController@edit')->name('sewakendaraan.edit');
	Route::put('/sewakendaraan/{id}', 'SewaKendaraanController@update')->name('sewakendaraan.update');
	Route::delete('/sewakendaraan/{id}', 'SewaKendaraanController@destroy')->name('sewakendaraan.destroy');

	Route::get('/gajisupir/{id_pegawai}', 'GajiSupirController@index')->name('gajisupir.index');
	Route::get('/gajisupir/{id_pegawai}/create', 'GajiSupirController@create')->name('gajisupir.create');
	Route::post('/gajisupir/{id_pegawai}', 'GajiSupirController@store')->name('gajisupir.store');
	Route::get('/gajisupir/{id}/edit', 'GajiSupirController@edit')->name('gajisupir.edit');
	Route::put('/gajisupir/{id}', 'GajiSupirController@update')->name('gajisupir.update');
	Route::delete('/gajisupir/{id}', 'GajiSupirController@destroy')->name('gajisupir.destroy');

	Route::resources([
		'bidangsektor' => 'BidangSektorController',
		'pegawai' => 'PegawaiController',
		'supir' => 'SupirController',
		'petugasjaga' => 'PetugasJagaController',
		'fungsiumum' => 'FungsiUmumController',
		'kendaraan' => 'KendaraanController',
		'pemakaian' => 'PemakaianController',
	]);
});

