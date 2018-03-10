@extends('layouts.app')

@section('title', '| View Post')

@section('body')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>

			<p class="lead">{{ $post->body }}</p>

			<hr>
			
			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="badge badge-secondary">{{ $tag->name }}</span>
				@endforeach
			</div>
		</div>

		<div class="col-md-4">
			<div class="card card-body bg-light">
				<dl class="dl-horizontal">
					<dt>Url:</dt>
					<dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Category:</dt>
					<dd>{{ $post->category->name }}</a></dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date( 'M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				<div>
					{!! Html::linkRoute('posts.index', 'See All Posts', [], ['class' => 'btn btn-secondary btn-block btn-spacing']) !!}
				</div>
			</div>
		</div>
	</div>

@endsection