@extends('main')

@section('title', '| View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">	
			<img src="{{ asset('images/'.$post->image) }}">		
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>

			<hr>

			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($post->comments as $comment)
							<tr>
								<td>{{$comment->name}}</td>
								<td>{{$comment->email}}</td>
								<td>{{$comment->comment}}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>

									<button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-{{$comment->id}}">
									        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
									</button>
									<!-- Delete Confirmation Modal (place it right below the button) -->

                                        <div class="modal fade" id="delete-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Delete Confirmation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Are you sure you want to delete this comment?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        
                                                        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE', 'style' => 'width: 500px; float:left;']) !!}
                                                        <button type="submit" class="btn btn-danger" style="margin-bottom: 5px;">DELETE</button>
                                                        {!! Form::close() !!}

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--At the end -->
								</td>
							</tr>
						@endforeach
						<tr>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label> Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label> Category:</label>
					<p>{{ $post->category->name }}</p>
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
						<a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">		
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}				
						{{-- <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger btn-block">Delete</a> --}}
						{!!Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-h1-spacing"><< See All Posts</a>
					</div>
				</div>
			</div>			
		</div>
	</div>
@endsection
