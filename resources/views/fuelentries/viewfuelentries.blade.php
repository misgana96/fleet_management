@extends('layouts.sidenav')

@section('content')
<div class="content">
	<div class="d-flex justify-content-between">
	<h4 class="header px-3">Vehicles</h4>
	@if(count($fuelentries)>0)
		<a href="/vehicles/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i>Fuel Entry</a>
	</div><hr/>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Vehicle</th>
	      <th scope="col">Date</th>
	      <th scope="col">Amount</th>
	      <th sope="col">Price/Unit</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($fuelentries as $fuelentry)
	  <tr>
	  	<td>{{ $fuelentry->fuelentry_id }}</td>
	  	<td>{{ $fuelentry->vehicle_name }}</td>
	  	<td>{{ $fuelentry->fuelentry_date }}</td>
	  	<td>{{ $fuelentry->amount }}</td>
	  	<td>{{ $fuelentry->price_unit }}</td>
	  </tr>
	  @endforeach	
	  </tbody>
	</table>
	<hr/>
	{{ $fuelentries->links() }}
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