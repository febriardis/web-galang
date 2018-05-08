<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galang;
use App\Donasi;
use App\User;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    function home() {
    	$tb = Galang::inRandomOrder()->limit(3)->get();
    	$tb2 = Donasi::where('status', 'Confirmed')->get();

    	return view('home')
    	->with('data', $tb)
        ->with('nil', 0)
    	->with('jum', 0)
    	->with('dtcek', $tb2);
    }

    function load() {
    	$tb = Galang::inRandomOrder()->get();
   
    	return view('load_home')
    	->with('data', $tb)
        ->with('nil', 1);
    }

    function profile($id) {
        $tabel = User::find($id);

        return view('user.profile')
        ->with('cekdata', $tabel);
    }

    function editUser(Request $req, $id){
        $this->validate($req, [
            'foto' => 'required|file|max:2000', //max 2MB
        ]);

            $table = User::find($id);
            $table->nama = $req->nama;
            $table->jenkel = $req->jenkel;
            $table->no_telp = $req->no_telp;
            $table->email = $req->email;

            $file = $req->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            
            $table->foto = $newName;
            $table->alamat = $req->alamat;
            $table->username = $req->username;
            $table->save();

            return redirect('/dashboard');
    }
}
