<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\Galang;
use App\DonasiView;
use App\Konfirmasi;

class DonasiController extends Controller
{
    function donasi($id) {
    	$tabel = Galang::where('id', $id)->first();
    	
    	return view('donasi.form_donasi')
    	->with('data', $tabel);
    }

    function donasikan(Request $req) {
        $this->validate($req, [
            'nominal' => 'required|integer|min:25000', //miniman Rp.25.000
        ]);
        $tabel = new Donasi;
        $tabel->galang_id = $req->galangid;
        $tabel->user_id = $req->userid;
        $tabel->nominal = $req->nominal;
        $tabel->komentar = $req->komentar;
        $tabel->bank = $req->bank;
        $tabel->status = 'Processed';
        $tabel->save();
        return redirect('/donasi');       
    }

    function tabel($id) {
    	$tb = DonasiView::all()->where('user_id', $id);//menampilkan data sesuai user_id

    	return view('donasi.tabel_donasi')
    	->with('datas', $tb);
    }
    
    /////////////////////////////////////////////////////
    function konfirm($id) {
    	$tb = Donasi::where('id', $id)->first();

    	return view('donasi.konfirmasi_donasi')
    	->with('cek', $tb);
    }

    function simpankonfirm(Request $req, $id, $idUser) {
    	$this->validate($req, [
           'gambar' => 'required|mimes:jpeg,jpg,png|max:2048', //max 2MB
        ]);

        $tbCek = Donasi::find($id)->where('nominal', $req->nominal)->get(); //cek nominal_tb == nominal_input 

        if (count($tbCek)==0) {
            return redirect()->action('DonasiController@konfirm', ['id' => $id])
            ->with('pesan', 'nominal tidak sesuai !');
        }else{
            //$tbDonasi = Donasi::find($id); //ubah status ditabel donasi
            //$tbDonasi->status = 'Confirmed';
            //$tbDonasi->save(); 
            //-------------------------------------------
            $tabel = new Konfirmasi;
            $tabel->donasi_id = $req->donasiID;
            $tabel->nominal = $req->nominal;
                $file = $req->file('gambar');
                $ext  = $file->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $file->move('uploads/file',$newName);
            $tabel->bukti = $newName;
            $tabel->save();

            return redirect()->action('DonasiController@tabel', ['id' => $idUser]); //return ke tabel donasi
        }
    }
    /////////////////////////////////////////////////////
}
