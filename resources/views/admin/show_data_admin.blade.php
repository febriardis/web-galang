@extends('layouts.layout')

@section('title')
	Admin
@endsection

@section('content')
	<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
	    <div class="panel-heading">
	       	<a class="left" href="#" style="color: #fff">Data Admin</a> 
	    	<div class="left" style="margin: 3px">
		    	<i class="glyphicon glyphicon-menu-right"></i>
	    	</div>
	       	<a href="">Kitamampu.org</a>
	  	</div>
		<div class="clear"></div>
	</div>


	<p>Data admin di <a href="/home">KITAMAMPU.org</a></p>    
	<a href="/tambah admin" class="btn btn-default">Tambah</a>
	
	@if(Session::has('pesan'))        
		<span class="label label-info">{{Session::get('pesan')}}</span>
	@endif
	<table class="table table-hover">
	    <thead>
	      	<tr>
	      		<th>No</th>
	      		<th>ID Admin</th>
	      		<th>Nama</th>
		        <th>Username</th>
		        <th>Aksi</th>
		    </tr>
	    </thead>
	    <tbody>
	    	{{! $no=1 }}
	    	@foreach($data as $dt)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $dt->id }}</td>
				<td>{{ $dt->nama }}</td>
				<td>{{ $dt->username }}</td>
				<td>
					<script>
					  	function ConfirmDelete() {
					  		var x = confirm("Yakin Ingin Hapus Data User?");
					  		if (x)
					    		return true;
					  		else
					    		return false;
					  	}
					</script>
	    			<a href="/{{$dt->id}}/deleteAdmin" class="btn btn-danger btn-xs" onclick="return ConfirmDelete()"><span class="glyphicon glyphicon-remove-circle"></span> Delete </a>
				</td>
			</tr>
			@endforeach
	    </tbody>
	</table>
@endsection