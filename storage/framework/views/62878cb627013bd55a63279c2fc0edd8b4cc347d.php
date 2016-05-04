<?php $__env->startSection('head'); ?>
    <script type="text/javascript" src="<?php echo e(URL::to('src/js/signIn.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(URL::to('src/css/sendPost.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="row db-center-block">
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-info disabled" href="<?php echo e(route('dashboard')); ?>"><span class="badge">1</span> Write Post</a>
            <a type="button" class="btn btn-default btn-primary disabled" href="<?php echo e(route('courseSelection')); ?>"><span class="badge">2</span> Choose Recepients</a>
            <a type="button" class="btn btn-default  btn-success enabled" href=href="<?php echo e(route('sendPost')); ?> ><span class="badge">3</span> Send Post</a>
        </div>
    </section>
    <div class="panel panel-default panel-primary">
        <div class="panel-heading">Confirm Message:</div>
        <div class="panel-body">
            <p>Your message will be sent to:</p>
            <?php if($role==1): ?>
                <?php foreach($departments as $department): ?>
                    <p><?php echo e($department['name']); ?></p>
                <?php endforeach; ?>
            <?php elseif($role==2): ?>
                <?php foreach($st as $stName): ?>
                    <p><?php echo e($stName); ?></p>
                <?php endforeach; ?>
                <hr>
            <?php endif; ?>
            Your Message is: <p><?php echo e($Post); ?></p>
        </div>
        <a class="btn btn-primary " href=<?php echo e(route('notification')); ?> role="button">Confirm</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>