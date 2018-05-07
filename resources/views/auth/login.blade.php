@extends('layouts.layout')

@section('title')
	Login
@endsection

@section('content')
	<div class="form-login">
	<center><h3>Masuk</h3></center>
		@if(Session::has('pesan'))
			<div class="alert alert-danger">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Error!</strong> {{ Session::get('pesan') }}
			</div>
		@endif
		<form method="POST" action="/signin">
			{{csrf_field()}}
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" placeholder="username" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" placeholder="***********" class="form-control" required="">
			</div>
			<div class="form-group">
				<input type="submit" value="Masuk" class="btn btn-info">
				<p class="right">Belum Punya Akun? <a href="/daftar">Daftar Sekarang</a></p>
			</div>
		</form>
	</div>
@endsection