<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'GPS Tracking System')); ?></title>
	 <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"-->
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
        height: 500px;  /* The height is 400 pixels */
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
				<li id="tab1" onClick="switchTwo()"><a href="#"><h4>Geofence</h4></a></li>
				<li id="tab1" onClick="switchThree()" ><a href="#"><h4>History</h4></a></li>
				<li id="tab1" onClick="switchFour()"><a href="#"><h4>Reports</h4></a></li>
				<li id="tab1" onClick="switchFive()"><a href="#"><h4>Settings</h4></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">

				<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('admin')->user()->admin_name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!--a class="dropdown-item" href="<?php echo e(route('admin.home')); ?>">
                                        <?php echo e(__('Home')); ?>

                                    </a-->
                                    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('alogout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
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
  <!--h2 align="center">GPS Tracking System</h2-->

  <!--br>   
  <br-->
<!--table width="350px" border="1px solid black" >
  <tr>
    <th height="40px"></th>
    <th height="40px">Vehicles</th>
  </tr>
  <tr>
    <td height="50px"><input type="radio" name="vehicle"></td>
        <td height="50px">Vehicle1>></td>
  </tr>
  <tr>
        <td height="50px"><input type="radio" name="vehicle"></td>
        <td height="50px">Vehicle2>></td>        
  </tr>
</table-->
</div>
	</div>


		<div class="panel" id="panel-2">
			
		</div>
		<div class="panel" id="panel-3">
			
		</div>
		<div class="panel" id="panel-4">

			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#generatereport" role="tab" data-toggle="tab">Generate Report</a></li>
				<!--li><a href="#scheduledreports" role="tab" data-toggle="tab">Scheduled Reports</a></li>
				<li><a href="#generatedreports" role="tab" data-toggle="tab">Generated Reports</a></li-->
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			<div class="tab-pane active" id="generatereport">
				<br>
				<br>
				<table>
	<tr><td width="70%">
	<table>
	<form method="POST" action="<?php echo e(route('report.export')); ?>">
	<?php echo csrf_field(); ?>
    <tr>
	<td height="50px">Vehicle Number:</td>
	<td height="50px"><input name="vehicle_number" type="text" height="80px" required></td>
	</tr>
	<!--tr>
	<td height="50px">Objects</td>
	<td height="50px">
<select style="width: 167px;height: 30px">
<option></option>
	</select>
</td>
</tr>
<tr>
<td height="50px">Zone:</td>
<td height="50px">
<select style="width: 167px;height: 30px">
	<option></option>
		</select>
		</td>
	</tr>
		<tr>
		<td height="50px">Stop Duration</td>
		<td height="50px">
		<select style="width: 167px;height: 30px">
  		<option></option>
		</select>
		</td>
		</tr-->
		</table>
	</td>
	<!--td align="center" height="50px">
		Time From:<input type="date" name="fromtime"  height="70px" /></br>
	</br>
		Time To  :<input type="date" name="totime" />
	</td-->
	</tr>
		<tr>
            <td align="center" colspan="2" height="50px">
			<input type="submit" value="Generate">  
			<!--input type="submit" value="Cancel"--></td>
        </tr>
		</form>
</table>


			</div>
			<!--div class="tab-pane" id="scheduledreports">
				<br>
				<br>
				<table border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
		<tr><td width="50%">
			<table>
				<thead>
					<th>Create Scheduled Reports</th>
				</thead>
				<tr>
					<td height="60px">Name:</td>
					<td height="60px"><input type="text"></td>
				</tr>
				<tr>
					<td height="60px" >Objects</td>
					<td height="60px">
						<select style="width: 167px;height: 18px">
					  		<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td height="60px">Zone:</td>
					<td height="60px">
						<select style="width: 167px;height: 18px">
					  		<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td height="60px">Stop Duration</td>
					<td height="60px">
						<select style="width: 167px;height: 18px">
					  		<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2" height="60px"><input type="radio" name="duration">Daily &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="duration">Weekly&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="duration">Monthly&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td height="60px">Send to email</td>
					<td height="60px"><input type="text"></td>
				</tr>
			</table>
		</td>
		<td align="center">
			<h4>Cancel Scheduled Reports</h4>
			Name:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text">
		</td>
		</tr>
		<tr>
            <td align="center" colspan="2"><input type="submit" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 <input type="submit" value="Cancel"></td>
        </tr>
	</table>


		</div-->
				<!--div class="tab-pane" id="generatedreports">
				<br>
				<br>
					<div class="card">
						<div class="card-body">

							<div class="table-wrapper-2">

								<table class="table table-responsive-md">
									<thead class="mdb-color lighten-4">
										<tr>
											<th>#</th>
											<th class="th-lg">Name</th>
											<th class="th-lg">Object</th>
											<th class="th-lg">Zone</th>
											<th class="th-lg">Stop duration</th>
											<th class="th-lg">Time from</th>
											<th class="th-lg">Time to</th>
											<th class="th-lg">Daily</th>
											<th class="th-lg">Weekly</th>
											<th class="th-lg">Monthly</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">5</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">6</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">7</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">8</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
										<tr>
											<th scope="row">9</th>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
											<td>text</td>
										</tr>
									</tbody>
								</table>

							</div>

						</div>
					</div>
				</div-->
			</div>
		</div>

		<div class="panel" id="panel-5">
		<br>

		<ul>
                      
                            <li class="nav-item">
							
                                <a class="nav-link" href="<?php echo e(route('vehicle.view')); ?>"><?php echo e(__('Vehicle')); ?></a>
								
                            </li>
							
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('driver.view')); ?>"><?php echo e(__('Driver')); ?></a>
                            </li>
                            <!--li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('admin.myaccount')); ?>"><?php echo e(__('Myaccount')); ?></a>
                            </li-->

		</div>
		</div>
	<!--/nav-->
<script>
	function get(obj){
		return document.getElementById(obj);
	}
	function switchOne(){
		get("panel-1").style.display="block";
		get("panel-2").style.display="none";
		get("panel-3").style.display="none";
		get("panel-4").style.display="none";
		get("panel-5").style.display="none";
	}
	function switchTwo(){
		get("panel-1").style.display="none";
		get("panel-2").style.display="block";
		get("panel-3").style.display="none";
		get("panel-4").style.display="none";
		get("panel-5").style.display="none";
	}
	function switchThree(){
		get("panel-1").style.display="none";
		get("panel-2").style.display="none";
		get("panel-3").style.display="block";
		get("panel-4").style.display="none";
		get("panel-5").style.display="none";
	}
	function switchFour(){
		get("panel-1").style.display="none";
		get("panel-2").style.display="none";
		get("panel-3").style.display="none";
		get("panel-4").style.display="block";
		get("panel-5").style.display="none";
	}
	function switchFive(){
		get("panel-1").style.display="none";
		get("panel-2").style.display="none";
		get("panel-3").style.display="none";
		get("panel-4").style.display="none";
		get("panel-5").style.display="block";
	}
	$(document).ready(function(){
		//$('.panel:first').addClass('active');
		switchOne();
	});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2l3xGesW1Cx_Sj_UobTcs0iZrB_djoe8&callback=initMap" type="text/javascript"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>