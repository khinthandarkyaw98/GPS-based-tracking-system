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
                <li><a href="<?php echo e(action('Driver\DriverAuth\DriverRegisterController@showRegistrationForm')); ?>"><!--button class="btn" type="submit">Add New Driver</button-->
                <button class="btn">Add New Driver</button></a></li>
            </ul>
        </div>
    <?php if(\Session::has('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e(\Session::get('success')); ?></p>
      </div><br />
     <?php endif; ?>
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
                     <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						  <tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($driver->driver_name); ?></td>
							<td><?php echo e($driver->email); ?></td>
							<td><?php echo e($driver->phone); ?></td>
							<!--td><?php echo e($driver->vehicle_id); ?></td-->


							<!--td><a href="<?php echo e(action('Driver\DriverAdminController@edit', $driver->driver_id)); ?>" class="btn btn-warning">Edit</a></td-->
							<td><a href="<?php echo e(route('driver.edit', $driver->driver_id)); ?>" class="btn btn-warning">Edit</a></td>
							<td>
							   <form action="<?php echo e(action('Driver\DriverAdminController@destroy', $driver->driver_id)); ?>" method="post">
								<?php echo csrf_field(); ?>
								<input name="_method" type="hidden" value="DELETE">
								<button class="btn btn-danger" type="submit">Delete</button>
							  </form>
							</td>
						  </tr>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
            </table>
            <!--Table-->

        </div>
      </nav>
        </div>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                                   <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('vehicle.view')); ?>">Vehicles</a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('driver.view')); ?>">Driver</a>
                                </li>
                                <!--li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('admin.myaccount')); ?>">My account</a>
                                </li-->
                            </ul>
</div>
<a href=<?php echo e(route('admin.home')); ?>><div>home</div></a>
</body>
</html>
