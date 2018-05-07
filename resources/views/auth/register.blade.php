@extends('layouts.layout')

@section('title')
	Register
@endsection

@section('content')
	<div class="form-register">		
		<center><h3>Register</h3></center>
		<form method="POST" action="/regist">
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
				<label>Jenis Kelamin</label>
				<select class="form-control" name="jenkel" required="">
					<option>-Pilih-</option>
					<option>Laki-laki</option>
					<option>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				    <!--js format uang-->
			       	<script src="js-format/jquery.min.js"></script>
			        <script src="js-format/jquery.mask.min.js"></script>
			        <script>
			            $(document).ready(function(){
			                // Format mata uang.
			                $( '.no_hp' ).mask('0000-0000-00000');
			            })
			        </script>
			        <!--end-->
				<span class="text-danger">{{ $errors->first('no_telp')}}</span> 
				<input type="text" name="no_telp" placeholder="08xxxxxxxxx" class="no_hp form-control" required="">
			</div>
			<div class="form-group">
				<label>E-mail</label>
				<input type="email" name="email" placeholder="xxxx@email.anda" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" rows="4" placeholder="alamat lengkap anda" required=""></textarea>
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
			</div>
		</form>
	</div>
@endsection