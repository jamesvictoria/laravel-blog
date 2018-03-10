@extends('layouts.app')

@section('title', '| All Tags')

@section('body')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td>
							<a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
	
	
		<div class="col-md-4">
			<div class="card card-body bg-light">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
					<h2>New Tag</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

				{!! Form::close() !!}
			</div>
		</div> <!-- end of .col-md-4 -->
	</div>

@endsection