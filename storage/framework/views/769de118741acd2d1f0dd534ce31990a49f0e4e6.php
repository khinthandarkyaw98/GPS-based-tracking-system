

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!--form method="POST" action="<?php echo e(route('activate.admin', ['code'=>$code])); ?>"-->
                    <form method="POST" action="<?php echo e(action('Admin\AdminAuth\AdminActivationController@activateAdmin', ['code'=>$code])); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value=<?php echo e($code); ?> name="activation_code">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Activate')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>