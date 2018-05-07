@extends('layouts.layout')

@section('title')
	edit galang dana
@endsection

@section('content')
<div class="form-galang">
  <div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
      <div class="panel-heading">
        Edit Data Campaign
      </div>
  </div>
  <form action="/{{$data->id}}/{{ Auth::user()->id }}/update galang" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="form-group">
        	<label for="judul" class="control-label">Judul</label>
        	<input type="text" name="judul" value="{{ $data->judul }}" class="form-control" required="">
        </div>
        
        <div class="form-group">
          <label for="kategori" class="control-label">Kategori</label>
          <select class="form-control" name="kategori">
            <option>{{ $data->kategori }}</option>
            <option>-Pilih kategori-</option>
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
          <span class="text-danger">{{ $errors->first('gambar')}}</span> 
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
          <input type="file" name="gambar" class="form-control" onchange="readURL(this);" value="{{ url('uploads/file/'.$data->foto) }}" accept="image/*">
          <div class="showimage">
            <img id="cek-gambar" src="{{ url('uploads/file/'.$data->foto) }}"" alt="Masukkan Gambar">
          </div>
        </div>
        
        <div class="form-group">
        	<label for="lokasi" class="control-label">Lokasi</label>
         	<select class="form-control" name="lokasi">
              <option>{{ $data->lokasi }}</option>
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
                $( '.uang' ).mask('000.000.000.000.000', {reverse: true});
 
            })
          </script>
          <!--end-->
          <label for="target" class="control-label">Target</label>
          <span class="help-block">Masukkan Target Dana yang Dibutuhkan.</span>
          <div class="input-group">
            <span class="input-group-addon"><b>Rp</b></span>
            <input type="text" name="target" value="{{ $data->target }}" class="uang form-control" required="">
          </div>        
        </div>
         
        <div class="form-group">
        	<label for="deadline" class="control-label">Tanggal Akhir</label>
          	<input type="date" name="deadline" class="form-control" value="{{ $data->tgl_akhir }}"  required="">
        </div>
        
		<div class="checkbox listcheck">
		    <label>
		    	<input type="checkbox" required=""> Saya Menyetujui <a href="#">Kebijakan</a> &amp; <a href="">Persyaratan Pengguna</a>
		    </label>
		</div>
        <div class="form-group">
      		<label for="btn" class="control-label"></label>
      	     <input type="submit" class="btn btn-info" value="Galang Sekarang" />
     		     <a href="/data galang/{{ Auth::user()->id }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection