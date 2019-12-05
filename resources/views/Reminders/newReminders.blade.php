@extends('layouts.sidenav')
<!--@require_once('Notification.notification')-->
@section('content')
<div class="content"> 
	<form class="form-horizontal col-lg-8 lg-offset-2" role="form" method="POST" action="{{ url('/reminders/add') }}">
		 {{ csrf_field() }}
		  <div class="row p-6">
		  	 <div class="col-md-6">
		  	 	 <h3>Service Reminder</h3><br>
		  	 	  <div class="row form-group{{ $errors->has('users') ? ' has-error' : '' }}">
                <label for="users" class="control-label col-sm-3">Users: </label>

                    <div class="col-sm-7">
                    
  
             <select id="users" type="text" class="form-control "  name="users">

            <?php
$hostname="localhost";
$username="root";
$password="";
$databaseName="fleetmanagement";
$connect=mysqli_connect($hostname,$username,$password,$databaseName);
$query="SELECT f_name  FROM users where role !='admin'  ";
$result1 =mysqli_query($connect,$query);
         while ($row1 =mysqli_fetch_array($result1)):;?>
        <option value="<?php echo $row1[0]?>"> <?php echo $row1[0];?></option>
       <?php endwhile;?>
       </select>

                    @if ($errors->has('users'))
                        <span class="help-block">
                            <strong>{{ $errors->first('users') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('vehicle_name') ? ' has-error' : '' }}">
                <label for="vehicle_name" class="control-label col-sm-3">Vehicle: </label>

                    <div class="col-sm-7">
                    
  
             <select id="vehicle_name" type="text" class="form-control "  name="vehicle_name">

            <?php
$hostname="localhost";
$username="root";
$password="";
$databaseName="fleetmanagement";
$connect=mysqli_connect($hostname,$username,$password,$databaseName);
$query="SELECT vehicle_name  FROM vehicles  ";
$result1 =mysqli_query($connect,$query);
         while ($row1 =mysqli_fetch_array($result1)):;?>
        <option value="<?php echo $row1[0]?>"> <?php echo $row1[0];?></option>
       <?php endwhile;?>
       </select>

                    @if ($errors->has('vehicle_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_name') }}</strong>
                        </span>
                    @endif</div>
            </div>
              <div class="row form-group{{ $errors->has('issue') ? ' has-error' : '' }}">
                <label for="issue_id" class="control-label col-sm-3">Issue: </label>

                    <div class="col-sm-7">
                    
         <select id="issue_id" type="text" class="form-control " name="issue_id" value="{{ old('id') }}" >
                            <option value="">Select</option>
                        @foreach($issues as $issue)
                            <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                        @endforeach
                        </select>

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif</div>
            </div>
             
    
             <div class=" row form-group{{ $errors->has('due_date') ? ' has-error' : '' }}">
                <label for="Date_field" class="control-label col-sm-4">Due Date</label>
                  <div class="col-sm-7">
                    <input id="due_date" type="date" class="form-control" placeholder="dd-MMM-yyyy" name="due_date" value="{{ old('due_date') }}" required>

                    @if ($errors->has('due_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('due_date') }}</strong>
                        </span>
                        {{'insert greater time'}}
                    @endif
                </div>
            </div> 

		  	 </div>
		  </div>
		   <div class="row form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                     
                </div>
            </div>
    
	</form>
</div>




@endsection