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
    	$tb2 = Donasi::all();

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
        $tabel = User::where('id',$id)->first();

        return view('user.profile')
        ->with('cekdata', $tabel);
    }
}
