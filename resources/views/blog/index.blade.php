@extends('main')

@section('title', '| Blog')

@section('content')
	<div class="row ">
		<div class="col-md-8 col-md-offset-2">
			<h1>Blog</h1>
		</div>
	</div>
	@foreach ($posts as $post)	
		@php
		  $created_at = new DateTime($post->created_at);
		  $time_zone = new DateTimeZone('Asia/Ho_Chi_Minh');
		  $created_at->setTimezone($time_zone);
		@endphp

		<div class="row ">
			<div class="col-md-8 col-md-offset-2">
				<h2>{{ $post->title }}</h2>
				<small><strong><i>Publish: {{ $created_at->format('M j, Y') }}</i></strong></small>

				<p>{{ substr(strip_tags($post->body), 0, 255) }}{{ strlen(strip_tags($post->body)) > 255 ? '...' : "" }}</p>

				<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>

				<hr>
			</div>
		</div>
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
@stop