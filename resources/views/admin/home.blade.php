@extends('layouts.layout')

@section('title')
	home admin
@endsection

@section('content')
<div style="background-color: #f2f2f2; height: 100%">
	<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
	    <div class="panel-heading">
	       	<a class="left" href="#" style="color: #fff">Dashboard Admin</a>
	       	<div class="left" style="margin: 3px">
		    	<i class="glyphicon glyphicon-menu-right"></i>
	    	</div>
	       	<a href="">Kitamampu.org</a>
	  	</div>
		<div class="clear"></div>
	</div>

	<div style="margin: 50px 0px">
		<a href="{{ url('/data admin') }}"><div class="dashAdmin">
			<img src="/images/adm.png">
			<h3>Admin</h3>
			<div style="display: none;">{{! $cek1 = 0 }}
			@foreach($tbAdmin as $tb)
				{{ $cek1++ }}
			@endforeach</div>
			<h4>{{ $cek1 }}</h4>
		</div></a>
		<a href="{{ url('/data user') }}"><div class="dashAdmin">
			<img src="/images/partisipan.png">
			<h3>Partisipan</h3>
			<div style="display: none;">{{! $cek2 = 0 }}
			@foreach($tbUser as $tb)
				{{ $cek2++ }}
			@endforeach</div>
			<h4>{{ $cek2 }}</h4>
		</div></a>
		<a href="{{ url('/data galang') }}"><div class="dashAdmin">
			<img src="/images/campaign.png">
			<h3>Campaign</h3>
			<div style="display: none;">{{! $cek3 = 0 }}
			@foreach($tbGalang as $tb)
				{{ $cek3++ }}
			@endforeach</div>
			<h4>{{ $cek3 }}</h4>
		</div></a>
		<a href="{{ url('/data donasi') }}"><div class="dashAdmin">
			<img src="/images/donatur.png">
			<h3>Donatur</h3>
			<div style="display: none;">{{! $cek4 = 0 }}
			@foreach($tbDonasi as $tb)
				{{ $cek4++ }}
			@endforeach</div>
			<h4>{{ $cek4 }}</h4>
		</div></a>
		<div class="clear"></div>
	</div>

	<div style="background: #ffffff;  height: 80px; margin: 70px 0px">
		<div style="padding: 20px;">	
				<div style="display: none;">{{ $jum = 0 }}
			    @foreach($tbDonasi as $cek)
	    			{{! $jum_str = preg_replace("/[^0-9]/", "", $cek->nominal) }}<!--konversi string ke integer-->
	    			{{! $jum+=$jum_str }}	<!--hitung jumlah-->
	        	@endforeach  </div>   		
	       	<h3>Donasi Terkumpul : <b>Rp. {{ number_format($jum,0 , "," , ".") }} </b></h3>
	   	</div>
	</div>
	
	<div class="clear"></div>
</div>
@endsection