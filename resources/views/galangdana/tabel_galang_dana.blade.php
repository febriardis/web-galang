@extends('layouts.layout')

@section('title')
	data campaign
@endsection

@section('content')
	<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
	    <div class="panel-heading">
	    	<div class="left">
		    	<a href="/dashboard" style="color: #fff;">Dashboard</a>
	    	</div>
	    	<div class="left" style="margin: 3px">
		    	<i class="glyphicon glyphicon-menu-right"></i>
	    	</div>
	    	<div class="left">
	    		<a href="#" style="color: #fff;">Galang-ku</a>
	  		</div>
	  	</div>
	  	<div class="clear"></div>
	</div>

	<h2>Data Galang</h2>
	<p>Dana yang anda kumpulkan di <a href="/home">KITAMAMPU.org</a></p>    
	<a href="/galang dana" class="btn btn-default">Tambah</a>
	@if(Session::has('pesan'))        
		<span class="label label-info">{{Session::get('pesan')}}</span>
	@endif
	<table class="table table-hover">
	    <thead>
	      	<tr>
	      		<th>No</th>
		        <th style="width: 300px">Judul</th>
		        <th>Kategori</th>
		        <th>Lokasi</th>
		        <th>Dana Terkumpul</th>
		        <th>Target Dana</th>
		        <th>Batas Akhir</th>
		        <th>Aksi</th>
		    </tr>
	    </thead>
	    <tbody>
	    	{{!$no = 1}}
	    	@foreach($datas as $dt)
		    <tr>
		    	<td>{{ $no++}}</td>
		        <td>{{ $dt->judul }}</td>
		        <td>{{ $dt->kategori }}</td>
		        <td>{{ $dt->lokasi }}</td>  
		        <!-- cek -->
		        <div style="display: none;">
	            	{{! $tb = (App\Donasi::where('galang_id', $dt->id)->where('status', 'Confirmed'))->get()->sum('nominal') }}
	            </div>
	            <!-- end -->
	            <td>Rp. {{number_format($tb,0, ",", ".")}}</td>
		        <td>Rp. {{$dt->target}}</td>
		        <td>{{ date('d M Y', strtotime($dt->tgl_akhir)) }}</td>
		        <td>          
              		<a href="/{{ $dt->id }}/edit galang dana" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
              		<a href="/{{ $dt->id }}/show donatur" class="btn btn-info btn-xs"> Lihat Donatur </a>
				</td>
		    </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection