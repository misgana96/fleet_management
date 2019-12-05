@extends('layouts.sidenav')
@section('content')
<div class="content">
	<div class="d-flex justify-content-between">
	<h4 class="header px-3">Vehicles</h4>
	@if(count($vehicles)>0)
		<a href="/vehicles/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Vehicle</a>
	</div><hr/>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Vehicle Id</th>
	      <th scope="col">Image</th>
	      <th scope="col">Vehicle Name</th>
	      <th scope="col">Model</th>
	      <th scope="col">Engine Number</th>
	      <th scope="col">Plate Number</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($vehicles as $vehicle)
	  <tr>
	  	<td>{{ $vehicle->vehicle_id }}</td>	
	  	<td><img class="no-marigin-top no-marigin-bottom"
	  		src="/{{ $vehicle->vehicle_image}}" height="60px"></td>	
	  	<td>{{ $vehicle->vehicle_name }}</td>
	  	<td>{{ $vehicle->model }}</td>
	  	<td>{{ $vehicle->engine }}</td>
	  	<td>{{ $vehicle->plate }}</td>
	  	<td class="form-group">
	  		<a href="vehicles/view/{{ $vehicle->vehicle_id }}" class="btn btn-sm btn-primary"><i class="fa fa-box-open"></i> View</a>&nbsp;
	  		<a href="vehicles/edit/{{ $vehicle->vehicle_id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
	  	</td>
	  </tr>	
	  @endforeach
	  </tbody>
	</table>
	<hr/>
	{{ $vehicles->links() }}
	@else
	</div><hr/> 
		<div class="jumbotron col-md-8 offset-md-2 center">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no vehicle in database add one now.</h4>
			<hr/><a href="/vehicles/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Vehicle</a>	
		</div>
	@endif
</div>
@endsection