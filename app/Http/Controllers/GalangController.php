<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galang;

class GalangController extends Controller
{
    function tambah(Request $req, $idUser) {
    	$this->validate($req, [
            'gambar' => 'required|file|max:2000', //max 2MB
            'judul'  => 'required|string|min:30',
        ]);

    	$tb = new Galang;
		$tb->user_id = $req->user_id;
		$tb->judul = $req->judul;
		$tb->kategori = $req->kategori;

        $file = $req->file('gambar');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/file',$newName);
        
		$tb->foto = $newName;
		$tb->deskripsi = $req->deskripsi;
		$tb->lokasi = $req->lokasi;
		$tb->target = $req->target;
		$tb->tgl_akhir = $req->deadline;
		$tb->save();

		return redirect()->action('GalangController@tabel', ['id' => $idUser])
		->with('pesan','Data berhasil ditambahkan');
    }

    function tabel($id) {
    	$tb = Galang::all()->where('user_id', $id);//menampilkan data sesuai user_id

    	return view('galangdana.tabel_galang_dana')
    	->with('datas', $tb);
    }

    function edit($id) {
    	$tb = Galang::where('id', $id)->first();

    	return view('galangdana.edit_galang_dana')
    	->with('data', $tb);
    }

    function update(Request $req, $id, $idUser) {
    	$this->validate($req, [
            'gambar' => 'required|mimes:jpeg,jpg,png|max:2048', //max 2MB
        ]);
    	
    	$tb = Galang::find($id);
		$tb->judul = $req->judul;
		$tb->kategori = $req->kategori;

        $file = $req->file('gambar');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/file',$newName);
        
		$tb->foto = $newName;
		$tb->lokasi = $req->lokasi;
		$tb->target = $req->target;
		$tb->tgl_akhir = $req->deadline;
		$tb->save();

        return redirect()->action('GalangController@tabel', ['id' => $idUser])
		->with('pesan','Data berhasil diedit');
    }
}
