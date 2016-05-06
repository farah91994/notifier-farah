<?php $__env->startSection('title'); ?>
    History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <section class="row posts">
	     <div class="col-md-6 col-md-offset-3">
		       <header><h3>Sent Posts...</h3></header>
			     <?php foreach($posts as $post): ?>
				   <article class="post" data-postid="<?php echo e($post->id); ?>">
					   <p><?php echo e($post->body); ?></p>
					  <div class="info">
						  Posted by: <?php echo e($user['name']); ?> on <?php echo e($post->created_at); ?>

                          | Sent to:
                          <?php foreach($Acourse as $cor): ?>
                          <?php echo e($cor->course_name); ?>

                              <?php endforeach; ?>
					  </div>
				   </article>
			   <?php endforeach; ?>
		 </div>
	</section>
	<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Edit Post</h4>
            </div>
           <div class="modal-body">
              <form>
			     <div class="form-group">
				     <label for="post-body">Edit the post</label>
					 <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
				 </div>
			  </form>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    var token = '<?php echo e(Session::token()); ?>';
	var url = '<?php echo e(route('edit')); ?>';
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>