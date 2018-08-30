<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vehicle</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
    <table frame="box"  rules="none" width=350 height=200>
        <thead>
            <tr>
                <th align="center">Edit Vehicle Information</th>
            </tr>
        </thead>
            <tr><td>
                <table align="Center" frame="box" width=340 height=150>
                <!--form method="POST" action="<?php echo e(route('vehicle.update', $vehicle['vehicle_id'])); ?>"-->
                <form method="POST" action="<?php echo e(action('Vehicle\VehicleController@update', $vehicle['vehicle_id'])); ?>">
                <?php echo csrf_field(); ?>
                    <tr><td><table align="center">
                        <tr><td align="right">Name:   </td>
                            <td align="left"><input name="vehicle_name" value="<?php echo e($vehicle['vehicle_name']); ?>" type="text"  style="
                            width: 150px;
                            padding-top: 1px;
                            border-left-width: 2px;

                            "><br>
                            </td>
                         </tr>
                    <tr><td><table align="center">
                        <tr><td align="right">Vehicle Number:   </td>
                            <td align="left"><input name="vehicle_number" value="<?php echo e($vehicle['vehicle_number']); ?>" type="text"  style="
                            width: 150px;
                            padding-top: 1px;
                            border-left-width: 2px;
                            "><br>
                            </td>
                        </tr>
                    <tr><td align="right">IMEI:   </td>
                        <td align="left"><input name="imei" value="<?php echo e($vehicle['imei']); ?>" type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>
                    <tr><td align="right">Driver:   </td>
                        <td align="left"><select name="driver_id" style="
                        width: 154px;
                        padding-top: 1px;
                        ">
                        <option value=0>None assigned</option>
                        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value=<?php echo e($driver->driver_id); ?> <?php if($vehicle['driver_id']==$driver->driver_id): ?> selected <?php endif; ?>><?php echo e($driver->driver_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select><br>
                        </td>
                    </tr>
                    <!--tr><td align="right">GPS Model:   </td>
                        <td align="left"><input name="gps_model" value="<?php echo e($vehicle['gps_model']); ?>" type="text"  style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr-->
                    <tr><td align="right">SIM card number:   </td>
                        <td align="left"><input name="sim_number" value="<?php echo e($vehicle['sim_number']); ?>" type="number" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>
                    <tr><td align="right">Description:   </td>
                        <td align="left"><input name="description" value="<?php echo e($vehicle['description']); ?>" type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>
                </table>
             <tr><td align="center">
             <input type="submit" value="Save">
            <!--input type="submit" value="Cancel"--></tr></td>

            </form>
            </table>
                    </tr></td>
                </td>
            </tr>
    </table>
<a href="<?php echo e(route('vehicle.view')); ?>"><div>back</div></a>
</body>
</html>