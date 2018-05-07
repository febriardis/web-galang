@extends('layouts.layout')

@section('title')
	konfirmasi donasi
@endsection

@section('content')
<div class="form-konf-donasi">
	<div class="panel headform" style="background-color: #94b8b8; font-size: 24px; color: #ffffff">
        <div class="panel-heading">
            Konfirmasi Donasi
        </div>
    </div>
    <form action="/konfirmasi/{{$cek->id}}/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="donasiID" value="{{ $cek->id }}">
        <div class="form-group">
        	<label for="jumlah" class="control-label">Nominal Donasi</label>
        	<span class="help-block">Masukkan Nominal Donasi (Isi sesuai dengan besar nominal transfer).</span>
            @if(Session::has('pesan'))
                <span class="label label-danger">{{ Session::get('pesan') }}</span>
            @endif
        	<div class="input-group">
    		    <span class="input-group-addon"><b>Rp</b></span>
            	<input type="number" name="nominal" placeholder="0" class="form-control" required="">
          	</div>
        </div>
         
        <div class="form-group">
            <label for="foto" class="control-label">Bukti Transfer</label>
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
            <input type="file" name="gambar" class="form-control" onchange="readURL(this);"  required="" accept="image/*">
            <div class="showimage-bukti">
                <img id="cek-gambar" src="#" alt="Masukkan Gambar">
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="konfirmasi" value="Konfirmasi" class="btn btn-info"/>
            <a href="/data donasi/{{ Auth::user()->id }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection