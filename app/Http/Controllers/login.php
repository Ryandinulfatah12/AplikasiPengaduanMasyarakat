<?php

namespace App\Http\Controllers;
use App\Pengurus;
use App\Masyarakat;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class login extends Controller
{
    public function login(Request $req)
    {
		$req->validate([
			'username' => 'required',
			'password'=> 'required'
		]);
		$username = $req->username;
		$password = $req->password;

		if (Auth::guard('pengurus')->attempt(['username' => $username, 'password' => $password])) {
			return redirect()->route('petugas.home');
		} elseif(Auth::guard('masyarakat')->attempt(['username' => $username, 'password' => $password])) {
			return redirect()->route('masyarakat.dashboard');
		} else {
			return back()->with('info', 1);
		}
		
    	// $data1 = Masyarakat::where('username',$req->username)->where('password',$req->password)->get();
    	// $data2 = Pengurus::where('username',$req->username)->where('password', $req->password)->get();

    	// if (count($data1)>0) {
    	// 	// login berhasil untuk masyarakat
    	// 	Auth::guard('masyarakat')->LoginUsingId($data1[0]['id']);
    	// 	return redirect()->route('masyarakat.dashboard');
    	// } else if(count($data2)>0){
    	// 	// berhasil login petugas
    	// 	Auth::guard('pengurus')->LoginUsingId($data2[0]['id']);
    	// 	return redirect()->route('petugas.home');
    	// } else {
    	// 	return back()->with('info',1);
    	// }
    	
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
