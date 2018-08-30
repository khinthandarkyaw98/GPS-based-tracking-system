<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<style >
	@media (min-width: 768px) {
  .navbar-nav.navbar-center {
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
  }
}
.panel{
	min-height: 600px;
	border: 1px solid #c22;
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
				<li><a href="<?php echo e(route('admin.logout')); ?>"><h4>USER Admin <button class="btn" type="submit" >Log Out</button></h4></a></li>
			</ul>
		</div>
		<div class="panel" id="panel-1">
		<div class="container">
  <h2>GPS Tracking System</h2>
          
  <table class="table">
    <thead>
      <tr>
        <th>  </th>
        <th>Object</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><align='Right'><input type="checkbox"></td>
        <td>Group1>></td>
      </tr>
      <tr>
        <td><align='left'><input type="checkbox"></td>
        <td>Bus1</td>
      </tr>
      <tr>
        <td><align='Right'><input type="checkbox"></td>
        <td>Group2>></td>
        
      </tr>
      <tr>
        <td><align='left'><input type="checkbox"></td>
        <td>Bus2</td>
      
        
      </tr>
    </tbody>
  </table>
</div>

		</div>
		<div class="panel" id="panel-2">
			2222222222222
		</div>
		<div class="panel" id="panel-3">
			3333333333333
		</div>
		<div class="panel" id="panel-4">

			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#generatereport" role="tab" data-toggle="tab">Generate Report</a></li>
				<li><a href="#scheduledreports" role="tab" data-toggle="tab">Scheduled Reports</a></li>
				<li><a href="#generatedreports" role="tab" data-toggle="tab">Generated Reports</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			<div class="tab-pane active" id="generatereport">
				



			</div>
			<div class="tab-pane" id="scheduledreports">
				<br>
				<br>
			<table border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
		<tr><td width="50%">
			<table>
				<thead>
					<th>Create Scheduled Reports</th>
				</thead>
				<tr>
					<td>Name:</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Objects</td>
					<td>
						<select style="width: 167px;height: 18px">
					  		<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Zone:</td>
					<td>
						<select style="width: 167px;height: 18px">
					  		<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Stop Duration</td>
					<td>
						<select style="width: 167px;height: 18px">
					  		<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="radio" name="duration">Daily &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="duration">Weekly&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="duration">Monthly&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>Send to email</td>
					<td><input type="text"></td>
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



		</div>
				<div class="tab-pane" id="generatedreports">
					<div class="card">
						<div class="card-body">

							<div class="table-wrapper-2">

								<!--Table-->
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
								<!--Table-->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel" id="panel-5">
			55555555555555
		</div>
	</nav>
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
</script>

</body>
</html>