<?php
Route::get('/', function() {
	return view('login');
})->middleware('guest')->name('login');
Route::post('/kirimlogin', 'login@login');
Route::get('/logout','login@logout')->name('logout');

// petugas
Route::group(['prefix'=>'petugas','middleware'=>['auth:pengurus']], function() {
	Route::get('/', function(){
		return view('petugas.dashboard');
	})->name('petugas.home');

	// Petugas CRUD
	Route::group(['prefix'=>'admin','middleware'=>['auth']], function() {
		Route::get('/data','petugasController@index')->name('data.petugas');
		Route::get('/tambah','petugasController@add')->name('petugas.tambah');
		Route::post('/add','petugasController@save')->name('save.petugas');
		Route::get('/edit/{id}','petugasController@edit')->name('petugas.edit');
		Route::post('/edit/{id}','petugasController@update')->name('update.petugas');
		Route::delete('/data','petugasController@destroy');
	});

	// Masyarakat CRUD
	Route::group(['prefix'=>'masyarakat','middleware'=>['auth']], function() {
		Route::get('/data','masyarakatController@index')->name('data.mas');
		Route::get('/tambah','masyarakatController@add')->name('mas.tambah');
		Route::post('/add','masyarakatController@save')->name('save.mas');
		Route::get('/edit/{id}','masyarakatController@edit')->name('mas.edit');
		Route::post('/edit/{id}','masyarakatController@update')->name('update.mas');
		Route::delete('/data','masyarakatController@destroy');
	});

	// Pengaduan
	Route::group(['prefix' => 'pengaduan','middleware'=>['auth']], function() {
		Route::get('/','pengaduanController@index')->name('data.pengaduan');
		Route::get('/entri','pengaduanController@entri')->name('verifikasi');
		Route::get('/detail/{id}','pengaduanController@detail')->name('detail.pengaduan');
		Route::get('/tanggapan/{id}','pengaduanController@getEntri')->name('getEntri');
		Route::post('kirimtanggapan','pengaduanController@tanggapanPost')->name('kirim.tanggapan');
		Route::get('/tolak/{id}','pengaduanController@tolakEntri')->name('tolak.entri');
		Route::get('/clear/{id}','pengaduanController@clearTanggapan')->name('clear.tanggapan');

	});

});

// Masyarakat
Route::group(['prefix'=>'user','middleware'=>['auth:masyarakat']], function() {
	Route::get('/', function(){
		return view('masyarakat.dashboard');
	})->name('masyarakat.home');
	Route::get('/tulis','pengaduanController@tulis')->name('buat.pengaduan');
	Route::post('/kirimpengaduan','pengaduanController@postPengaduan')->name('post.pengaduan');
	
});