@extends('layouts.sidenav')

@include('layouts.reminder')

@section('content')
	<div class="content">
		@if($reminder_enquiry!== null)
			<div class="d-flex justify-content-between px-3">
		<h4 class="header flex">{{ $reminder_enquiry->issue_id }} - <span class="text-muted">Issue Reminder in Detail</span></h4>
			</div>
			<hr/>
			<ul class="nav nav-tabs">
			  	<li class="nav-item">
                   <a  class="nav-link {{ ($tab=='issues') ? 'active' : '' }}" href="/reminders/view/{{ $reminder_enquiry->issue_id}}/issues">Issue Reminders</a>
			  	</li>
			  </ul>
			<div class="container">
				@if($tab=="issues")
					@yield('issues')
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