
@section('general_info')
<div class="my-3">
	@if(isset($vehicle) && count($vehicle)>0)
	<h5 class="text-muted p-2">Vehicle Info<hr/></h5>
	<div class="row">
		<div class="col-lg-3 col-md-4">
			<img src="/{{  $vehicle[0]->vehicle_image }}" class="col">
		</div>
		<div class="col-lg-4 col-md-4 row">		
			<dt class="col-sm-5">Vehicle Name</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->vehicle_name }}</dd>
			<dt class="col-sm-5">Type</dt>
			<dd class="col-sm-7">{{ "ABCD" }}</dd>
			<dt class="col-sm-5">Make</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->make }}</dd>
			<dt class="col-sm-5">Model</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->model }}</dd>
			<dt class="col-sm-5">Year of Manufacture</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->manufacture_year }}</dd>
		</div>
		<div class="col-lg-5 col-md-4 row">	
			<dt class="col-sm-5">VIN</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->vin }}</dd>
			<dt class="col-sm-5">Engine</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->engine }}</dd>
			<dt class="col-sm-5">Plate</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->plate }}</dd>
			<dt class="col-sm-5">Fuel Type</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->fuel_type }}</dd>
			<dt class="col-sm-5">Meter Reading</dt>
			<dd class="col-sm-7">{{ $vehicle[0]->primary_meter }}</dd>
		</div>
	</div>
	@endif
</div>
@endsection

@section('fuelentries')
<div class="my-3">
	@if(isset($fuelentries) && count($fuelentries)>0)
	<div class="d-flex justify-content-between px-3">
				<h4 class="header flex">Fuel Entries</span></h4>
				<div>
				<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-arrow-left"></i> Back</a>
				<a href="/vehicles/edit/{{ $vehicle_enquiry->vehicle_id }}" class="btn btn-warning px-3"><i class="fa fa-edit"></i> Edit</a>
				</div>
			</div>
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
		<div class="px-1">
			<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-download"></i> Export</a>
			<a href="/vehicles" class="btn btn-secondary px-3"><i class="fa fa-print"></i> Print</a>
		</div>
	@else
		<div class="jumbotron col-md-8 offset-md-2 center my-5">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no fuel log for this vehicle in database add one now.</h4>
			<hr/><a href="/issues/add" class="btn btn-primary"><i class="fa fa-plus"></i> Fuel Entry</a>	
		</div>
	@endif
@endsection

@section('issues')
<div class="my-3">
	@if(isset($issues) && count($issues)>0)
	<h5 class="text-muted p-2">Vehicle Issues</h5>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Vehicle</th>
		      <th scope="col">Title</th>
		      <th scope="col">Reported By</th>
		      <th scope="col">Description</th>
		      <th scope="col">Due Date</th>
		      <th scope="col">Status</th>
		    </tr>
		  </thead>
		  <tbody>
		  @foreach($issues as $issue)
		  <tr>
		  	<td>{{ $issue->id }}</td>	
		  	<td>{{ $issue->vehicle_name }}</td>	
		  	<td>{{ $issue->title }}</td>	
		  	<td>{{ $issue->reported_by }}</td>	
		  	<td>{{ $issue->description }}</td>	
		  	<td>{{ $issue->due_date }}</td>	
		  	<td>{{ "open" }}</td>	
		  </tr>	
		  @endforeach
		  </tbody>
		</table>
		<hr/>
		<div class="px-1">
			<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-download"></i> Export</a>
			<a href="/vehicles" class="btn btn-secondary px-3"><i class="fa fa-print"></i> Print</a>
		</div>

	@else
		<div class="jumbotron col-md-8 offset-md-2 center my-5">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no issue reported for this vehicle in database add one now.</h4>
			<hr/><a href="/issues/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Issue</a>	
		</div>
	@endif
</div>
@endsection


@section('work_orders')
<div class="my-3">
	@if(isset($work_orders) && count($work_orders)>0)
	<h5 class="text-muted p-2">Work Orders</h5>
	<table class="table">
	    <thead>
	      <tr>
	        <th scope="col">User Name</th>
	        <th scope="col">Service Id</th>
	        <th scope="col">Plate No</th>
	        <th scope="col">Sent Time</th>
	        <th scope="col">Finished Time</th>
	        <th scope="col">Expired Time</th>
	        <th scope="col">Location</th>
	        <th scope="col">Length</th>
	        <th scope="col">Initial M.R.</th>
	        <th scope="col">Final M.R.</th>
		    </tr>
		  </thead>
		  <tbody>
		  @foreach($work_orders as $work_order)
		  <tr>
		  	   <td>{{ $work_order->user_name }}</td>
			   <td>{{ $work_order->serv_id }}</td>
			   <td>{{ $work_order->plate }}</td>
			   <td>{{ $work_order->serv_sent_time }}</td>
			   <td>{{ $work_order->finished_time }}</td>
			   <td>{{ $work_order->serv_exp_time }}</td>
			   <td>{{ $work_order->serv_location }}</td>
			   <td>{{ $work_order->serv_length }} Km</td>
			   <td>{{ $work_order->initial_meter_reading }}</td>
			   <td>{{ $work_order->final_meter_reading }}</td>
		  </tr>	
		  @endforeach
		  </tbody>
		</table>
		<hr/>
		<div class="px-1">
			<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-download"></i> Export</a>
			<a href="/vehicles" class="btn btn-secondary px-3"><i class="fa fa-print"></i> Print</a>
		</div>

	@else
		<div class="jumbotron col-md-8 offset-md-2 center my-5">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no work order using this vehicle in database add one now.</h4>
			<hr/><a href="/Finished_services" class="btn btn-primary"><i class="fa fa-plus"></i>View All</a>	
		</div>
	@endif
</div>
@endsection

@section('services')
<div class="my-3">
	@if(isset($services) && count($services)>0)
	<h5 class="text-muted p-2">Services</h5>
	<table class="table">
	    <thead>
	       <tr>
	        <th scope="col">#</th>
	        <th scope="col">vehicle Name</th>
	        <th scope="col">Plate Number</th>
	        <th scope="col">Parts</th>
	        <th scope="col">Labago</th>
	        <th scope="col">labor</th>
	        <th scope="col">Fuel</th>
	        <th scope="col">Tire</th>
	        <th scope="col">Tire Inflation</th>
	        <th scope="col">total</th>
	      </tr>
	    </thead>
	    <tbody> 
			@foreach($services as $service)
			<tr>
		     	<td>{{ $service->service_id }}</td>
		        <td>{{ $service->vehicle_name }}</td>
		        <td>{{ $service->plate }}</td>
		        <td>{{ $service->parts }}</td>
		        <td>{{ $service->labago }}</td>
		        <td>{{ $service->labor }}</td>
		        <td>{{ $service->fuel }}</td>
		        <td>{{ $service->tire }}</td>
		        <td>{{ $service->tire_infl }}</td>
		        <td>{{ $service->parts + $service->labago + $service->labor + $service->fuel + $service->tire + $service->tire_infl }}</td>
		    </tr> 
		    @endforeach
	  	</tbody>
  	</table>
	<hr/>
	<div class="px-1">
		<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-download"></i> Export</a>
		<a href="/vehicles" class="btn btn-secondary px-3"><i class="fa fa-print"></i> Print</a>
	</div>
	@else
		<div class="jumbotron col-md-8 offset-md-2 center my-5">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no service for this vehicle in database add one now.</h4>
			<hr/><a href="/services/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Service</a>	
		</div>
	@endif
</div>
@endsection
