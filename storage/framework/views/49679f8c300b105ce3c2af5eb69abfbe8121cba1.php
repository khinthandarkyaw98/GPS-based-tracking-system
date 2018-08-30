
<style>
    .full-height {
        height: 80vh;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .position-ref {
        position: relative;
    }
    .title {
        font-size: 84px;
        font-family: 'Raleway', sans-serif;
    }
    .content {
        text-align: center;
    }
    .m-b-md {
        margin-bottom: 30px;
    }

</style>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    GPS Tracking System
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>