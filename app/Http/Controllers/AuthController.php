<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
	function daftar(Request $req) {
		$cekUsername = User::where('username', $req->username)->get();
		$cekEmail    = User::where('email', $req->email)->get();
		$this->validate($req, [
			'nama' => 'required|string|max:255',
			'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
        ]);

		if (count($cekUsername)!=0) {
			return redirect('/daftar')
			->with('pesan', 'Username Sudah Terdaftar');
		}		
		elseif (count($cekEmail)!=0) {
			return redirect('/daftar')
			->with('pesan', 'Email Sudah Terdaftar');
		}		
		else{			
			$table = new User;
			$table->nama = $req->nama;
			$table->jenkel = $req->jenkel;
			$table->no_telp = $req->no_telp;
			$table->email = $req->email;
			$table->alamat = $req->alamat;
			$table->username = $req->username;
			$table->password = Hash::make($req->password);
			$table->save();
			return redirect('/masuk');
		}
	}

	function masuk(Request $req) {
		if (Auth::guard('users')->attempt([
			'username' => $req->username, 
			'password' => $req->password
		])) {
			return redirect('/home');
		}
		
		elseif(Auth::guard('admins')->attempt([
			'username' => $req->username, 
			'password' => $req->password
		])){
			return redirect('/home admin');
		}
		
		else{
			return redirect('/masuk')
			->with('pesan', 'Username atau Password Salah');
		}
	}

	function keluar() {
		if (Auth::guard('users')->check()) {
			Auth::guard('users')->logout();
		}elseif (Auth::guard('admins')->check()) {
			Auth::guard('admins')->logout();
		}
		return redirect('/');
	}

}
