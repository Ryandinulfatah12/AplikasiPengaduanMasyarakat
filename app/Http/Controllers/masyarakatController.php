<?php

namespace App\Http\Controllers;
use App\Masyarakat;
use App\Pengaduan;
use App\Tanggapan;
use Auth;
use Illuminate\Http\Request;

class masyarakatController extends Controller
{
    public function index(Request $req)
    {
    	$masyarakat = Masyarakat::all();
    	return view('petugas.pages.masyarakat.masyarakat', compact('masyarakat'));
    }

    public function add()
    {
    	return view('petugas.pages.masyarakat.mas-tambah');
    }

    public function save(Request $req)
    {
    	\Validator::make($req->all(), [
    		'fullname'=>'required|between:3,100',
    		'username'=>'required|between:4,50|unique:petugas,username|alpha_dash',
            'username'=>'required|between:4,50|unique:masyarakat,username|alpha_dash',
    		'password'=>'nullable|min:6',
    		'repassword'=>'same:password',
    		'telp'=>'required:max:11',
    		'nik'=>'required:max:17',
            'nik'=>'required:min:17'
    	])->validate();

    	$petugas = new Masyarakat;
    	$petugas->fullname = $req->fullname;
    	$petugas->username = $req->username;
    	$petugas->password = $req->password;
    	$petugas->telp = $req->telp;
    	$petugas->nik = $req->nik;
        if ($petugas->save()) {
            alert()->success('Data Berhasil Ditambahkan.','Tersimpan!')->persistent('Ok');
            return redirect()->route('data.mas');
        }
        
    }

    public function edit($id)
    {
        $masyarakat = Masyarakat::where('id',$id)->first();
        return view('petugas.pages.masyarakat.mas-edit',compact('masyarakat'));
    }

    public function update(Request $req) {
        \Validator::make($req->all(), [
            'fullname'=>'required|between:3,100',
            'username'=>'required|between:4,50|unique:petugas,username,'.$req->id.',|alpha_dash',
            'username'=>'required|between:4,50|unique:masyarakat,username,'.$req->id.',|alpha_dash',
            'telp'=>'required',
            'password'=>'nullable|min:6',
            'repassword'=>'same:password',
            'nik'=>'required:max:17',
            'nik'=>'required:min:17'
        ])->validate();

        if(!empty($req->password)) {
            $field = [
                'fullname'=>$req->fullname,
                'username'=>$req->username,
                'telp'=>$req->telp,
                'nik'=>$req->nik,
                'password'=>$req->password,
            ];
        } else {
            $field = [
                'fullname'=>$req->fullname,
                'username'=>$req->username,
                'telp'=>$req->telp,
                'nik'=>$req->nik,
            ];
        }

        $result = Masyarakat::where('id',$req->id)->update($field);

        if ($result) {
            alert()->success('Berhasil Mengupdate Data.', 'Terupdate!')->persistent('Ok');
            return redirect()->route('data.mas');
        } else {
            alert()->info('Harap Periksa lagi data Formulir anda.','Tidak Tersimpan!')->autoclose(4000);
        }
        
    }

    public function destroy(Request $req)
    {
        $discount = Masyarakat::find($req->id);
        if($discount->delete()) {
            alert()->success('Data Berhasil Terhapus dari Database.', 'Terhapus!')->persistent('Ok');
            return redirect()->route('data.mas');
        }
    }

    public function dashboard()
    {
        $riwayat = Pengaduan::where('masyarakat_id', Auth::id())->orderBy('updated_at','desc')->get();
        return view('masyarakat.dashboard',compact('riwayat'));
    }

    public function detail(Request $req)
    {
        $show = Pengaduan::join('masyarakat','masyarakat.id','pengaduan.masyarakat_id')
            ->where('pengaduan.id', $req->id)
            ->select('pengaduan.*','fullname')
            ->first();

        $show2 = Tanggapan::join('pengaduan','pengaduan.id','tanggapan.pengaduan_id')
            ->join('petugas','petugas.id','tanggapan.petugas_id')
            ->select('tanggapan.*','pengaduan.*','petugas.fullname')
            ->where('tanggapan.pengaduan_id', $req->id)
            ->get();
            
        return view('masyarakat.detail', compact('show'), compact('show2'));
    }

    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $req)
    {
        \Validator::make($req->all(), [
            'fullname'=>'required|between:3,100',
            'username'=>'required|between:4,50|unique:petugas,username|alpha_dash',
            'username'=>'required|between:4,50|unique:masyarakat,username|alpha_dash',
            'password'=>'nullable|min:6',
            'repassword'=>'same:password',
            'telp'=>'required:max:11',
            'nik'=>'required:max:17',
            'nik'=>'required:min:17',
        ])->validate();

        $register = new Masyarakat;
        $register->fullname = $req->fullname;
        $register->username = $req->username;
        $register->password = $req->password;
        $register->telp = $req->telp;
        $register->nik = $req->nik;
        if ($register->save()) {
            return back()->with('info','register');
        }
    }
}
