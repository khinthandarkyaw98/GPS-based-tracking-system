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

				<li id="tab1" onClick="switchO()"><a href="#">Object</a></li>
				<li id="tab1" onClick="switchT()"><a href="#">Group</a></li>
				<li id="tab1" onClick="switchTh()" ><a href="#">User Interface</a></li>
				<li id="tab1" onClick="switchF()"><a href="#">My Account</a></li>
				<li id="tab1" onClick="switchFi()"><a href="#">Sub_Users</a></li>
			</ul>
			
		</div>

		
		<div class="panel" id="panel-6">
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><button class="btn" type="submit">Add Group</button></a></li>
			</ul>
			<br>
<table frame="box"  width=300 height=300>
		<thead>
			<tr>
				<th align="center">Create New Group</th>
			</tr>
		</thead>
			<tr>
				<td>
					<table align="center" frame="box" width="99%" height="288px">
						<tr><td><table align="center">
						<tr><td align="right">Name:   </td>
							<td align="left"><input type="text" name="name" style="
						    width: 150px;
						    padding-top: 1px;
						    border-left-width: 2px;"><br>
							</td>
						</tr>
						<tr><td align="right">Objects</td>
							<td align="left">
								<select style="width: 152px;">
						  		<option></option>
						 		</select>
						  	</td>
						 </tr>
						 <tr>
						 	<td align="right">
						 	Description:</td> <td align="left"><input type="text" style="width: 150px;height: 150px;"></td>
						 </tr>
						</table>				
						 <tr><td align="center"><input type="submit" value="Save">
						 <input type="submit" value="Cancel"></tr></td>
						 						 
					</table>
					</tr></td>
				</td>
			</tr>
	</table>
</div>


		
		<div class="panel" id="panel-7">
			<div class="table-wrapper-7">
<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><button class="btn" type="submit">Add Group</button></a></li>
			</ul>
            <!--Table-->
            <table class="table table-responsive-md">
                <thead class="mdb-color lighten-4">
                    <tr>
                        <th>#</th>
                        <th class="th-lg">Name</th>
                        <th class="th-lg">Object</th>
                        <th class="th-lg">Description</th>
                        <th class="th-lg">Edit/Delete</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
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
                       
                    </tr>
                    <tr>
                        <th scope="row">3</th>
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
                        
                    </tr>
                    <tr>
                        <th scope="row">5</th>
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
                        
                    </tr>
                    <tr>
                        <th scope="row">7</th>
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
                        
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        
                    </tr>
					<tr>
                        <th scope="row">10</th>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        
                    </tr>
					<tr>
                        <th scope="row">11</th>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        
                    </tr>
					<tr>
                        <th scope="row">12</th>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        
                    </tr>
					<tr>
                        <th scope="row">10</th>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        
                    </tr>
					<tr>
                        <th scope="row">11</th>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        <td>text</td>
                        
                    </tr>
					<tr>
                        <th scope="row">12</th>
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
		
		<div class="panel" id="panel-8">

			
			<div>
	<table frame="box" width="500">
	<tr><td>
		<table frame="box" width="500" height="400">
		<tr><td align="center">
			<table  border="0">
				<tr><td align="right">Objects:</td>
					<td align="left">
						<select style="width: 152px;">
							<option></option>
						</select>
					</td>
				</tr>

				<tr><td align="right">Trail color:</td>
					<td align="left">
						<select style="width: 152px;">
							<option></option>
						</select>
					</td>
				</tr>
			</table>
		</td></tr>


		</table>
		</td></tr>
		<tr><td>

		<p align="right"><input type="submit" value="Save">
		<input type="submit" value="Cancel"></p>
	
		</td></tr>
		</table>
</div>
	
		</div>
		<div class="panel" id="panel-9">
			<br>
			<br>
			<div>
	<table frame="box">
	<tr><td>
		<table frame="box">
			<tr>
				<td>	
					<table>
						<tr>
							<td align="right">Name:</td>
							<td align="left"><input type="text" placeholder="XXX"></td>
						</tr>
						<tr>
							<td align="right">Email:</td>
							<td align="left"><input type="text" placeholder="XXX@gmail.iii"></td>
						</tr>
						<tr>
							<td align="right">Phone Number:</td>
							<td align="left"><input type="text"></td>
						</tr>
						<tr>
							<td align="right">Company:</td>
							<td align="left"><input type="text"></td>
						</tr>
					</table>
				</td>
				<td align="right">
					<table>
						<tr>
							<td align="right">Address:</td>
							<td align="left"><input type="text" height style="height: 60px;"></td>
						</tr>
						<tr>
							<td align="right">ID:</td>
							<td align="left"><input type="text"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="right">To Change Password</td>
				<td>
					<table frame="box" align="right" width="350px">
						<tr>
							<td align="right">Old Password:</td>
							<td align="left"><input type="text"></td>
						</tr>
						<tr>
							<td align="right">New Password:</td>
							<td align="left"><input type="text"></td>
						</tr>
						<tr>
							<td align="right">Repeat New Password:</td>
							<td align="left"><input type="text"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		<tr>
			<td>
			<p align="right"><input type="submit" value="Save">
			<input type="submit" value="Cancel"></p>
			</td>
		</tr>
	</table>
