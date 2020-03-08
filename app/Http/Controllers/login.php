<?php

namespace App\Http\Controllers;
use App\Pengurus;
use App\Masyarakat;
use Auth;
use Illuminate\Http\Request;

class login extends Controller
{
    public function login(Request $req)
    {
    	$data1 = Masyarakat::where('username',$req->username)->where('password',$req->password)->get();
    	$data2 = Pengurus::where('username',$req->username)->where('password',$req->password)->get();

    	if (count($data1)>0) {
    		// login berhasil untuk masyarakat
    		Auth::guard('masyarakat')->LoginUsingId($data1[0]['id']);
    		return redirect()->route('masyarakat.dashboard');
    	} else if(count($data2)>0){
    		// berhasil login petugas
    		Auth::guard('pengurus')->LoginUsingId($data2[0]['id']);
    		return redirect()->route('petugas.home');
    	} else {
    		return back()->with('info',1);
    	}
    	
    }

    public function logout()
    {
    	if (Auth::guard('masyarakat')->check()) {
    		Auth::guard('masyarakat')->logout();
    	} else if(Auth::guard('pengurus')->check()) {
    		Auth::guard('pengurus')->logout();
    	}
    	return redirect()->route('login');    	
    }
}
