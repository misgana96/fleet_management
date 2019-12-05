@extends('layouts.sidenav')
@section('content')
<div class="content">
	<div class="d-flex justify-content-between">
	<h4 class="header px-3">Drivers</h4>
	@if(count($drivers)>0)
		<a href="/drivers/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Driver</a>
	</div><hr/>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Photo</th>
	      <th scope="col">First name</th>
	      <th scope="col">Last Name</th>
	      <th scope="col">Sex</th>
	      <th scope="col">Email</th>
	      <th scope="col">Phone</th>
	      <th scope="col">Vehicle plate</th>
	      <th scope="col text">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($drivers as $driver)
	  <tr>
	  	<td>{{ $driver->driver_id }}</td>
	  	<td>
	  		<img class="no-marigin-top no-marigin-bottom" src="/{{ $driver->image}}" height="60px">
	  	</td>		
	  	<td>{{ $driver->first_name}}</td>	
	  	<td>{{ $driver->last_name}}</td>
	  	<td>{{ ($driver->sex=='M') ? 'Male' : 'Female'}} </td>
	  	<td>{{ $driver->email }}</td>
	  	<td>{{ $driver->phone }}</td>
	  	<td>{{ $driver->plate }}</td>
	  	<td class="form-group">
	  		<a href="drivers/edit/{{ $driver->driver_id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
	  		<a href="drivers/delete/{{ $driver->driver_id }}" class="btn btn-sm btn-danger"><i class="fa fa-delete"></i> Delete</a>
	  	</td>
	  </tr>	
	  @endforeach
	  </tbody>
	</table>
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