@extends('layouts.sidenav')
@section('content')
<div class="content"> 
<h3 class="header"> Assign Requests<hr/></h3>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/assigned_services/add') }}">
        {{ csrf_field() }}
        <table class="table">
        <div class="row">
        <div class="col-md-3">
            <div class="row form-group{{ $errors->has('serv_id') ? ' has-error' : '' }}">
                <label for="serv_id" class="control-label col-sm-4">Service Id</label>
                  <select id="serv_id" type="text" class="form-control col-sm-7"  name="serv_id">
            <?php
$connect=mysqli_connect("localhost","root","","fleetmanagement");
$query="SELECT serv_id FROM Work_orders where serv_id not in(SELECT serv_id FROM assigned_services) order by serv_id";
$result1 =mysqli_query($connect,$query);
         while ($row1 =mysqli_fetch_array($result1)):;?>
        <option value="<?php echo $row1[0]?>"><?php echo $row1[0];?></option>
       <?php endwhile;?>
       </select>
       @if ($errors->has('serv_id'))
        <span class="help-block">
               <strong>{{ $errors->first('serv_id') }}</strong>
                </span>
                    @endif
            </div>
          </div>
          <div class="col-md-3">
            <div class="row form-group{{ $errors->has('plate') ? ' has-error' : '' }}">
                <label for="plate" class="control-label col-sm-4">Plate No:</label>
                  <select id="plate" type="text" class="form-control col-sm-7"  name="plate">
            <?php
$connect=mysqli_connect("localhost","root","","fleetmanagement");
$query="SELECT plate FROM vehicles where plate not in(Select plate FROM assigned_services where serv_id not in(Select serv_id FROM finished_services))order by plate";
$result2 =mysqli_query($connect,$query);
         while ($row2 =mysqli_fetch_array($result2)):;?>
        <option value="<?php echo $row2[0]?>"><?php echo $row2[0];?></option>
       <?php endwhile;?>
       </select>
       @if ($errors->has('plate'))
        <span class="help-block">
               <strong>{{ $errors->first('plate') }}</strong>
                </span>
                    @endif
            </div>
          </div>
          <div class="col-md-3">
<div class="row form-group{{ $errors->has('initial_meter_reading') ? ' has-error' : '' }}">
        <label for="initial_meter_reading" class="control-label col-sm-5">Initial Meter Reading</label>
                    <input id="initial_meter_reading" type="text" class="form-control col-sm-4" name="initial_meter_reading" value="{{ old('initial_meter_reading') }}" >
                    @if ($errors->has('initial_meter_reading'))
                        <span class="help-block">
                            <strong>{{ $errors->first('initial_meter_reading') }}</strong>
                        </span>
                    @endif
            </div> 
   </div>
        <div class="row">
            <div class="form-group py-0 px-3">
           <button name="submit" type="submit" class="btn btn-primary">Assign</button>
            </div>
        </div>
      </div>
      </table>
        </form>
<form class="form-horizontal" role="form" method="POST">{{ csrf_field() }}
  <table class="table">
    <thead>
      <tr>
        <th scope="col">User Name</th>
        <th scope="col">Service Id</th>
        <th scope="col">Sent Time</th>
        <th scope="col">Initial Time</th>
        <th scope="col">Expired Time</th>
        <th scope="col">Location</th>
        <th scope="col">Distance(km)</th>
      </tr>
    </thead>
    <tbody>
       <?php
$link=mysqli_connect("localhost","root","","fleetmanagement");
$ser="SELECT * FROM Work_orders where serv_id not in(SELECT serv_id FROM assigned_services) order by serv_id";
$lin=mysqli_query($link,$ser);
while ($row1 =mysqli_fetch_array($lin)){
   echo '
   <tr>
   <td>'.$row1["user_name"].'</td>
   <td>'.$row1["serv_id"].'</td>
   <td>'.$row1["serv_sent_time"].'</td>
   <td>'.$row1["serv_initial_time"].'</td>
   <td>'.$row1["serv_exp_time"].'</td>
   <td>'.$row1["serv_location"].'</td>
   <td>'.$row1["serv_length"].' Km</td>
   </tr>';}
   ?>
  </tbody>
  </table>
  <div class="row">
            <div class="form-group py-0 px-3">
           <a name="submitt"  href="/assigned_services">Assigned Requests</a>
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