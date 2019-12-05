@extends('layouts.sidenav')

@section('content')
<div class="content">
	<div class="d-flex justify-content-between">
	<h4 class="header px-3">Vehicles</h4>
	@if(count($issues)>0)
		<a href="/issues/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Issue</a>
	</div><hr/>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Vehicle</th>
	      <th scope="col">Title</th>
	      <th scope="col">Reported On</th>
	      <th scope="col">Reported By</th>
	      <th scope="col">Description</th>
	      <th scope="col">Due Date</th>
	      <th scope="col">Priority</th>
	      <th scope="col">Status</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($issues as $issue)
	  <tr>
	  	<td>{{ $issue->id }}</td>	
	  	<td>{{ $issue->vehicle_name }}</td>	
	  	<td>{{ $issue->title }}</td>	
	  	<td>{{ $issue->created_at }}</td>	
	  	<td>{{ $issue->reported_by }}</td>	
	  	<td>{{ $issue->description }}</td>	
	  	<td>{{ $issue->due_date }}</td>	
	  	<td>{{ $issue->priority }}</td>	
	  	<td>
	  		@if($issue->status == 0)
	  			<a href="" class="btn btn-sm btn-primary">Finish</a>
	  		@else
	  			Completed
	  		@endif
	  	</td>	
	  </tr>	
	  @endforeach
	  </tbody>
	</table>
	<hr/>
	{{ $issues->links() }}
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