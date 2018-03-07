@extends('main')

@section('title', "| Edit Tag")

@section('content')
	{{ Form::model($tag, [ 'route' => ['tags.update', $tag->id] , 'method' => 'PUT']) }}
		<label class="name">Title</label>
		<input type="text" name="name" class="form-control" value="{{$tag->name}}">
		<input type="submit" name="submit" value="Save Changes" class="btn btn-success" style="margin-top: 20px;">
	{{ Form::close() }}	
@stop