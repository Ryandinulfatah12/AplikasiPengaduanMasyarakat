<?php
Route::get('/', function() {
	return view('login');
})->middleware('guest')->name('login');
Route::get('/register','masyarakatController@register')->name('register');
Route::post('registerpost','masyarakatController@registerPost')->name('post.register');
Route::post('/kirimlogin', 'login@login')->name('kirimlogin');
Route::get('/logout','login@logout')->name('logout');

// petugas
Route::group(['prefix'=>'petugas','middleware'=>['auth:pengurus']], function() {
	Route::get('/', function(){
		// pengaduan diterima
		$pengaduanditerima = App\Pengaduan::where('status','ditanggapi')->get();
		$chart = [];
		foreach($pengaduanditerima as $data) {
			$chart[] = $data->count();
		}
		return view('petugas.dashboard', compact('chart'));
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
	Route::group(['prefix' => 'pengaduan', 'middleware'=>['auth']], function() {
		Route::get('/','pengaduanController@index')->name('data.pengaduan');
		Route::get('/entri','pengaduanController@entri')->name('verifikasi');
		Route::get('/show/{id}','pengaduanController@detail')->name('show.pengaduan');
		Route::get('/tanggapan/{id}','pengaduanController@getEntri')->name('getEntri');
		Route::post('kirimtanggapan','pengaduanController@tanggapanPost')->name('kirim.tanggapan');
		Route::get('/tolak/{id}','pengaduanController@tolakEntri')->name('tolak.entri');
		Route::get('/clear/{id}','pengaduanController@clearTanggapan')->name('clear.tanggapan');

	});

	Route::group(['prefix' => 'report','middleware'=>['auth']], function() {
		Route::get('/pdf','reportController@pengaduan')->name('pengaduan.pdf');
	});

});

// Masyarakat
Route::group(['prefix'=>'user','middleware'=>['auth:masyarakat']], function() {
	Route::get('/','masyarakatController@dashboard')->name('masyarakat.dashboard');
	Route::get('/detail/{id}','masyarakatController@detail')->name('detail.pengaduan2');
	Route::get('/tulis','pengaduanController@tulis')->name('buat.pengaduan');
	Route::post('/kirimpengaduan','pengaduanController@postPengaduan')->name('post.pengaduan');
	
});