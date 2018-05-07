<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galang;
use App\User;
use App\Donasi;
use App\DonasiView;

class AdminController extends Controller
{
    function home() {
    	return view('admin.home');
    }
    ///////////////////////////////////////GALANG////////////////////////////////////////////////
    function galang() {
    	$tb = Galang::all();

    	return view('admin.show_data_galang')
    	->with('data', $tb);
    }
    
    function hapusGalang($id) {
    	$barang = Galang::find($id); //where('nama','=', $id);
    	$barang->delete();

    	return redirect('/data galang')
        ->with('pesan', 'data berhasil dihapus');
    }
    ///////////////////////////////////////DONASI////////////////////////////////////////////////
    function donasi() {
    	$tb = DonasiView::orderBy('user_id', 'ASC')->get();

    	return view('admin.show_data_donasi')
    	->with('data', $tb);
    }

    function validasi($id) { //validasi transfer
    	$tbDonasi = Donasi::find($id); //ubah status ditabel donasi
        $tbDonasi->status = 'Confirmed';
        $tbDonasi->save(); 

        return redirect('/data donasi')
        ->with('pesan', 'data berhasil divalidasi');
    }

    ///////////////////////////////////////USER////////////////////////////////////////////////
    function user() {
    	$tbUser = User::all();

    	return view('admin.show_data_user')
    	->with('data', $tbUser);
    }

    function hapusUser($id) {
    	$barang = User::find($id); //where('nama','=', $id);
    	$barang->delete();

    	return redirect('/data user')
        ->with('pesan', 'data berhasil dihapus');
    }
}
