<?php

namespace App\Http\Controllers;

use App\Pengurus;
use Illuminate\Http\Request;
use Alert;

class petugasController extends Controller
{
    public function index(Request $req)
    {
    	$petugas = Pengurus::all();
    	return view('petugas.pages.petugas.petugas', compact('petugas'));
    }

    public function add()
    {
    	return view('petugas.pages.petugas.petugas-tambah');
    }

    public function save(Request $req)
    {
    	\Validator::make($req->all(), [
    		'fullname'=>'required|between:3,100',
    		'username'=>'required|between:4,50|unique:petugas,username|alpha_dash',
    		'password'=>'nullable|min:6',
    		'repassword'=>'same:password',
    		'telp'=>'required:max:11',
    		'level'=>'required',
    	])->validate();

    	$petugas = new Pengurus;
    	$petugas->fullname = $req->fullname;
    	$petugas->username = $req->username;
    	$petugas->password = $req->password;
    	$petugas->telp = $req->telp;
    	$petugas->level = $req->level;
        if ($petugas->save()) {
            alert()->success('Data Berhasil Ditambahkan.','Tersimpan!')->persistent('Ok');
            return redirect()->route('data.petugas');
        }
        
    }

    public function edit($id)
    {
        $petugas = Pengurus::where('id',$id)->first();
        return view('petugas.pages.petugas.petugas-edit',compact('petugas'));
    }

    public function update(Request $req) {
        \Validator::make($req->all(), [
            'fullname'=>'required|between:3,100',
            'username'=>'required|between:4,50|unique:petugas,username,'.$req->id.',|alpha_dash',
            'telp'=>'required',
            'password'=>'nullable|min:6',
            'repassword'=>'same:password',
            'level'=>'required',
        ])->validate();

        if(!empty($req->password)) {
            $field = [
                'fullname'=>$req->fullname,
                'username'=>$req->username,
                'telp'=>$req->telp,
                'level'=>$req->level,
                'password'=>$req->password,
            ];
        } else {
            $field = [
                'fullname'=>$req->fullname,
                'username'=>$req->username,
                'telp'=>$req->telp,
                'level'=>$req->level,
            ];
        }

        $result = Pengurus::where('id',$req->id)->update($field);

        if ($result) {
            alert()->success('Berhasil Mengupdate Data.', 'Terupdate!')->persistent('Ok');
            return redirect()->route('data.petugas');
        } else {
            alert()->info('Harap Periksa lagi data Formulir anda.','Tidak Tersimpan!')->autoclose(4000);
        }
        
    }

    public function destroy(Request $req)
    {
        $discount = Pengurus::find($req->id);
        if($discount->delete()) {
            alert()->success('Data Berhasil Terhapus dari Database.', 'Terhapus!')->persistent('Ok');
            return redirect()->route('data.petugas');
        }
    }
}
