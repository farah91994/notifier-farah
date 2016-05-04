@extends('layouts.master')

@section('title')
    History
@endsection

@section('content')
 @include('includes.message-block')

 <section class="row posts">
	     <div class="col-md-6 col-md-offset-3">
		       <header><h3>Sent Posts...</h3></header>
			     @foreach($posts as $post)
				   <article class="post" data-postid="{{ $post->id }}">
					   <p>{{ $post->body }}</p>
					  <div class="info">
						  Posted by {{ $user['name'] }} on {{ $post->created_at }}
					  </div>
					  <div class="interaction">
							   |
							  <a href="#" class="edit">Edit</a> |
							  <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
						</div>
				   </article>
			   @endforeach
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
    var token = '{{ Session::token() }}';
	var url = '{{ route('edit') }}';
</script>
@endsection