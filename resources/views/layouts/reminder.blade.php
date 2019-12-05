@section('general_info')
@section('issues')
<div class="my-3">
	@if(isset($issues) && count($issues)>0)
	<h5 class="text-muted p-2">Reminder Info</h5>
	<div class="row">
		<dl class="col-md-6 row">	
			<dt class="col-sm-4">Issue Id</dt>
			<dd class="col-sm-8">{{ $issues[0]->id }}</dd>
			<dt class="col-sm-4">Vehicle</dt>
			<dd class="col-sm-8">{{ $issues[0]->vehicle_name }}</dd>
			<dt class="col-sm-4">Title</dt>
			<dd class="col-sm-8">{{ $issues[0]->title }}</dd>
			<dt class="col-sm-4">Reported By</dt>
			<dd class="col-sm-8">{{ $issues[0]->reported_by }}</dd>
	
		<dt class="col-sm-4">Description</dt>
		<dd class="col-sm-8">{{ $issues[0]->description }}</dd>
		<dt class="col-sm-4">Due Date</dt>
		<dd class="col-sm-8">{{ $issues[0]->due_date }}</dd>
	</dl>
		</div>
	<hr/>
	<div class="px-1">
			<a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-download"></i> Export</a>
			<a href="/vehicles" class="btn btn-secondary px-3"><i class="fa fa-print"></i> Print</a>
   </div>

	@else
		<div class="jumbotron col-md-8 offset-md-2 center my-5">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no issue reported for this vehicle in database add one now.</h4>
			<hr/><a href="/issues/add" class="btn btn-primary"><i class="fa fa-plus"></i> Fuel Entry</a>	
		</div>
	@endif
</div>

@endsection