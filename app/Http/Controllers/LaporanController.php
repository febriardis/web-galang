<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Galang;
use App\DonasiView;

class LaporanController extends Controller
{
    function bulanan() {  	
    	$tb1 = User::all();
    	$tb2 = Galang::all();
    	$tb3 = DonasiView::orderBy('user_id', 'ASC')->where('status', 'Confirmed')->get();

    	return view('admin.laporan_perbulan')
    	->with('tbUser', $tb1)
    	->with('tbGalang', $tb2)
    	->with('tbDonasi', $tb3);
    }

    function cariBulanan(Request $req){
        $query = $req->get('q');

        $tbUser   = User::whereMonth('created_at', $query)->paginate(10);
        $tbGalang = Galang::whereMonth('created_at', $query)->paginate(10);
        $tbDonasi = DonasiView::whereMonth('created_at', $query)->paginate(10);

        return view('admin.laporan_perbulan') //, compact('tbUser', 'tbDonasi', 'tbGalang'));
        ->with('tbUser', $tbUser)
        ->with('tbGalang', $tbGalang)
        ->with('tbDonasi', $tbDonasi);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    function tahunan() {  	
    	$tb1 = User::all();
    	$tb2 = Galang::all();
    	$tb3 = DonasiView::orderBy('user_id', 'ASC')->where('status', 'Confirmed')->get();

    	return view('admin.laporan_pertahun')
    	->with('tbUser', $tb1)
    	->with('tbGalang', $tb2)
    	->with('tbDonasi', $tb3);
    }

    function cariTahunan(Request $req){
        $query = $req->get('q');

        $tbUser   = User::whereYear('created_at', $query)->paginate(10);
        $tbGalang = Galang::whereYear('created_at', $query)->paginate(10);
        $tbDonasi = DonasiView::whereYear('created_at', $query)->paginate(10);

        return view('admin.laporan_pertahun') //, compact('tbUser', 'tbDonasi', 'tbGalang'));
        ->with('tbUser', $tbUser)
        ->with('tbGalang', $tbGalang)
        ->with('tbDonasi', $tbDonasi);
        //->with('pesan', 'hayyy');
    }
}
