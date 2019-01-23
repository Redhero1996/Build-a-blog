@extends('main')

@section('title', "| Edit Category")

@section('content')
	{{ Form::model($category, [ 'route' => ['categories.update', $category->id] , 'method' => 'PUT']) }}
		<label class="name">Title</label>
		<input type="text" name="name" class="form-control" value="{{$category->name}}">
		<input type="submit" name="submit" value="Save Changes" class="btn btn-success" style="margin-top: 20px;">
	{{ Form::close() }}	
		{{-- Create user form project 1 --}}
		<div class="form-group">
			{!! Form::label('username', 'Username', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
				@if($errors->has('username'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('username') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('first_name', 'First Name', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
				@if($errors->has('first_name'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('first_name') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('last_name', 'Last Name', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
				@if($errors->has('last_name'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('last_name') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('phone_number', 'Phone Number', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
				@if($errors->has('phone_number'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('phone_number') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('address', 'Address', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
				@if($errors->has('address'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('address') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Email', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
				@if($errors->has('email'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
				@if($errors->has('password'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
				@endif
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('role', 'Role', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				<div class="radio-list">
					@foreach ( $roles as $role )
						<label>
							@if ( $role->name == 'User' )
								{!! Form::radio('role', $role->name, true, ['id' => 'user']) !!} {{ $role->name }}
							@else
								{!! Form::radio('role', $role->name, ['id' => 'admin']) !!} {{ $role->name }}
							@endif
						</label>
					@endforeach
				</div>
				@if($errors->has('role'))
					<span class="help-block" style="color: red;">
	                    <strong>{{ $errors->first('role') }}</strong>
	                </span>
				@endif
			</div>
		</div>
@stop