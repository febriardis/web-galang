@extends('layouts.layout')

@section('title')
	Admin
@endsection

@section('content')
	<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
	    <div class="panel-heading">
	       	<a class="left" href="#" style="color: #fff">Data Donatur</a>
	       	<div class="left" style="margin: 3px">
		    	<i class="glyphicon glyphicon-menu-right"></i>
	    	</div>
	       	<a href="">Kitamampu.org</a>
	  	</div>
		<div class="clear"></div>
	</div>

	<a href="{{ url('/cetak donasi') }}" class="btn btn-default"><span class="glyphicon glyphicon-download-alt"></span> Download PDF</a>

	@if(Session::has('pesan'))        
		<span class="label label-info">{{Session::get('pesan')}}</span>
	@endif

	<table class="table table-hover">
	    <thead>
	      	<tr>
	      		<th>No</th>
	      		<th style="width: 70px">ID User</th>
	      		<th>Nama</th>
		        <th style="width: 250px">Judul</th>
		        <th>Nominal</th>
		        <th>Metode Transfer</th>
		        <th>Bukti Transfer</th>
		        <th class="lose">Status</th>
		        <th class="lose">Opsi</th>
		    </tr>
	    </thead>
	    <tbody>
	    	{{! $no = 1 }}
	    	@foreach($data as $dt)
	    	<tr>
	    		<td> {{ $no++ }} </td>
	    		<td style="text-align: center;"> {{ $dt->user_id}} </td>
	    		<td> {{ (App\User::find($dt->user_id))->nama }} </td>
	    		<td> {{ $dt->judul }} </td>
	    		<td> {{ $dt->nominal }} </td>
	    		<td> {{ $dt->no_rek }} </td>
	    		<!-- cek -->
		        <div style="display: none;">
	            	{{! $cektb = (App\Konfirmasi::where('donasi_id', 32))->first() }}
	            </div>
	            <!-- end -->
	            <td style="width: 120px; height: 150px"> 
           			<img src="{{ url('uploads/file/'.$cektb->bukti) }}" style="width: 100%; height: 100%"> 
           		</td>
	    	@if($dt->status == 'Processed')
	    		<td><span class="label label-warning"><span class="glyphicon glyphicon-refresh"></span> Processed</span></td>
	    		<td>
	    			<a href="/validasi/{{ $dt->donasi_id }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-check"></span> Validation </a>
	    		</td>
	    	@elseif($dt->status == 'Confirmed')
	    		<td><label class="label label-success"><span class="glyphicon glyphicon-ok-circle"></span> Validated</label></td>
	    		<td><a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-ban-circle"></span> No action </a></td>
	   		@endif
	    	</tr>
	    	@endforeach
	    </tbody>
	</table>
@endsection