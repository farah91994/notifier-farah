<?php $__env->startSection('head'); ?>
<script type="text/javascript" src="<?php echo e(URL::to('src/js/signIn.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php if(session('status')): ?>
     <div class="alert alert-success">
         <?php echo e(session('status')); ?>

     </div>
 <?php endif; ?>
			<section class="row db-center-block">
		<div class="btn-group btn-group-lg" role="group" aria-label="...">
          <a type="button" class="btn btn-default btn-info" href="<?php echo e(route('dashboard')); ?>"><span class="badge">1</span> Write Post</a>
          <a type="button" class="btn btn-default btn-primary disabled" href="<?php echo e(route('courseSelection')); ?>"><span class="badge">2</span> Choose Recepients</a>
          <a type="button" class="btn btn-default  btn-success disabled" href=href="<?php echo e(route('sendPost')); ?> ><span class="badge">3</span> Send Post</a>
       </div>
       </section>
 <?php /*<div class="row">*/ ?>
     <?php /*<div class="well col-md-4" style="max-height:300px; overflow: auto;margin-top: -10px;margin-left:-90px">*/ ?>
            <?php /**/ ?>
             <?php /*</div>*/ ?>
 <?php /*</div>*/ ?>
  <section class="row new-post">
       <div class="col-md-6 col-md-offset-3">
	    <header><h3> What would you like to say? </h3> </header>
		<form action="<?php echo e(route('post.create')); ?>" method="post">
		 <div class="form-group">
		    <textarea class="form-control" spellcheck="true" name="body" id="new-post" cols="30" rows="5" placeholder="Your post"></textarea>
		 </div>
		 <button type="submit" class="btn btn-primary" >Next</button>
		 <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
		</form>
	   </div> 	   
    </section>
	<section class="row">

	</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>