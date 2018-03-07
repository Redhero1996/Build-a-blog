@extends('main')

@section('title', "| $tag->name Tag")

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h1> {{ $tag->name }} Tag <small> {{ $tag->posts()->count() }} Posts</small></h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-sm-8 btn-block" style="margin-top: 20px;">Edit</a>
		</div>
		<div class="col-md-2">
			{{Form::open( ['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE' ])}}
				<input type="submit" name="delete" value="Delete" class="btn btn-danger btn-block" style="margin-top: 20px;">
			{{Form::close()}}
		</div>
		<div class="col-md-2">
			<a href="{{ route('tags.index') }}" class="btn btn-default pull-sm-8 btn-block" style="margin-top: 20px;"><< See All Tags</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tag->posts as $post)
						<tr>
							<th>{{$post->id}}</th>
							<td>{{$post->title}}</td>
							<td>
								@foreach ($post->tags as $tag)
									<span class="label label-info">{{$tag->name}}</span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop