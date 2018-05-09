@extends('layouts.layout')

@section('title')
	About
@endsection

@section('content')
<div style="margin-top: 50px">
	<h3>Tentang Website</h3>
	<div style="width: 60%">
		<p>Website ini dibangun untuk membantu memudahkan para donatur menyalurkan dana bantuannya kepada masyrakat yang kurang mampu atau korban bencana alam secara online.</p>
	</div>

	<div class="left">
	    <form method="POST" action="">
	   		{{csrf_field()}}
	    	<div class="row">
		        <div class="col-sm-6 form-group">
		        	<input class="form-control" id="name" name="name" placeholder="Name" type="text" required="">
		        </div>
		        <div class="col-sm-6 form-group">
		        	<input class="form-control" id="email" name="email" placeholder="Email" type="email" required="">
			    </div>
		    </div>
		    		<div class="form-group">
		      			<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5" required=""></textarea>
		      		</div>
		    <div class="row">
		        <div class="col-md-12 form-group">
		        	<input type="submit" class="btn btn-info" value="Kirim">
		        </div>
	      	</div>
	  	</form>
	</div>

	<div class="right">
		<div id="map" style="height: 250px; border: 1px solid #e6e6e6e6; margin-bottom: 10px"></div>
	    <script>
		function initMap() {
		// Create a map object and specify the DOM element for display.
			var map = new google.maps.Map(document.getElementById('map'), {
		    	center: {lat: -6.9163257, lng: 107.71921040000007},
		        zoom: 8
		        });
		    }
		</script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDimKo7ZeQHmjMvHwazaXvy1TsDWe8u5y8&callback=initMap" async defer>	</script>
      	<p><span class="glyphicon glyphicon-map-marker"></span> Cibiru, Bandung, Jawa Barat, Indonesia</p>
      	<p><span class="glyphicon glyphicon-phone"></span> 021 912 315</p>
    	<p><span class="glyphicon glyphicon-envelope"></span> kitamampu@gmail.com</p>
	</div>
</div>
@endsection