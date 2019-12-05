@extends('layouts.sidenav')
@section('content')
<div class="content">
<h3 class="header"> Finish Requests<hr/></h3>
 <form class="form-horizontal" role="form" method="POST" action="{{ url('/finished_services/add') }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-3">
            <div class="row form-group{{ $errors->has('serv_id') ? ' has-error' : '' }}">
                <label for="serv_id" class="control-label col-sm-4">Service Id</label>
                  <select id="serv_id" type="text" class="form-control col-sm-7"  name="serv_id">
            <?php
$connect=mysqli_connect("localhost","root","","fleetmanagement");
$query="SELECT serv_id FROM assigned_services where serv_id not in(SELECT serv_id FROM finished_services) order by id";
$result2 =mysqli_query($connect,$query);
         while ($row2 =mysqli_fetch_array($result2)):;?>
        <option value="<?php echo $row2[0]?>"><?php echo $row2[0];?></option>
       <?php endwhile;?>
       </select>
       @if ($errors->has('serv_id'))
        <span class="help-block">
               <strong>{{ $errors->first('vehicle-id') }}</strong>
                </span>
                    @endif
            </div>
          </div>
           <div class="col-md-3">
<div class="row form-group{{ $errors->has('final_meter_reading') ? ' has-error' : '' }}">
                <label for="final_meter_reading" class="control-label col-sm-5">Final Meter Reading</label>

                    <input id="final_meter_reading" type="text" class="form-control col-sm-4" name="final_meter_reading" value="{{ old('final_meter_reading') }}" >

                    @if ($errors->has('final_meter_reading'))
                        <span class="help-block">
                            <strong>{{ $errors->first('final_meter_reading') }}</strong>
                        </span>
                    @endif
            </div> 
   </div>
          <div class="row">
            <div class="form-group py-0 px-3">
           <button name="submit" type="submit" class="btn btn-primary">Finish
                    </button>
            </div>
      </div>
    </div>
        </form> 
<form class="form-horizontal" role="form" method="POST">{{ csrf_field() }}
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
        <th scope="col">Distance(km)</th>
        <th scope="col">Initial M.R.</th>
      </tr>
    </thead>
    <tbody>
              <?php
$link=mysqli_connect("localhost","root","","fleetmanagement");
$ss="SELECT * FROM Work_orders where serv_id in (select serv_id from assigned_services where serv_id not in(select serv_id from finished_services)) order by serv_id";
$s="SELECT * FROM  assigned_services where serv_id  in (Select serv_id from finished_services) order by id";
$m="SELECT * FROM  finished_services";
$sss="SELECT * FROM  assigned_services where serv_id not in (Select serv_id from finished_services) order by id";
$l=mysqli_query($link,$s);
$ll=mysqli_query($link,$ss);
$lll=mysqli_query($link,$sss);
$mm=mysqli_query($link,$m);
$roww =mysqli_fetch_array($mm);
while($row =mysqli_fetch_array($l)){
   $ww= $row["plate"];
  $w=$row["serv_id"];
  mysqli_query($link,"UPDATE finished_services set plate='$ww' where serv_id='$w' ");
}
while ($row2 =mysqli_fetch_array($lll) and $row1 =mysqli_fetch_array($ll)){
     echo '
   <tr>
   <td>'.$row1["user_name"].'</td>
   <td>'.$row2["serv_id"].'</td>
   <td>'.$row2["plate"].'</td>
   <td>'.$row1["serv_sent_time"].'</td>
   <td>'.$roww["finished_time"].'</td>
   <td>'.$row1["serv_exp_time"].'</td>
   <td>'.$row1["serv_location"].'</td>
   <td>'.$row1["serv_length"].' Km</td>
   <td>'.$row2["initial_meter_reading"].'</td>
   </tr>';}
   ?>
  </tbody>
  </table>
    <div class="row">
            <div class="form-group py-0 px-3">
           <a name="submit"  href="/assigned_services/add">Assign</a>
            </div>
            <div class="form-group py-0 px-3">
           <a name="submitt"  href="/assigned_services">Assigned Requests</a>
            </div>
            <div class="form-group py-0 px-3">
           <a name="submittt"  href="/finished_services">Finished Requests</a>
            </div>
        </div>
</form>  
</div> 
@endsection