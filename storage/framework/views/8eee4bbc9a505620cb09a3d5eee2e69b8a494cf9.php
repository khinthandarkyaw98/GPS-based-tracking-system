<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md" id="app">
                    <example-component></example-component>
                </div>

            </div>
        </div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2l3xGesW1Cx_Sj_UobTcs0iZrB_djoe8&callback=initMap" type="text/javascript"></script>
		<script srv="<?php echo e(asset('js/app.js')); ?>"></script>
    </body>
</html>
