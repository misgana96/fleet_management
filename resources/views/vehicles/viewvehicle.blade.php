@extends('layouts.sidenav')

@include('layouts.tables')

@section('content')
	<div class="content">
		@if($vehicle_enquiry!== null)
			<div class="d-flex justify-content-between px-3">
				<h4 class="header flex">{{ $vehicle_enquiry->vehicle_name }} - <span class="text-muted">Vehicle Detail</span></h4>
				<div>
				<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-arrow-left"></i> Back</a>
				<a href="/vehicles/edit/{{ $vehicle_enquiry->vehicle_id }}" class="btn btn-warning px-3"><i class="fa fa-edit"></i> Edit</a>
				</div>
			</div>
			<hr/>
			<ul class="nav nav-tabs">
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='general_info') ? 'active' : '' }}" href="/vehicles/view/{{ $vehicle_enquiry->vehicle_id}}">General Info</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='drivers') ? 'active' : '' }}" href="/vehicles/view/{{ $vehicle_enquiry->vehicle_id}}/driver">Drivers</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='services') ? 'active' : '' }}" href="/vehicles/view/{{ $vehicle_enquiry->vehicle_id}}/services">Services</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='work_orders') ? 'active' : '' }}" href="/vehicles/view/{{ $vehicle_enquiry->vehicle_id}}/work_orders">Work Orders</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='fuel_log') ? 'active' : '' }}" href="/vehicles/view/{{ $vehicle_enquiry->vehicle_id}}/fuel_log">Fuel Log</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='issues') ? 'active' : '' }}" href="/vehicles/view/{{ $vehicle_enquiry->vehicle_id}}/issues">Issues</a>
			  	</li>
			</ul>
			<div class="container">
				@if($tab=="general_info")
					@yield('general_info')
				@elseif($tab=="issues")
					@yield('issues')
				@elseif($tab=="fuel_log")
					@yield('fuelentries')
				@elseif($tab=="services")
					@yield('services')
				@elseif($tab=="work_orders")
					@yield('work_orders')
				@else
					return redirect('404');
				@endif
			</div>
			
		@else
			<div class="jumbotron col-md-6 offset-md-3">
				<h1>Oops!</h1>
				<h4 class="text-muted">Don't try to chit us. This page doesn't exist. That is all we know.</h4>
				<hr/>
				<div class="col px-0">
					<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-plus"></i> Back</a>
					<a href="/dashboard" class="btn btn-secondary px-3"><i class="fa fa-home"></i> Home</a>
				</div>
			</div>
		@endif
	</div>
@endsection