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
                <li><a href="{{action('Driver\DriverAuth\DriverRegisterController@showRegistrationForm')}}"><!--button class="btn" type="submit">Add New Driver</button-->
                <button class="btn">Add New Driver</button></a></li>
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
                        <th class="th-lg">Driver Name</th>
                        <th class="th-lg">Email</th>
						<th class="th-lg">Phone</th>
						<!--th class="th-lg">Vehicle ID</th-->
                        <th class="th-lg"></th>
						<th class="th-lg"></th>

                    </tr>
                </thead>
                <tbody>
                     @foreach($drivers as $driver)

						  <tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$driver->driver_name}}</td>
							<td>{{$driver->email}}</td>
							<td>{{$driver->phone}}</td>
							<!--td>{{$driver->vehicle_id}}</td-->


							<!--td><a href="{{action('Driver\DriverAdminController@edit', $driver->driver_id)}}" class="btn btn-warning">Edit</a></td-->
							<td><a href="{{route('driver.edit', $driver->driver_id)}}" class="btn btn-warning">Edit</a></td>
							<td>
							   <form action="{{action('Driver\DriverAdminController@destroy', $driver->driver_id)}}" method="post">
								@csrf
								<input name="_method" type="hidden" value="DELETE">
								<button class="btn btn-danger" type="submit">Delete</button>
							  </form>
							</td>
						  </tr>
						  @endforeach
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
