​<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.panel{
	min-height: 600px;
	border: 1px solid #c22;
	border-top: 0 none;
	padding: 15px;
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

				<li id="tab1" onClick="switchO()"><a href="#">Object</a></li>
				<li id="tab1" onClick="switchT()"><a href="#">Group</a></li>
				<li id="tab1" onClick="switchTh()" ><a href="#">User Interface</a></li>
				<li id="tab1" onClick="switchF()"><a href="#">My Account</a></li>
				<li id="tab1" onClick="switchFi()"><a href="#">Sub_Users</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><button class="btn" type="submit">Add Sub_Users</button></a></li>
			</ul>
		</div>

		
		<div class="panel" id="panel-6">
			1111111111111
		</div>
		<div class="panel" id="panel-7">
			<div class="table-wrapper-7">

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
		</div>
		<div class="panel" id="panel-8">
			3333333333333
		</div>
		<div class="panel" id="panel-9">
			4444444444444
		</div>
		<div class="panel" id="panel-10">
			55555555555555
		</div>
		
<script>
	function get(obj){
		return document.getElementById(obj);
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
