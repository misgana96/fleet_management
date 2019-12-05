@extends('layouts.sidenav')

@section('content')
<div class="content">
	<div class="justify-conten-end form-group">
		<a href="vehicles/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Vehicle</a>
	</div>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Make</th>
	      <th scope="col">Model</th>
	      <th scope="col">Engine Number</th>
	      <th scope="col">Plate Number</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($vehicles as $vehicle)
	  <tr>
	  	<td>{{ $vehicle->vehicle_id }}</td>	
	  	<td>{{ $vehicle->make }}</td>	
	  	<td>{{ $vehicle->model }}</td>
	  	<td>{{ $vehicle->engine }}</td>
	  	<td>{{ $vehicle->plate }}</td>
	  </tr>	
	  @endforeach
	  </tbody>
	</table>
</div>
@endsection