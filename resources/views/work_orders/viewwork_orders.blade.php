@extends('layouts.navbar')
@section('content')
<h3 class="header">My Requests<hr/></h3>
<div class="content">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">User name</th>
	      <th scope="col">Traveler List</th>
	      <th scope="col">Location</th>
	      <th scope="col">Distance</th>
	      <th scope="col">Case</th>
	      <th scope="col">Sent Time</th>
	      <th scope="col">Initial Time</th>
	      <th scope="col">Expired Time</th>
	    </tr>
	  </thead>
	  <tbody>
	         <?php
	         $u=Auth::user()->id;
$link=mysqli_connect("localhost","root","","fleetmanagement");
$ser="SELECT * FROM Work_orders where user_id=$u order by serv_id";
$lin=mysqli_query($link,$ser);
while ($row1 =mysqli_fetch_array($lin)){
   echo '
   <tr>
   <td>'.$row1["serv_id"].'</td>
   <td>'.$row1["user_name"].'</td>
   <td>'.$row1["jour_name"].'</td>
   <td>'.$row1["serv_location"].'</td>
   <td>'.$row1["serv_length"].' Km</td>
   <td>'.$row1["serv_case"].'</td>
   <td>'.$row1["serv_sent_time"].'</td>
   <td>'.$row1["serv_initial_time"].'</td>
   <td>'.$row1["serv_exp_time"].'</td>
   </tr>';}
   ?>
	 <!-- 	  @foreach($work_orders as $work_order)
	 <tr>
	  	<td>{{ $work_order->serv_id }}</td>	
	  	<td>{{ $work_order->user_name}}</td>	
	  	<td>{{ $work_order->jour_name}}</td>
	  	<td>{{ $work_order->serv_location}}</td>
	  	<td>{{ $work_order->serv_length}}</td>
	  	<td>{{ $work_order->serv_case}}</td>
	  	<td>{{ $work_order->serv_sent_time}}</td>
	  	<td>{{ $work_order->serv_initial_time}}</td>
	  	<td>{{ $work_order->serv_exp_time}}</td>
	  </tr>	
	  @endforeach-->
	  </tbody>
	</table>
	  <div class="row">
            <div class="form-group py-0 px-3">
           <a name="submit"  href="/work_orders/add">New Requests</a>
            </div>
        </div>
</div>
@endsection