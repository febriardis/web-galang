@extends('layouts.layout')

@section('title')
	dashboard
@endsection

@section('content')
<div class="panel" style="background-color: #b3cccc; font-size: 24px; color: #ffffff">
    <div class="panel-heading">
       	<a href="#" style="color: #fff">Dashboard</a>
  	</div>
	<div class="clear"></div>
</div>

<div style="width: 90%; margin: 0px auto">
	<a href="/data galang/{{ Auth::user()->id }}">
	<div class="menudashboard">
		<img src="/images/galangku.png" style="padding: 10px; width: 320px;height: 270px">
		<h3>Galang-ku</h3>
	</div>
	</a>

	<a href="/data donasi/{{ Auth::user()->id }}">
	<div class="menudashboard">
		<img src="/images/donate2.png" style="padding: 10px; width: 280px;height: 270px">
		<h3>Donasi-ku</h3>
	</div>
	</a>

	<a href="{{url('/galang dana')}}">
	<div class="menudashboard">
		<img src="/images/campaign-icon.png" style="padding: 10px; width: 345px;height: 270px">
		<h3>Galang Dana</h3>
	</div>
	</a>
</div>
@endsection