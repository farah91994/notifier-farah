<?php $__env->startSection('title'); ?>
	Welcome!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<body style="background-image: url(<?php echo e(URL::asset('img/2.jpg')); ?>);  -webkit-background-size: cover">
	<div class="row-home" >
		<?php /*<div class="header-text hidden-xs">*/ ?>
			<?php /*<div class="col-md-12 text-center">*/ ?>
				<?php /*<h1>*/ ?>
					<?php /*<span>Notifier</span>*/ ?>
				<?php /*</h1>*/ ?>
				<?php /*<br>*/ ?>
				<?php /*<h2>*/ ?>
					<?php /*<span>Reach students where they are.</span>*/ ?>
				<?php /*</h2>*/ ?>
				<?php /*<br>*/ ?>
				<?php /*<a class="btn btn-primary btn-lg" href="<?php echo e(route('signUp')); ?>" role="button">Sign Up</a>*/ ?>
				<?php /*<a class="btn btn-primary btn-lg" href="<?php echo e(route('signIn')); ?>" role="button">Log in</a>*/ ?>
			<?php /*</div>*/ ?>
		<?php /*</div>*/ ?>
		<div class="center-block Box-signin" style="background-color: rgba(255, 255, 255, 0.9);margin-left:60%;padding: 30px 80px 30px 30px;width: 480px;
    height: auto;">

            <img src="http://localhost/laravel2/public/img/Not.png" style="    clear: left;  float: left;  margin-left: 5px;  margin-right: 50px;">
			<form action="<?php echo e(route('signin')); ?>" method="post">
				<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
					<label for="email" style="margin-top: 60px;margin-left: -260px;">Email</label>
					<input class="form-control" maxlength="30" placeholder="email" type="text" name="email" id="email" value="<?php echo e(Request:: old('email')); ?>">
					<?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
				</div>
				<div class="form-group form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
					<label for="password">Password</label>
					<input class="form-control" placeholder="password" maxlength="10" type="password" name="password" id="password" value="<?php echo e(Request:: old('password')); ?>">
					<?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="<?php echo e(route('signUp')); ?>" role="button">Sign Up</a>
				<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
			</form>
		</div>

	</div>
	</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>