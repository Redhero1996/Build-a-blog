@extends('main')
@section('title', '| Create New Post')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
		tinymce.init({ 
			selector:'textarea',
			plugins: 'link', 
		});
	</script>
@endsection

@section('content')
	<div class="row">
	  <div class="col-md-8 col-md-offset-2">
	    <h1>Create New Post</h1>
	    <hr>
	    <form  method="POST" data-parsley-validate action="{{ route('posts.store') }}" enctype="multipart/form-data">
	    	{{ csrf_field() }}
	    	
	      <div class="form-group">
	        <label for="title">Title:</label>
	        <input id="title" name="title" class="form-control" value="{!! old('title') !!}" required="">
			@if($errors->has('title'))
				<span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
			@endif
	      </div>

	      <div class="form-group">
	        <label for="slug">Slug:</label>
	        <input type="text" id="slug" name="slug" rows="10" class="form-control" value="{!! old('slug') !!}" required=""></input>
	        @if($errors->has('slug'))
				<span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
			@endif
	      </div> 

	      <div class="form-group">
	        <label for="category_id">Category:</label>
	        <select class="form-control" name="category_id">
	        	@foreach ($categories as $category)
	        		<option value="{{ $category->id }}">{{ $category->name }}</option>
	        	@endforeach
	        </select>
	      </div>

	      <div class="form-group">
	        <label for="tags">Tag:</label>
	        <select class="form-control select2-multi" name="tags[]" multiple="multiple" >
	        	@foreach ($tags as $tag)
	        		<option value="{{ $tag->id }}">{{ $tag->name }}</option>
	        	@endforeach
	        </select>
	      </div>

	      <div class="form-group">
	        <label for="featured_image">Upload Featured Image:</label>
	        <input type="file" name="featured_image">
	      </div>

	      <div class="form-group">
	        <label for="body">Post Body:</label>
	        <textarea id="body" name="body" rows="10" class="form-control" ></textarea>

	      </div>

	      <input type="submit" value="Create Post" class="btn btn-info btn-lg btn-block">
	     
	    </form>
	  </div>
	</div>﻿
@endsection

@section('scripts')
	

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection