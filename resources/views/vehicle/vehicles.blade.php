​<!DOCTYPE html>
<html lang="en">
<head>
  <title>GPS Tracking System</title>
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
           
            <ul class="nav navbar-nav navbar-right">
                <!--li><a href="{{action('Vehicle\VehicleController@create')}}"><button class="btn" type="submit">Add New Vehicle</button></a></li-->
                <li><a href="{{route('vehicle.new')}}"><button class="btn">Add New Vehicle</button></a></li>
            </ul>
        </div>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
            <div class="table-wrapper-2">

            <!--Table-->
            <table class="table table-responsive-md">
                <thead class="mdb-color lighten-4">
                    <tr>
                        <th>#</th>
                        <th class="th-lg">Vehicle Number</th>
                        <th class="th-lg">Vehicle Name</th>
                        <!--th class="th-lg">GPS Model</th-->
						<th class="th-lg">IMEI</th>
						<th class="th-lg">SIM Number</th>
                        <th class="th-lg">Driver Name</th>
                        <th class="th-lg"></th>
						<th class="th-lg"></th>
                       
                    </tr>
                </thead>
                <tbody>
                @if($vehicles==null)
                    <tr><td>No vehicles yet.</td></tr>

                    @else
                     @foreach($vehicles as $vehicle)
                          <tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$vehicle->vehicle_number}}</td>
							<td>{{$vehicle->vehicle_name}}</td>
							<td>{{$vehicle->imei}}</td>
							<td>{{$vehicle->sim_number}}</td>
							@if(!$vehicle->driver_id==null)
							<td>{{$drivers[$loop->iteration-1][0]->driver_name}}</td>
							@else
							<td></td>
							@endif
							<td><a href="{{action('Vehicle\VehicleController@edit', $vehicle->vehicle_id)}}" class="btn btn-warning">Edit</a></td>
							<!--td><a href="{{route('vehicle.edit', $vehicle->vehicle_id)}}" class="btn btn-warning">Edit</a></td-->
							<td>
							   <form action="{{action('Vehicle\VehicleController@destroy', $vehicle->vehicle_id)}}" method="post">
								@csrf
								<input name="_method" type="hidden" value="DELETE">
								<button class="btn btn-danger" type="submit">Delete</button>
							  </form>
							</td>
						  </tr>
						  @endforeach

				     @endif
				</tbody>	
            </table>
            <!--Table-->

        </div>
      </nav>
        </div>
        
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                                   <li class="nav-item">
                                    <a class="nav-link" href="{{route('vehicle.view')}}">Vehicles</a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('driver.view')}}">Driver</a>
                                </li>
                                <!--li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.myaccount')}}">My account</a>
                                </li-->
                            </ul>
</div>
<a href={{route('admin.home')}}><div>home</div></a>
</body>
</html>