</div>
			
		</div>
		<div class="panel" id="panel-10">
	<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><button class="btn" type="submit">Add Sub_Users</button></a></li>
			</ul>


 <br>
 <div>
        <table frame="box" width=500 height=300>
            <thead>
                <tr>
                    <th align="center">Add New Subuser</th>
                </tr>
            </thead>

            <tr>
                <td>
                    <table frame="box"  width=90% align="center">

                    <tr>
                        <td>
                        
                            <table align="up"  width="55%">
                            
                                <tr>
                                    <td align="right">Name:   </td>
                                    <td align="left"><input type="text"  style="
                                        width: 150px;
                                        padding-top: 1px;
                                        border-left-width: 2px;">
                                    <br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right">Email:   </td>
                                    <td align="left"><input type="text"  style="
                                    width: 150px;
                                    padding-top: 1px;
                                    border-left-width: 2px;">
                                    <br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right">Phone Number:   </td>
                                    <td align="left"><input type="text"  style="
                                    width: 150px;
                                    padding-top: 1px;
                                    border-left-width: 2px;"><br>
                                    </td>
                                </tr>
              
                                <tr>
                                    <td align="right">Password:</td>
                                    <td align="left"><input type="password"  style="
                                        width: 150px;
                                        padding-top: 1px;
                                        border-left-width: 2px;"><br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right">ID   </td>
                                    <td align="left"><input type="text" style="
                                        width: 150px;
                                        padding-top: 1px;
                                        border-left-width: 2px;"><br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right">Driver:</td>
                                    <td><input type="radio" name="driver">Yes<input type="radio" name="driver">NO</td>
                                </tr>
                            
                            </table>
                        </td>
                            
                        <td>
                            <tr><td>
                                <input type="checkbox">Real-time monitoring        
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <input type="checkbox">View history
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox">Generate and schedule reports
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox">Add Object
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox">Add Group
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox">Add Driver
                                </td>
                            </tr>
                        </td>
                    </tr>
                <tr>

                    <td>                            
                        <table frame="box" cellspacing="0" width="100%">
                            <tr>
                                <td>Object:</td>
                                <td> <select style="width: 152px;">
                                        <option>
    
                                        </option>
                                    </select>
                                </td>
                            
                                <td>Description:</td>
                                <td align="right"><input type="text"></td>
                            </tr>

                            <tr>
                                <td>Zone:</td>
                                <td> <select style="width: 152px">
                                        <option></option>
                                    </select>
                                </td>
                            </tr>
                        
                        </table>
                    </td>
                </tr>

                 <tr>
                    <td align="center" colspan="2"><input type="submit" value="Save">
                    <input type="submit" value="Cancel"></td>
                </tr>
                
                </table>
                </td>
            </tr>
         </table>
</div>

		</div>
		


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
	function switchO(){
		get("panel-6").style.display="block";
		get("panel-7").style.display="none";
		get("panel-8").style.display="none";
		get("panel-9").style.display="none";
		get("panel-10").style.display="none";
	}
	function switchT(){
		get("panel-6").style.display="none";
		get("panel-7").style.display="block";
		get("panel-8").style.display="none";
		get("panel-9").style.display="none";
		get("panel-10").style.display="none";
	}
	function switchTh(){
		get("panel-6").style.display="none";
		get("panel-7").style.display="none";
		get("panel-8").style.display="block";
		get("panel-9").style.display="none";
		get("panel-10").style.display="none";
	}
	function switchF(){
		get("panel-6").style.display="none";
		get("panel-7").style.display="none";
		get("panel-8").style.display="none";
		get("panel-9").style.display="block";
		get("panel-10").style.display="none";
	}
	function switchFi(){
		get("panel-6").style.display="none";
		get("panel-7").style.display="none";
		get("panel-8").style.display="none";
		get("panel-9").style.display="none";
		get("panel-10").style.display="block";
	}
</script>

</body>
</html>