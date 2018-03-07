@extends('main')

@section('title', '| All Tags')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)						
						<tr>
							<th>{{ $tag->id }}</th>
							<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<div class="well">
				{!! Form::open([ 'route' => 'tags.store', 'method' => 'POST' ]) !!}
					<h2>Create Tag</h2>
					<label>Name:</label>
					<input type="text" name="name" class="form-control">
					<input type="submit" name="submit" value="Create New Tag" class="btn btn-primary btn-block btn-h1-spacing ">
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop