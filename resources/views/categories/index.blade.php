@extends('layouts.app')

@section('title', '| All Categories')

@section('body')

	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
	
	
		<div class="col-md-4">
			<div class="card card-body bg-light">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					<h2>New Category</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

				{!! Form::close() !!}
			</div>
		</div> <!-- end of .col-md-4 -->
	</div>

@endsection