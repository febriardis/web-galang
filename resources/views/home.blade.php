@extends('layouts.layout')

@section('title')
	home
@endsection

@section('content')
	<!--Banner-->
  	<div id="myCarousel" class="carousel slide banner" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      	<li data-target="#myCarousel" data-slide-to="1"></li>
	      	<li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	      	<div class="item active">
	        	<img src="/images/ban3.jpg" alt="Los Angeles" style="width:100%; max-height: 550px">
	            <div class="text" style="color: #000000">
	            	<h1>Mari Bergabung Menolong Sesama</h1>      
	              	<p>Ajak keluarga, teman dan sahabat berdonasi secara transparan</p>
	            </div>
	      	</div>
	    	<div class="item">
	        	<img src="/images/ban2.jpg" alt="Chicago" style="width:100%; max-height: 550px">
	            <div class="text">
	            	<h1>Galang Dana Online</h1>    
	             	<p>Ajak keluarga, teman dan sahabat berdonasi secara transparan</p>
	            </div>
	      	</div>
	    	<div class="item">
	        	<img src="/images/ban1.jpg" alt="New york" style="width:100%; max-height: 550px">
	            <div class="text">
	              	<h1>Mari Bergabung</h1>   
	             	<p>Ajak keluarga, teman dan sahabat berdonasi secara transparan</p>
	            </div>
	      	</div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      	<span class="glyphicon glyphicon-chevron-left"></span>
	      	<span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      	<span class="glyphicon glyphicon-chevron-right"></span>
	      	<span class="sr-only">Next</span>
	    </a>
	    <div class="list-banner">
	    	<div style="padding: 20px;">	    		
	    		@foreach($dtcek as $cek)
	    			{{! $jum_str = preg_replace("/[^0-9]/", "", $cek->nominal) }}<!--konversi string ke integer-->
	    			{{! $jum+=$jum_str }}	<!--hitung jumlah-->
	        	@endforeach 
		    	<h3>Donasi Terkumpul : <b>Rp. {{ number_format($jum,0 , "," , ".") }} </b></h3>
	    	</div>
	    </div>
  	</div>
  	<!-- End-Banner-->

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

  	<div style="text-align: center; margin: 20px">
  		<a href="/donasi" class="btn btn-info"><b>Lihat Semua</b></a>
  	</div>
  	<!--content galang dana-->

  	<!-- Contact -->
	<hr>
	<h3 class="text-center">Contact us</h3><br>
	<div id="contact" class="container">
	  	<div class="row">
		    <div class="col-md-4">
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
			    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDimKo7ZeQHmjMvHwazaXvy1TsDWe8u5y8&callback=initMap" async defer>
			    	
			    </script>
		      	<p><span class="glyphicon glyphicon-map-marker"></span> Cibiru, Bandung, Jawa Barat, Indonesia</p>
		      	<p><span class="glyphicon glyphicon-phone"></span> 021 912 315</p>
		    	<p><span class="glyphicon glyphicon-envelope"></span> kitamampu@gmail.com</p>
		    </div>
		    <div class="col-md-8">
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
	  	</div>
	</div>
  	<!-- Contact -->
@endsection