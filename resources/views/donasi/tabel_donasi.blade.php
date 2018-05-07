@extends('layouts.layout')

@section('title')
	data donasi
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
	    		<a href="#" style="color: #fff;">Donasi-ku</a>
	  		</div>
	  	</div>
	  	<div class="clear"></div>
	</div>
	<p>Data partisipasi anda di <a href="/home">KITAMAMPU.com</a></p>    
	<table class="table table-hover">
	    <thead>
	      	<tr>
	            <th>No</th>
	            <th style="width: 300px">Judul</th>
	            <th>Nominal Transfer</th>
	            <th>No. Rekening</th>
	            <th>Batas Akhir</th>
	            <th>Status</th>
	            <th>Opsi</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	{{! $no = 1 }}
	    	@foreach($datas as $dt)
			    <tr>
			    	<td>{{$no++}}</td>
			        <td>{{ $dt->judul }}</td>
			        <td>Rp. {{ number_format($dt->nominal,0 , "," , ".") }}</td>
			        <td style="width: 300px">{{ $dt->no_rek }}</td>
			        <td>{{ date('d M Y', strtotime($dt->tgl_akhir)) }}</td>
			        
			        @if($dt->status == 'Processed') <!--jika sedang diproses muncul butoon konffirmasi-->
			        <td>
			        	<span class="label label-warning"><span class="glyphicon glyphicon-refresh"></span> Processed</span>
			        </td>
			        <td>          
	              		<a href="/{{ $dt->donasi_id }}/konfirmasi donasi" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-check"></span> Confirm </a>
					</td>
			        @elseif($dt->status == 'Confirmed')
			       	<td>
			       		<label class="label label-success"><span class="glyphicon glyphicon-ok-circle"></span> Confirmed</label>
			       	</td>
			        <td>          
	              		<a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-ban-circle"></span> No action </a>
					</td>
			        @endif
			    </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection