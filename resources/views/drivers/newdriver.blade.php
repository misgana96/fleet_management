@extends('layouts.sidenav')

@section('content')
<div class="content"> 
    @if(isset($driver) && count($driver)==0)
        <div class="jumbotron col-md-6 offset-md-3 mt-5">
            <h1>Oops!</h1>
            <h4 class="text-muted">Don't try to chit us. This page doesn't exist. That is all we know.</h4>
            <hr/>
            <div class="col px-0">
                <a href="/vehicles" class="btn btn-primary px-3"><i class="fa fa-plus"></i> Back</a>
                <a href="/dashboard" class="btn btn-secondary px-3"><i class="fa fa-home"></i> Home</a>
            </div>
        </div>
    @else
        @if(!isset($driver)) 
            <h4 class="header px-3">Add Driver</h4><hr/>
        @else
            <h4 class="header px-3">Edit Driver</h4><hr/>
        @endif        
         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="">
        {{ csrf_field() }}
        <div class="row p-3">
        <div class="col-md-6">
            <div class="row form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="control-label col-sm-3">First Name: </label>

                    <div class="col-sm-7"><input id="first_name" type="text" class="form-control " name="first_name" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->first_name : old('first_name') }}" >

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif</div>
            </div> 
             <div class="row form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="control-label col-sm-3">Last Name: </label>

                    <div class="col-sm-7"><input id="last_name" type="text" class="form-control " name="last_name" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->last_name : old('last_name') }}" >

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif</div>
            </div>
            
            <div class="row form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                <label for="sex" class="control-label col-sm-3">Sex: </label>
                    <div class="col-sm-7">
                    <select id="sex" type="text" class="form-control" name="sex" >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    @if ($errors->has('sex'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sex') }}</strong>
                        </span>
                    @endif</div>
            </div>
             <div class="row form-group{{ $errors->has('birth') ? ' has-error' : '' }}">
                <label for="birth" class="control-label col-sm-3">Birth: </label>

                    <div class="col-sm-7"><input id="birth" type="date" class="form-control " name="birth" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->birth : old('birth') }}" >

                    @if ($errors->has('birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birth') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('hired_on') ? ' has-error' : '' }}">
                <label for="hired_on" class="control-label col-sm-3">Hired On: </label>

                    <div class="col-sm-7">
                        <input id="hired_on" type="date" class="form-control " name="hired_on" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->hired_on : old('hired_on') }}">

                    @if ($errors->has('hired_on'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hired_on') }}</strong>
                        </span>
                    @endif</div>
            </div>
                <div class="row form-group{{ $errors->has('plate') ? ' has-error' : '' }}">
        <label for="plate" class="control-label col-sm-3">Plate No: </label>

        <div class="col-sm-7">
         <select id="plate" type="text" class="form-control"  name="plate">
            <?php
$connect=mysqli_connect("localhost","root","","fleetmanagement");
$query="SELECT plate FROM vehicles where plate not in(Select plate from drivers)";
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
        </div>
        <div class="col-md-6">
                        <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="control-label col-sm-3">Address: </label>

                    <div class="col-sm-7">
                        <input id="address" type="text" class="form-control " name="address" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->address : old('address') }}">

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('invoice_number') ? ' has-error' : '' }}">
                <label for="email" class="control-label col-sm-3">Email: </label>
                    <div class="col-sm-7"><input id="email" type="text" class="form-control " name="email" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->email : old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('invoice_number') ? ' has-error' : '' }}">
                <label for="phone" class="control-label col-sm-3">Phone: </label>

                    <div class="col-sm-7"><input id="phone" type="text" class="form-control " name="phone" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->phone : old('phone') }}">

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('emergency_phone') ? ' has-error' : '' }}">
                <label for="phone" class="control-label col-sm-3">Emergency: </label>

                    <div class="col-sm-7"><input id="phone" type="text" class="form-control " name="emergency_phone" value="{{ (isset($driver) && count($driver)>0) ? $driver[0]->emergency_phone : old('emergency_phone') }}">

                    @if ($errors->has('emergency_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('emergency_phone') }}</strong>
                        </span>
                    @endif</div>
            </div>
           <div class=" row form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image" class="control-label col-sm-3">Image:</label>
            <div class="col-sm-7">    
        <input id="image" type="file" class="filename" name="image" value="{{ old('image') }}" required>
        </div>
        </div>
           <hr class="w-100" />
            <div class="form-group p-2">
                
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                     <a href="/drivers" class="btn btn-secondary">
                        cancel
                    </a>
            </div>
        </form>
    @endif
</div>
@endsection