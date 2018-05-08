@extends('layouts.layout')

@section('title')
	galang dana
@endsection

@section('content')
<div class="form-galang">
  <div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
      <div class="panel-heading">
        Galang Dana
      </div>
  </div>
  <form action="/{{ Auth::user()->id }}/simpan galang" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
        	<label for="judul" class="control-label">Judul</label>
          <span class="text-danger">{{ $errors->first('judul')}}</span> 
        	<input type="text" name="judul" placeholder="Masukkan Judul Campaign (contoh:Penggalangan Dana Untuk Operasi Mata Fulan)" class="form-control" required="">
        </div>
        
        <div class="form-group">
          <label for="kategori" class="control-label">Kategori</label>
          <select class="form-control" name="kategori">
            <option value="">-Pilih kategori-</option>
            <option>Balita &amp; Anak Sakit</option>
            <option>Bantuan Medis &amp; Kesehatan</option>
            <option>Beasiswa &amp; Pendidikan</option>
            <option>Bencana Alam</option>
            <option>Difabel</option>
            <option>Family For Family</option>
            <option>Hadiah &amp; Apresiasi</option>
            <option>Karya Kreatif (Film, Buku, dll)</option>
            <option>Kegiatan Sosial</option>
            <option>Lingkungan</option>
            <option>Panti Asuhan</option>
            <option>Rumah Ibadah</option>
            <option>Sarana &amp; Infrastruktur</option>
            <option>Kategori Lainnya</option>
          </select>
        </div>

        <div class="form-group">
        	<label for="foto" class="control-label">Foto</label>
          <span class="help-block"><i> w:350px x h:220px, max 2MB </i></span>
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
          <input type="file" name="gambar" class="form-control" onchange="readURL(this);" accept="image/*" required="">
          <div class="showimage">
            <img id="cek-gambar" src="#" alt="">
          </div>
        </div>
        
        <div class="form-group">
	        <label for="cerita" class="control-label">Deskripsi Lengkap</label>
	    	  <span class="help-block">Ceritakan lengkap latar belakang dan tujuan galang dana.</span>
	        <textarea name="deskripsi" class="ckeditor" id="ckedtor"></textarea>
        </div>

        <div class="form-group">
        	<label for="lokasi" class="control-label">Lokasi</label>
         	<select class="form-control" name="lokasi">
	            <option value="">-Pilih Lokasi-</option>
	            <option value="Sumatera">Sumatera</option>
	            <option value="Kalimantan">Kalimantan</option>
	            <option value="Jawa">Jawa</option>
	            <option value="Sulawesi">Sulawesi</option>
	            <option value="Papua">Papua</option>
          	</select>
        </div>

        <div class="form-group">
        	<!--js format uang-->
          <script src="js-format/jquery.min.js"></script>
          <script src="js-format/jquery.mask.min.js"></script>
          <script>
            $(document).ready(function(){
                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});
            })
          </script>
          <!--end-->
          <label for="target" class="control-label">Target</label>
        	<span class="help-block">Masukkan Target Dana yang Dibutuhkan.</span>
        	<div class="input-group">
    		    <span class="input-group-addon"><b>Rp</b></span>
            <input type="text" name="target" placeholder="0" class="uang form-control" required="">
          </div>        
        </div>
         
        <div class="form-group">
        	<label for="deadline" class="control-label">Tanggal Akhir</label>
          	<input type="date" name="deadline" class="form-control" required="">
        </div>
        
  		  <div class="checkbox listcheck">
  		    <label>
  		    	<input type="checkbox" required=""> Saya Menyetujui <a href="#">Kebijakan</a> &amp; <a href="">Persyaratan Pengguna</a>
  		    </label>
  		  </div>
        <div class="form-group">
      		<label for="btn" class="control-label"></label>
      	  	<input type="submit" name="galang" class="btn btn-info" value="Galang Sekarang" />
     		<input type="reset" class="btn btn-danger" value="Batal" />
        </div>
    </form>
</div>
@endsection