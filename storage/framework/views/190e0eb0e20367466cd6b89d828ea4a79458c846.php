<?php $__env->startSection("head"); ?>
    <link rel="stylesheet" href="<?php echo e(URL::to('src/css/courseSelection.css')); ?>" />
    <script type="text/javascript" src="<?php echo e(URL::to('src/js/depSelection.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 error" id="courseError">
            Please choose one faculty atleast:
        </div>
    </div>
    <section class="row new-post">
        <section class="row db-center-block">
            <div class="btn-group btn-group-lg" role="group" aria-label="...">
                <a type="button" class="btn btn-default btn-info disabled" href="<?php echo e(route('dashboard')); ?>"><span class="badge">1</span> Write Post</a>
                <a type="button" class="btn btn-default btn-primary" href="<?php echo e(route('courseSelection')); ?>"><span class="badge">2</span> Choose Recepients</a>
                <a type="button" class="btn btn-default  btn-success disabled" href=# ><span class="badge">3</span> Send Post</a>
            </div>
        </section>
        <div class="db-center-block">
            <h3 class="text-center">Departments:</h3>
            <div class="well" style="max-height:300px; overflow: auto;">
                <form id='collegeForm' >
                    <?php foreach($departments as $department): ?>
                        <div class="row course-box">
                            <label> <input type="checkbox" name="<?php echo e($department->dep_name); ?>" value="<?php echo e($department->dep_id); ?>"><?php echo e($department->dep_name); ?></label>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <button class="btn btn-primary col-xs-12" id="get-checked-data">next</button>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>