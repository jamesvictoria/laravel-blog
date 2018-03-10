@extends('layouts.app')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}


@endsection

@section('body')

	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h1>Create New Post</h1>
			<hr>
		
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug',null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

				{{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach ($tags as $tag)
					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{ Form::label('body', "Post Body:") }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
			{!! Form::close() !!}

			{{-- <form method="POST" action="{{ route('posts.store') }}">
		      <div class="form-group">
		        <label name="title">Title:</label>
		        <input id="title" name="title" class="form-control">
		      </div>
		      <div class="form-group">
		        <label name="body">Post Body:</label>
		        <textarea id="body" name="body" rows="10" class="form-control"></textarea>
		      </div>
		      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
		      <input type="hidden" name="_token" value="{{ Session::token() }}">
		    </form> --}}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2(); 
	</script>

@endsection