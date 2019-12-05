@extends('layouts.sidenav')
@section('content')
<div class="content">
<h3 class="header">Assigned Requests<hr/></h3>
  <table class="table">
  	<form name="form" action="" method="post">
    <thead>
      <tr>
        <th scope="col">User Name</th>
	      <th scope="col">Service Id</th>
        <th scope="col">Plate No</th>
        <th scope="col">Sent Time</th>
        <th scope="col">Assigned Time</th>
	      <th scope="col">Expired Time</th>
	      <th scope="col">Location</th>
        <th scope="col">Length</th>
        <th scope="col">Initial M.R.</th>
        <th scope="col">Delete</th>
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
   <td class="form-group">
        <a href="assigned_services/delete/'.$row1["serv_id"].'" class="btn btn-sm btn-danger"><i class="fa fa-delete"></i> Delete</a>
      </td>
   </tr>';}
   ?>
    </tbody>
     <tbody>
  </tbody>
     </table>
       <div class="row">
            <div class="form-group py-0 px-3">
           <a name="submitt"  href="/assigned_services/add">Assign</a>
            </div>
            <div class="form-group py-0 px-3">
           <a name="submitt"  href="/finished_services/add">Finish</a>
            </div>
            <div class="form-group py-0 px-3">
           <a name="submit"  href="/finished_services">Finished Requests</a>
            </div>
        </div>
       </form>
</div>       
@endsection