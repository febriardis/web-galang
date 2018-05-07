@extends('layouts.layout')

@section('title')
	donasi
@endsection

@section('content')
<div class="form-donasi">
   <div class="panel headform" style="background-color: #94b8b8; font-size: 24px; color: #ffffff">
        <div class="panel-heading">
            {{$data->judul}}
        </div>
    </div>
    <form method="POST" action="/donasikan">   
        {{ csrf_field() }}
        <input type="hidden" name="galangid" value="{{ $data->id }}">
        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
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
            <label for="jumlah" class="control-label">Nominal Donasi</label>
            <span class="help-block">Masukkan Nominal Donasi (Minimal Rp. 25.000-,)</span>
            <span class="text-danger">{{ $errors->first('nominal')}}</span> 
            <div class="input-group">
                <span class="input-group-addon"><b>Rp</b></span>
                <input type="text" name="nominal" placeholder="0" class="uang form-control" required="">
            </div>
        </div>
        <div class="form-group">
        	<label for="comment" class="control-label">Komentar</label>
        	<textarea name="komentar" class="form-control" rows="5" placeholder="Berikan Komentar yang mendukung Campaign" required=""></textarea>
        </div>
        <div class="form-group">
        	<label for="bank" class="control-label">Metode Pembayaran</label>
        	<select class="form-control" name="bank" required="">
	            <option value="">-Pilih-</option>
	            <option>Transfer BCA 092131023 a/n Kitamampu.com</option>
	            <option>Transfer BNI 1945832030 a/n Kitamampu.com</option>
	            <option>Transfer BNI SYARIAH 1890208900234 a/n Kitamampu.com</option>
	            <option>Transfer MANDIRI 38927839 a/n Kitamampu.com</option>
	            <option>Transfer BRI 093489000232 a/n Kitamampu.com</option>
        	</select>
        </div>
        <div class="checkbox listcheck">
            <label>
                <input type="checkbox" required=""> Saya Mempercayai Penggalangan ini &amp; Menyetujui <a href="#">Kebijakan</a> &amp; <a href="">Persyaratan Pengguna</a>
            </label>
        </div>
        <div class="form-group">
      		<input type="submit" name="donasi" value="Donasi Sekarang" class="btn btn-info">
        	<input type="reset" id="reset" class="btn btn-danger" value="Batal" >
        </div>
    </form>
</div>
@endsection