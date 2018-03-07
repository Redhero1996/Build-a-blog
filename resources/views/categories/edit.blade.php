@extends('main')

@section('title', "| Edit Category")

@section('content')
	{{ Form::model($category, [ 'route' => ['categories.update', $category->id] , 'method' => 'PUT']) }}
		<label class="name">Title</label>
		<input type="text" name="name" class="form-control" value="{{$category->name}}">
		<input type="submit" name="submit" value="Save Changes" class="btn btn-success" style="margin-top: 20px;">
	{{ Form::close() }}	
@stop