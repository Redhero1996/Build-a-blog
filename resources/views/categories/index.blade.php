@extends('main')

@section('title', '| All Categories')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)						
						<tr>
							<th>{{ $category->id }}</th>
							<td>{{ $category->name }}</td>
							<td><a href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<div class="well">
				{!! Form::open([ 'route' => 'categories.store', 'method' => 'POST' ]) !!}
					<h2>Create Category</h2>
					<label>Name:</label>
					<input type="text" name="name" class="form-control">
					<input type="submit" name="submit" value="Create New Category" class="btn btn-primary btn-block btn-h1-spacing ">
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop