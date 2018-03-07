@extends('main')

@section('title', '| Edit Comment')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Commnet</h1>
				
			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT' ]) }}

				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" value="{{$comment->name}}" disabled="">
				<label for="email" class="form-spacing-top">Email:</label>
				<input type="email" name="email" class="form-control " value="{{$comment->email}}" disabled="">
				<label for="comment" class="form-spacing-top">Comment:</label>
				<textarea name="comment" class="form-control" rows="9">{{ $comment->comment }}</textarea>
				<input type="submit" name="submit" class="btn btn-block btn-success" style="margin-top: 10px;" value="Update Comment">

			{{ Form::close() }}
		</div>
	</div>
	
@stop