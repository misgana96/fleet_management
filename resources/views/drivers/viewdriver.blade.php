@extends('layouts.sidenav')

@include('layouts.tables')

@section('content')
	<div class="content">
		@if($driver_enquiry!== null)
			<div class="d-flex justify-content-between px-3">
				<h4 class="header flex">{{ $driver_enquiry->first_name }} - <span class="text-muted">Driver Detail</span></h4>
				<div>
				<a href="/drivers" class="btn btn-primary px-3"><i class="fa fa-arrow-left"></i> Back</a>
				<a href="/drivers/edit/{{ $driver_enquiry->driver_id }}" class="btn btn-warning px-3"><i class="fa fa-edit"></i> Edit</a>
				</div>
			</div>
			<hr/>
			<ul class="nav nav-tabs">
			  	<li class="nav-item">
			    	<a class="nav-link {{ ($tab=='general_info') ? 'active' : '' }}" href="/drivers/view/{{ $driver_enquiry->driver_id}}">General Info</a>
			  	</li>
			  
			</ul>
			<div class="container">
				@if($tab=="general_info")
					@yield('general_info')
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
					<a href="/drivers" class="btn btn-primary px-3"><i class="fa fa-plus"></i> Back</a>
					<a href="/dashboard" class="btn btn-secondary px-3"><i class="fa fa-home"></i> Home</a>
				</div>
			</div>
		@endif
	</div>
@endsection