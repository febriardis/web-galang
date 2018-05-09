@extends('layouts.layout')

@section('title')
	Admin
@endsection

@section('content')
	<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
	    <div class="panel-heading">
	       	<a class="left" href="#" style="color: #fff">Rekap Data Tahunan</a>
	       	<div class="left" style="margin: 3px">
		    	<i class="glyphicon glyphicon-menu-right"></i>
	    	</div>
	       	<a href="">Kitamampu.org</a>
	  	</div>
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
	 	/*--This JavaScript method for Print command--*/
	 	function PrintDoc() {
		  	var toPrint = document.getElementById('print');
		  	var popupWin = window.open('');
		  	popupWin.document.open();
		  	popupWin.document.write('<html><title>::Print Laporan::</title><link rel="stylesheet" type="text/css" href="css/print.css" /></head><body onload="window.print()">')
		  	popupWin.document.write(toPrint.outerHTML);
		  	popupWin.document.write('</html>');
		  	popupWin.document.close();
		}
	</script>

	<a href="" onclick="PrintDoc()" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</a>
	<!--form search-->
	<div class="srch-control">
	<form action="{{ url('/query tahun') }}" method="GET">
		<label>Tahun : </label> <br>
		<div style="width: 180px;">
			<select name="q" class="form-control left" style="width: 60%">
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
			</select>
			<input type="submit" value="Cari" style="height: 34px">
		</div>
	</form>
	</div>
	<!-- end -->
	@if(Session::has('pesan'))        
		<label>{{Session::get('pesan')}}</label>
	@endif
	<div id="print">
		<h3>Data Partisipan</h3>
		<table class="table table-hover">
	      	<thead>
	        	<tr>
		            <th style="text-align: center;">No</th>
		            <th style="width: 70px">ID User</th>
		            <th>Nama</th>
		            <th>Username</th>
		            <th>Jenis Kelamin</th>
		            <th>No Telp</th>
		            <th>E-mail</th>
		            <th>Alamat</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	      	@if(count($tbUser))
		        {{! $no = 1 }}
		        @foreach($tbUser as $dt)
	        	<tr>
		          	<td style="text-align: center;">{{ $no++ }}</td>
		          	<td style="text-align: center;">{{ $dt->id }}</td>
		          	<td>{{ $dt->nama }}</td>
		          	<td>{{ $dt->username }}</td>
		          	<td>{{ $dt->jenkel }}</td>
		          	<td>{{ $dt->no_telp }}</td>
		          	<td>{{ $dt->email }}</td>
		          	<td>{{ $dt->alamat }}</td>
	        	</tr>
	        @endforeach
	        @else
	        	<span class="label label-danger">Data tidak ditemukan</span>
	        @endif
	      </tbody>
	    </table>

    	<hr>
		
		<h3>Data Campaign</h3>
		<table class="table table-hover">
		    <thead>
		      	<tr>
		      		<th style="text-align: center;">No</th>
			        <th style="width: 300px">Judul</th>
			        <th>Kategori</th>
			        <th>Lokasi</th>
			        <th>Dana Terkumpul</th>
			        <th>Target Dana</th>
			        <th>Batas Akhir</th>
			    </tr>
		    </thead>
		    <tbody>
	      	@if(count($tbGalang))
		    	{{!$no = 1}}
		    	@foreach($tbGalang as $dt)
			    <tr>
			    	<td style="text-align: center;">{{ $no++}}</td>
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
			    </tr>
			    @endforeach
			@else
	        	<span class="label label-danger">Data tidak ditemukan</span>
	        @endif
		    </tbody>
		</table>

		<h3>Data Donatur</h3>
		<table class="table">
	      	<thead>
		        <tr>
		        	<th style="width: 20px;">No</th>
		          	<th style="width: 70px">ID User</th>
		          	<th>Nama</th>
		          	<th>Judul</th>
		          	<th>Nominal</th>
		          	<th>Metode Transfer</th>
		          	<th>Status</th>
		        </tr>
	      	</thead>
	      	<tbody>
	      	@if(count($tbGalang))
		        {{! $no = 1 }}
		        @foreach($tbDonasi as $dt)
		        <tr>
		          	<td style="text-align: center">{{ $no++ }}</td>
		          	<td style="text-align: center">{{ $dt->user_id }}</td>
		          	<td>{{ (App\User::find($dt->user_id))->nama }}</td>
		          	<td>{{ $dt->judul }}</td>
		          	<td>{{ $dt->nominal }}</td>
		          	<td>{{ $dt->no_rek }}</td>
		          	<td><label class="label label-success">{{ $dt->status }}</label></td>
		        </tr>
		        @endforeach
		    @else
	        	<span class="label label-danger">Data tidak ditemukan</span>
	        @endif
	      	</tbody>
    	</table>
	</div>
@endsection