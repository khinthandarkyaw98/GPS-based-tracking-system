<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{ config('app.name', 'GPS Tracking System') }}</title>
	 <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<style>
	@media (min-width: 768px) {
  .navbar-nav.navbar-center {
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
  }
}
.panel{
	min-height: 580px;
	//border: 1px solid;
	border-top: 0 none;
	padding: 15px;
}
 .table-wrapper-2 {
    display: block;
    max-height: 500px;
    overflow-y: auto;
    -ms-overflow-style: -ms-autohiding-scrollbar;
	}
#panel-2{
    display: none;
}
.btn {
    background-color: gray;
    border: none;
	border-radius: 4px;
    color: white;
    padding: 5px 24px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
}
  #map {
        height: 530px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }

</style>


<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="#"><h4>GPS Tracking System</h4></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-center">
				<li id="tab1" onClick="switchOne()"><a href="#"><h4>Real-time Tracking</h4></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">

				<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('driver')->user()->driver_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!--a class="dropdown-item" href="{{ route('admin.home') }}">
                                        {{ __('Home') }}
                                    </a-->
                                    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
			</ul>
		</div>
		</nav>
	<div class="container">
	  <div class="panel" id="panel-1">
		<div>
		 <div id="map"></div>
         <script>
         // Initialize and add the map
         function initMap() {

          var center = {lat: 16.801597, lng: 96.13658};
          var map = new google.maps.Map(
              document.getElementById('map'), {zoom: 16, center: center});
          var marker = new google.maps.Marker({position: center, map: map});
         }
         </script>
         <!--div class="flex-center position-ref full-height">
          <div class="content">
              <div class="title m-b-md" id="app">
                   <example-component></example-component>
              </div>
          </div>
         </div-->
        </div>
	  </div>
	</div>
<script>
	function get(obj){
		return document.getElementById(obj);
	}
	function switchOne(){
		get("panel-1").style.display="block";
	}
	$(document).ready(function(){
		//$('.panel:first').addClass('active');
		switchOne();
	});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2l3xGesW1Cx_Sj_UobTcs0iZrB_djoe8&callback=initMap" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
