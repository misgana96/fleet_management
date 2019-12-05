@extends('layouts.navbar')

@include('layouts.order')

@section('content')
	<div class="content">
		@if($notification_enquiry!== null)
			<div class="d-flex justify-content-between px-3">
				<h4 class="header flex">{{ $notification_enquiry->notifiable_id }} - <span class="text-muted">Assigned Orders in Detail</span></h4>
			</div>
			<hr/>
			<ul class="nav nav-tabs">
			  	<li class="nav-item">
			    <a   class="nav-link {{ ($tab=='assigned_services') ? 'active' : '' }}" href="/notifications/view/{{ $notification_enquiry->notifiable_id}}/assigned_services">Assigned Orders</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='finished_services') ? 'active' : '' }}" href="/notifications/view/{{ $notification_enquiry->notifiable_id}}/finished_services">Finished Orders</a>
			  	</li>
			  	
			</ul>
			<div class="container">
				@if($tab=="assigned_services")
					@yield('assigned_services')
				@elseif($tab=="finished_services")
					@yield('finished_services')
				@elseif($tab=="fuel_log")
					@yield('fuelentries')
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