@extends('master')
@section('title', 'Clients List')
@section('content')
	@if($clients == [])
		<div class="col-md-10">
			<h2>No Clients</h2>
		</div>
	@else
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-hover table-striped">
				<thead>
					<tr>
						@foreach($headings as $heading)
						<th>{{ $heading }}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach ($clients as $client)
					<tr>
						@foreach($headings as $key => $value)
						<td>{{ $client[$key] }}</td>
						@endforeach
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@endif
@stop