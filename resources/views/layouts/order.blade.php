
@section('general_info')

@section('assigned_services')
<div class="my-3">
	@if(isset($assigned_services) && count($assigned_services)>0)
	<h5 class="text-muted p-2">Assigned Orders</h5>
		<table class="table">
		  <thead>
		        <tr>
          <th scope="col">User Name</th>
	      <th scope="col">Service Id</th>
          <th scope="col">Plate Id</th>
          <th scope="col">Sent Time</th>
          <th scope="col">Assigned Time</th>
	      <th scope="col">Expired Time</th>
	      <th scope="col">Location</th>
          <th scope="col">Length</th>
          <th scope="col">Initial M.R.</th>
	     </tr>
		  </thead>
		   <tbody>
       <?php
$link=mysqli_connect("localhost","root","","fleetmanagement");
$ser="SELECT * FROM Work_orders where serv_id  in(SELECT serv_id FROM assigned_services) order by serv_id";
$s="SELECT * FROM assigned_services where serv_id  in(SELECT serv_id FROM assigned_services) order by id";
$lin=mysqli_query($link,$ser);
$l=mysqli_query($link,$s);
while ($row1 =mysqli_fetch_array($lin) and $row =mysqli_fetch_array($l)){
   echo '
   <tr>
   <td>'.$row1["user_name"].'</td>
   <td>'.$row1["serv_id"].'</td>
   <td>'.$row["plate"].'</td>
   <td>'.$row1["serv_sent_time"].'</td>
   <td>'.$row["assigned_time"].'</td>
   <td>'.$row1["serv_exp_time"].'</td>
   <td>'.$row1["serv_location"].'</td>
   <td>'.$row1["serv_length"].' Km</td>
   <td>'.$row["initial_meter_reading"].'</td>
   </tr>';}
   ?>
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
			<hr/><a href="/issues/add" class="btn btn-primary"><i class="fa fa-plus"></i> Fuel Entry</a>	
		</div>
	@endif
</div>
@endsection
@section('finished_services')
<div class="my-3">
	@if(isset($finished_services) && count($finished_services)>0)
	<h5 class="text-muted p-2">Finished Orders</h5>
		<table class="table">
		  <thead>
		    <tr>
        
        <th scope="col">Service Id</th>
        <th scope="col">Vehicle Id</th>
        <th scope="col">Finished Time</th>
        <th scope="col">Final M.R.</th>
	    </tr>
		  </thead>
		  <tbody>
		  @foreach($finished_services as $finished_service)
		  <tr>
		
		  	<td>{{ $finished_service->serv_id }}</td>	
		  	<td>{{ $finished_service->plate }}</td>	
	        <td>{{ $finished_service->finished_time }}</td>	
            <td>{{ $finished_service->final_meter_reading }}</td>	
		  		
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
			<h4 class="text-secondary">There is no finished request for this work order in database add one now.</h4>
			<hr/><a href="/issues/add" class="btn btn-primary"><i class="fa fa-plus"></i> Fuel Entry</a>	
		</div>
	@endif
</div>
@endsection


