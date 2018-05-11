@extends('layouts.layout')

@section('title')
	Register
@endsection

@section('content')
	<div class="form-register">		
		<center><h3>Setting Profile</h3></center>
		<form method="POST" action="/{{ Auth::user()->id }}/edit user" enctype="multipart/form-data">
			@if(Session::has('pesan'))
			<div class="alert alert-danger">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Sorry!</strong> {{ Session::get('pesan') }}
			</div>
			@endif
			{{csrf_field()}}

			<div class="form-group">
	            <label for="foto" class="control-label">Foto Profile</label>
	            <span class="text-danger">{{ $errors->first('foto')}}</span> 
	                <!-- js show image -->
	                <script type="text/javascript">
	                    function readURL(input) {
	                      if (input.files && input.files[0]) {
	                        var reader = new FileReader();

	                        reader.onload = function(e) {
	                          $('#cek-gambar')
	                            .attr('src', e.target.result);
	                        };
	                        reader.readAsDataURL(input.files[0]);
	                      }
	                    }
	                </script>
	                <!--end-->
	            <div class="foto-profile">
	                <img id="cek-gambar" src="{{ url('uploads/file/'.$cekdata->foto) }}" style="width: 100%; height: 200px;" alt="">
	                <input type="file" id="files" class="hidden" name="foto" onchange="readURL(this);" accept="image/*">    
	            </div>
	            <div style="text-align: center; margin: 0px auto">
					<label for="files" class="btn btn-default btn-xs">Select file</label>  
	            </div>
	        </div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" value="{{ $cekdata->nama }}" class="form-control">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="jenkel">
					<option>{{ $cekdata->jenkel }}</option>
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
				<input type="text" name="no_telp" value="{{ $cekdata->no_telp }}" class="no_hp form-control">
			</div>

			<div class="form-group">
				<label>E-mail</label>
				<input type="email" name="email" value="{{ $cekdata->email }}" class="form-control">
			</div>
        	
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" rows="4">{{ $cekdata->alamat }}</textarea>
			</div>
			
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" value="{{ $cekdata->username }}" class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Simpan" class="btn btn-info">
				<a href="/dashboard" class="btn btn-danger">Batal</a>
				<script>
				  	function ConfirmDelete() {
				  		var x = confirm("Yakin Akan Berhenti Menjadi Member?");
				  		if (x)
				    		return true;
				  		else
				    		return false;
				  	}
				</script>
				<a href="/{{ $cekdata->id }}/hapusAkun" class="right text-danger"  onclick="return ConfirmDelete()">Hapus Akun {{ Auth::user()->nama }}?</a>
			</div>
		</form>
	</div>
@endsection