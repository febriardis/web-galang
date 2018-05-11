@extends('layouts.layout')

@section('title')
	data donatur
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
	<p>Data partisipasi anda di <a href="/home">KITAMAMPU.org</a></p>    
	<table class="table table-hover">
	    <thead>
	      	<tr>
	            <th>No</th>
	            <th>Nama</th>
	            <th>Nominal Transfer</th>
	            <th>No. Rekening</th>
	            <th>Komentar</th>
	            <th>Status</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	{{! $no = 1 }}

	    	@foreach($data as $dt)
			    <tr>
			    	<td>{{$no++}}</td>
			    	<td>{{ (App\User::find($dt->user_id))->nama }}</td>
			        <td>Rp. {{ number_format($dt->nominal,0 , "," , ".") }}</td>
			        <td style="width: 300px">{{ $dt->bank }}</td>
			        <td>{{ $dt->komentar }}</td>
			        
			        @if($dt->status == 'Processed') <!--jika sedang diproses muncul butoon konffirmasi-->
			        <td>
			        	<span class="label label-warning"><span class="glyphicon glyphicon-refresh"></span> Processed</span>
			        </td>
					@elseif($dt->status == 'Confirmation Process')
					<td>
			       		<label class="label label-warning"><span class="glyphicon glyphicon-refresh"></span> Confirmation Process</label>
			       	</td>
			        @elseif($dt->status == 'Confirmed')
			       	<td>
			       		<label class="label label-success"><span class="glyphicon glyphicon-ok-circle"></span> Confirmed</label>
			       	</td>
			        @endif
			    </tr>
		    @endforeach

	    </tbody>
	</table>
@endsection