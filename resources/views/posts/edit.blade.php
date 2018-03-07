@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
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
			{!! Form::model($post, ['route' => ['posts.update', $post->id ], 'method' => 'PUT', 'files' => true]) !!}

			<div class="col-md-8">			
				{{-- <input type="text" name="title" class="form-control" value="{{$post->title}}">
				<input type="textarea" name="body" class="form-control" value="{{$post->body}}"> --}}

				{!! Form::label('title', 'Title:') !!}
				{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

				{!! Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) !!}
				{{ Form::text('slug', null, ['class' => 'form-control input-lg']) }}

				{!! Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) !!}
				{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

				{!! Form::label('tags', 'Tag:', ['class' => 'form-spacing-top']) !!}
				{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) !!}

				{!! Form::label('featured_image', 'Upload Featured Image:', ['class' => 'form-spacing-top']) !!}
				{{ Form::file('featured_image') }}

				{!! Form::label('body', 'Body:', ['class' => 'form-spacing-top']) !!}
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label> Url:</label>
						<a href="{{ url($post->slug) }}"> {{ url($post->slug) }} </a>
					</dl>

					<dl class="dl-horizontal">
						@php
							$created_at = new DateTime($post->created_at);
							$updated_at = new DateTime($post->updated_at);
							$time_zone = new DateTimeZone('Asia/Ho_Chi_Minh');
							$created_at->setTimezone($time_zone);
							$updated_at->setTimezone($time_zone);
						@endphp
						
						<label> Created At:</label>
						<p>{{$created_at->format('M j, Y h:ia')}}</p>
					</dl>

					<dl class="dl-horizontal">
						<label> Last Updated:</label>
						<p>{{ $updated_at->format('M j, Y h:ia') }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<a href="{{route('posts.show', $post->id)}}" class="btn btn-danger btn-block">Cancel</a>
						</div>
						<div class="col-sm-6">
							<input type="submit" value="Save Changes" class="btn btn-success btn-block">
							{{-- {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}} --}}
						</div>
					</div>
				</div>			
			</div>
		{!! Form::close() !!}
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection