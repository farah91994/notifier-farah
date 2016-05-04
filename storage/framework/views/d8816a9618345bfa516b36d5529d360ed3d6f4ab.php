<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
<?php $__env->startSection('title'); ?>
    SignIn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<?php if(session('status')): ?>
		<div class="alert alert-success">
			<?php echo e(session('status')); ?>

		</div>
	<?php endif; ?>
         <div class="center-block Box-signin"style="background-color: rgba(245,245,245,0.9);margin-top: 40px">
		   <h3>Sign In </h3>
		   <form action="<?php echo e(route('signin')); ?>" method="post">
		       <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
					<label for="email">Email</label>
					<input class="form-control" maxlength="30" placeholder="email" type="text" name="email" id="email" value="<?php echo e(Request:: old('email')); ?>">
					<?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
				</div>
				<div class="form-group form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
					<label for="password">Password</label>
					<input class="form-control" placeholder="password" maxlength="10" type="password" name="password" id="password" value="<?php echo e(Request:: old('password')); ?>">
					<?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
					</div>
			   <button type="submit" class="btn btn-primary">Submit</button>
			    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
			</form>   
		</div>	
<?php $__env->stopSection(); ?>		
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>