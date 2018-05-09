@extends('layouts.layout')

@section('title')
	Tambah Admin
@endsection

@section('content')
	<div class="form-register">		
		<center><h3>Tambah Admin <a href="#">Kitamampu.org</a></h3></center>
		<form method="POST" action="/tambah" enctype="multipart/form-data">
			@if(Session::has('pesan'))
			<div class="alert alert-danger">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Sorry!</strong> {{ Session::get('pesan') }}
			</div>
			@endif
			{{csrf_field()}}
			<div class="form-group">
				<label>Nama</label>
				<span class="text-danger">{{ $errors->first('nama')}}</span> 
				<input type="text" name="nama" placeholder="nama lengkap" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Username</label>
				<span class="text-danger">{{ $errors->first('username')}}</span> 
				<input type="text" name="username" placeholder="username" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Password</label>
				<span class="text-danger">{{ $errors->first('password')}}</span> 
				<input type="password" name="password" placeholder="***********" class="form-control" required="">
				<span class="help-block"><i>*kombinasi huruf besar, huruf kecil dan angka, minimal 6 character.</i></span>
			</div>
			<div class="form-group">
				<label>Konfirmasi Password</label>
				<span class="text-danger">{{ $errors->first('password')}}</span>
				<input type="password" name="password_confirmation" placeholder="***********" class="form-control" required="">
			</div>
			<div class="checkbox listcheck">
			    <label>
			    	<input type="checkbox" required=""> Saya Menyetujui <a href="#">Kebijakan</a> &amp; <a href="">Persyaratan Pengguna</a>
			    </label>
			</div>
			<div class="form-group">
				<input type="submit" value="Daftar" class="btn btn-info">
				<a href="{{ url('/data admin') }}" class="btn btn-danger">Batal</a>
			</div>
		</form>
	</div>
@endsection