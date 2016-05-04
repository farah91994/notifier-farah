<?php echo $__env->make('includes.header3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title'); ?>
    SignUp
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="signup center-block Box-signin" style="background-color: rgba(245,245,245,0.9);margin-top: 40px">
        <h3>Sign Up </h3>
        <form class="form-group" action="<?php echo e(route('signup')); ?>" method="post">
            <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                <label for="email">Email</label>
                <input class="form-control" placeholder="email" type="text" maxlength="20" name="email" id="email" value="<?php echo e(Request:: old('email')); ?>">
                <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group form-group <?php if($errors->has('first_name')): ?> has-error <?php endif; ?>">
                <label for="first_name">User Name</label>
                <input class="form-control" placeholder="user name" type="text" maxlength="10" name="first_name" id="first_name" value="<?php echo e(Request:: old('first_name')); ?>">
                <?php if($errors->has('first_name')): ?> <p class="help-block"><?php echo e($errors->first('first_name')); ?></p> <?php endif; ?>
            </div>
            <div class="form-group form-group">
                <label for="user_role">Role</label>

            <select name="role" class="form-group form-control form-group">
                <?php foreach($Roles as $aRole): ?>
                <option value="<?php echo e($aRole['id']); ?>"><?php echo e($aRole['name']); ?></option>
                    <?php endforeach; ?>
            </select>
            </div>
            <div class="form-group form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
                <label for="password">Password</label>
                <input class="form-control" placeholder="password" type="password"  maxlength="12" name="password" id="password" value="<?php echo e(Request:: old('password')); ?>">
                <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
            </div>
            <button type="submit"  class="btn btn-primary btn-block">Submit</button>
            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>