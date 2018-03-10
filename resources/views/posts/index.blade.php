@extends('layouts.app')

@section('title', '| All Posts')

@section('body')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead class="thead-dark">
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Category</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>
					
					@foreach ($posts as $post)

						<tr>
							<th>{{ $post->id }}</th>
							<td><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></td>
							<td>{{ substr($post->body, 0, 30) }}{{ strlen($post->body) > 30 ? "..." : "" }}</td>
							<td>{{ $post->category->name }}</td>
							<td>{{ date( 'M j, Y', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-dark btn-sm">Edit</a></td>
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="row justify-content-md-center">
					{!! $posts->links(); !!}			
			</div>
		</div>
	</div> <!-- end of .row -->

@stop