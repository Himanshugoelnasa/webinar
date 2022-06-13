 <div class="tabs-spotlight-container">
   	
      <div class="tabing-left-box" style="flex-basis: 100%;">
         <article id="spotarticle">
            
            <div class="tabing-text-heading" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            	<h2>Comments</h2>
            	<hr/>
            	@if($comments->count() > 0)
            	@foreach($comments as $comment)
            	<div class="hello-again-container2  mt-5 px-4 py-3">
            		<h4>{{$comment->user->name}}</h4><p class="comment-date">Submitted On : {{date_format($comment->created_at, "M d, Y")}}</p>
			   		<div class="hello-text" >
				      <p>{{$comment->body}}</p>
				   </div>
				</div>
               	@endforeach
               	@else 
               		<p>No comments found</p>
               	@endif
            </div>
           
         </article>
         
      </div>
      
   </div>
   <div class="tabs-spotlight-container">
      <div class="tabing-left-box" style="flex-basis: 100%;">
        @if(Session::has('error'))
		<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif
		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif
         <article id="spotarticle">
            
            <div class="tabing-text-heading" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            	<h2>Add your comment</h2>
            	<hr/>
               	<form id="article-add-form" method="post" action="{{route('comment.create')}}">
                  @csrf
                  	<input type="hidden" name="id" value="{{$article->id}}">
                  	<input type="hidden" name="table" value="Article">
					<div class="form-group">
						<label for="exampleFormControlInput1">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						@error('name')
						<span class="invalid-feedback">
						 <strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput1">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						@error('email')
						<span class="invalid-feedback">
						 <strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

                 
                 	<div class="form-group">
						<label for="exampleFormControlTextarea1">Comment</label>
						<textarea class="form-control" id="body" name="body" rows="3">{{old('body')}}</textarea>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						 @error('body')
						   <span class="invalid-feedback">
						     <strong>{{ $message }}</strong>
						   </span>
						 @enderror
	                 </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-primary float-right" name="submit">Add Comment</button>
                  </div>

               </form>
            </div>
           
         </article>
         
      </div>
      
   </div>