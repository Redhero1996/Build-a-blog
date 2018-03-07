@extends('main')

@section('title', "| $category->name Category")

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h1> {{ $category->name }} <small>Category </small></h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('categories.index') }}" class="btn btn-default pull-sm-8 btn-block" style="margin-top: 20px;"><< See All Tags</a>
		</div>
	</div>
@stop