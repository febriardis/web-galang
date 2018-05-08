@extends('layouts.layout')

@section('title')
	Admin
@endsection

@section('content')
	<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
	    <div class="panel-heading">
	       	<a class="left" href="#" style="color: #fff">Data Galang</a>
	       	<div class="left" style="margin: 3px">
		    	<i class="glyphicon glyphicon-menu-right"></i>
	    	</div>
	       	<a href="">Kitamampu.com</a>
	  	</div>
		<div class="clear"></div>
	</div>

	<a href="#" class="btn btn-default" onClick="window.print();"><i class="glyphicon glyphicon-print"></i> Cetak</a>
	@if(Session::has('pesan'))        
		<span class="label label-info">{{Session::get('pesan')}}</span>
	@endif
	<table class="table table-hover">
	    <thead>
	      	<tr>
	      		<th>No</th>
		        <th style="width: 300px">Judul</th>
		        <th>Kategori</th>
		        <th>Lokasi</th>
		        <th>Dana Terkumpul</th>
		        <th>Target Dana</th>
		        <th>Batas Akhir</th>
		        <th>Aksi</th>
		    </tr>
	    </thead>
	    <tbody>
	    	{{!$no = 1}}
	    	@foreach($data as $dt)
		    <tr>
		    	<td>{{ $no++}}</td>
		        <td>{{ $dt->judul }}</td>
		        <td>{{ $dt->kategori }}</td>
		        <td>{{ $dt->lokasi }}</td>
		        <!-- cek -->
		        <div style="display: none;">
	            	{{! $tb = (App\Donasi::where('galang_id', $dt->id)->where('status', 'Confirmed'))->get()->sum('nominal') }}
	            </div>
	            <!-- end -->
	            <td>Rp. {{number_format($tb,0, ",", ".")}}</td>
		        <td>Rp. {{$dt->target}}</td>
		        <td>{{ date('d M Y', strtotime($dt->tgl_akhir)) }}</td>
		        <td>
              		<a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#myModal{{ $dt->id }}"> <span class="glyphicon glyphicon-eye-open"></span> Show </a>
              		<script> //konfirmasi hapus
					  	function ConfirmDelete() {
					  		var x = confirm("Yakin Ingin Hapus Data User?");
					  		if (x)
					    		return true;
					  		else
					    		return false;
					  	}
					</script>
              		<a href="/{{$dt->id}}/deleteGalang" class="btn btn-danger btn-xs" onclick="return ConfirmDelete()"> <span class="glyphicon glyphicon-remove-circle"></span> Delete </a>
				</td>
		    </tr>

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
	    </tbody>
	</table>
@endsection