<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galang;
use App\Admin;
use App\User;
use App\Donasi;
use App\DonasiView;
use PDF;

class AdminController extends Controller
{
    function home() {
        $tbAdmin = Admin::all();
        $tbUser  = User::all();
        $tbGalang= Galang::all();
        $tbDonasi = Donasi::where('status', 'Confirmed')->get();

    	return view('admin.home')
        ->with('tbAdmin', $tbAdmin)
        ->with('tbUser', $tbUser)
        ->with('tbGalang', $tbGalang)
        ->with('tbDonasi', $tbDonasi);
    }

    ///////////////////////////////////////ADMIN////////////////////////////////////////////////
    function admin() {
        $tb = Admin::all();

        return view('admin.show_data_admin')
        ->with('data', $tb);
    }

    function tambahAdmin(Request $req){
        $tbCek = Admin::where('username', $req->username)->get();
        $this->validate($req, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|min:6|max:255',
            'password' => 'required|string|min:6|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
        ]);
        
        if (count($tbCek) !=0 ) {
            return redirect('/tambah admin')
            ->with('pesan', 'Username Sudah Terdaftar');
        }
        else {
            $tb = new Admin;
            $tb->nama     = $req->nama;
            $tb->username = $req->username;
            $tb->password = $req->password;
            $tb->save();
            
            return redirect('/data admin')
            ->with('pesan', 'data berhasil ditambah');
        }
    }

    function hapusAdmin($id){
        $barang = Admin::find($id);
        $barang->delete();

        return redirect('/data admin')
        ->with('pesan', 'data berhasil dihapus');
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

    function cetakGalang() {
        $data = Galang::all();
        $pdf = PDF::loadView('admin.cetak_data_galang', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('invoice-campaign('.date("Y-m-d h:i:sa").").".'pdf');
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

    function cetakDonasi() {
        $data = DonasiView::where('status', 'Confirmed')->get(); //all();
        $pdf = PDF::loadView('admin.cetak_data_donatur', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('invoice-donatur('.date("Y-m-d h:i:sa").").".'pdf');
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

    function cetakUser() {
        $data = User::all();
        $pdf = PDF::loadView('admin.cetak_data_user', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('invoice-donatur('.date("d-M-Y h:i:sa").").".'pdf');
    }
}
