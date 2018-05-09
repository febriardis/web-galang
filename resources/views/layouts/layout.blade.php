<!DOCTYPE html>
<html>
	<head>
		<title>KitaMampu | @yield('title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/styleme.css">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>	
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar-me">
			<div class="center">
			@guest
				<div class="brand left">
					Kitamampu.org
				</div>
				<ul class="nav-me left">
					<li><a href="/">Home</a></li><span>|</span>
					<li><a href="/masuk">Donasi</a></li><span>|</span>
					<li><a href="/masuk">Galang Dana</a></li><span>|</span>
					<li><a href="#">About</a></li></li>
				</ul>
				<ul class="nav-me right">
					<li><a href="/daftar">Daftar</a></li><span>|</span>
					<li><a href="/masuk">Masuk</a></li></li>
				</ul>
			@elseif(Auth::guard('users')->check())
				<div class="brand left">
					Kitamampu.org
				</div>
				<ul class="nav-me left">
					<li><a href="{{url('/home')}}">Home</a></li><span>|</span>
					<li><a href="{{url('/dashboard')}}">Dashboard</a></li><span>|</span>
					<li><a href="{{url('/donasi')}}">Donasi</a></li><span>|</span>
					<li><a href="{{url('/galang dana')}}">Galang Dana</a></li><span>|</span>
					<li><a href="#">About</a></li></li>
				</ul>
				<ul class="nav-me right">
					<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->nama }}
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				        	<li><a href="/{{ Auth::user()->id }}/profile">{{ Auth::user()->nama }}</a></li>
							<li><a href="/logout">Keluar</a></li>
				        </ul>
			      	</li>
				</ul>
			@elseif(Auth::guard('admins')->check())
				<div class="brand left">
					Kitamampu.org
				</div>
				<ul class="nav-me left">
					<li><a href="{{ url('/home admin') }}">Dashboard</a></li><span>|</span>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Data Master
						<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				        	<li><a href="{{ url('/data galang') }}">Data Galang</a></li>
							<li><a href="{{ url('/data donasi') }}">Data Donatur</a></li>
							<li><a href="{{ url('/data user') }}">Data User</a></li>
				        </ul>
					</li><span>|</span>					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Cetak Laporan
						<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				        	<li><a href="{{ url('/laporan bulanan') }}">Laporan Bulanan</a></li>
							<li><a href="{{ url('/laporan tahunan') }}">Laporan Tahunan</a></li>
				        </ul>
					</li><span>|</span>
					<li><a href="#">About</a></li></li>
				</ul>

				<ul class="nav-me right">
					<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin | {{ Auth::user()->nama }}
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				        	<li><a href="/profile">{{ Auth::user()->nama }}</a></li>
							<li><a href="/logout">Keluar</a></li>
				        </ul>
			      	</li>
				</ul>
			@endguest
			</div>
			<div class="clear"></div>
		</nav>

		<div class="container">
			@yield('content')
		</div>

		<footer class="footer">
			Copyright&copy; granada-project 2018
		</footer>
	</body>
</html>