@extends('layouts.layout')

@section('title')
	Profile
@endsection

@section('content')
	<h2>Profile</h2>

	@foreach($cekdata as $dt)
		<div>
			{{ $dt->nama }}
		</div>
	@endforeach

@endsection