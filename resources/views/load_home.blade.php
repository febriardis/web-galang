@extends('layouts.layout')

@section('title')
	donasi
@endsection

@section('content')  	
  	<!--content galang dana-->
  	<div class="content-galang" style="margin-top: 50px;">
    @foreach($data as $dt)
      <div class="panel panel-default panel-me">
            <div class="panel-heading" style="padding:0px">
              <img src="{{ url('uploads/file/'.$dt->foto) }}" style="width: 100%; height: 220px">
            </div>
                <div class="panel-body"> 
                    <b><font size="3px" style="margin-top:20px">{{ $dt->judul }}</font></b>
                  <span class="glyphicon glyphicon-ok-circle"></span>
                    <div class="ket-galang">
                      <div class="ket-g">
                        <p>Terkumpul</p>
                        <!--panggil sum(nominal)-donasi-->
                        <div style="display: none;">
                          {{! $tb = (App\Donasi::where('galang_id', $dt->id)->where('status', 'Confirmed'))->get()->sum('nominal') }}</div>
                        <!-- end -->
                        <b>Rp. {{number_format($tb,0,",",".")}}</b>
                      </div>
                      <div class="ket-g">
                        <p>Target</p>
                        <b>Rp. {{$dt->target}}</b>
                      </div>    
                      <div class="ket-g">
                        <p>Sisa Hari</p>
                        <!--hitung selisih hari-->
                        {{! $tgl_skrng = strtotime(Date("Y-m-d")) }}
                        {{! $tgl_akhr = strtotime($dt->tgl_akhir) }}
                        {{! $tgl = $tgl_akhr - $tgl_skrng }}
                                  <!-- end -->
                        <b>{{ $selisih = ($tgl/24/60/60)}} Hari </b>
                      </div>
                    </div>
                </div>
                <div class="panel-footer">
                  <a href="/{{$dt->id}}/form donasi" class="btn btn-info">Donasi</a>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{ $dt->id }}">Detail</button>
            </div>
        </div>
        <!-- Trigger the modal with a button -->
        
        <!-- Modal -->
        <div id="myModal{{ $dt->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>{{ $dt->judul }}</b></h4>
                  </div>
                  <div class="modal-body">
                    <img src="{{ url('uploads/file/'.$dt->foto) }}" class="img-detail-donasi">
                      <p>{!! $dt->deskripsi !!}</p>
                      <a href="/form donasi" class="btn btn-info">Donasi</a>
                  </div>
                  <div class="modal-footer">
                    <center><p>Publish By <a href="#">{{ (App\User::find($dt->user_id))->nama }}</a></p></center>
                  </div>
              </div>
            </div>
        </div>
        <!--End Modal -->
    @endforeach
        <div class="clear"></div>
    </div>
  	<!--content galang dana-->

    <ul class="pager">
      <li><a href="#">Previous</a></li>
      <li><a href="#">Next</a></li>
    </ul>
@endsection