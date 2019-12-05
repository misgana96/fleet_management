@extends('layouts.sidenav')
@section('content')
<div class="content"> 
    @if(isset($vehicle) && count($vehicle)==0)
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
        @if(!isset($vehicle)) 
            <h4 class="header px-3">Add Vehicle</h4><hr/>
        @else
            <h4 class="header px-3">Edit Vehicle</h4><hr/>
        @endif
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="">
        {{ csrf_field() }}
        <div class="row p-3">
        <div class="col-md-6">
         <div class="row form-group{{ $errors->has('vehicle_name') ? ' has-error' : '' }}">
                <label for="Vehicle name" class="control-label col-sm-4">Vehicle Name</label>
                    <div class="col-sm-7">
                        <input id="vehicle_name" type="text" class="form-control " name="vehicle_name" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->vehicle_name : old('vehicle_name') }}" >
                    @if ($errors->has('vehicle_name'))
                        <span class="help-block">
                    <strong>{{ $errors->first('vehicle_name')}}</strong>
                        </span>
                    @endif</div>
            </div> 
         <div class="row form-group{{ $errors->has('vehicle_type') ? ' has-error' : '' }}">
                <label for="vehicle_type" class="control-label col-sm-4">Vehicle Type</label>
                    <div class="col-sm-7">
                        <input id="vehicle_type" type="text" class="form-control " name="vehicle_type" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->vehicle_type : old('vehicle_type') }}" >
                    @if ($errors->has('vehicle_type'))
                        <span class="help-block">
                    <strong>{{ $errors->first('vehicle_type')}}</strong>
                        </span>
                    @endif</div>
            </div> 
            <div class="row form-group{{ $errors->has('make') ? ' has-error' : '' }}">
                <label for="email" class="control-label col-sm-4">Make</label>
                    <div class="col-sm-7">
                        <input id="make" type="text" class="form-control " name="make" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->make : old('make') }}" >
                    @if ($errors->has('make'))
                        <span class="help-block">
                            <strong>{{ $errors->first('make') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                <label for="model" class="control-label col-sm-4">Model</label>
                    <div class="col-sm-7">
                        <input id="model" type="text" class="form-control " name="model" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->model : old('model') }}">
                    @if ($errors->has('model'))
                        <span class="help-block">
                            <strong>{{ $errors->first('model') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-4">Color</label>
                    <div class="col-sm-7">
                        <input id="color" type="text" class="form-control " name="color" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->color : old('color') }}">

                    @if ($errors->has('color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('color') }}</strong>
                        </span>
                    @endif</div>
            </div>
             <div class="row form-group{{ $errors->has('manufacture_year') ? ' has-error' : '' }}">
                <label for="manufacture_year" class="control-label col-sm-4">Year of Manufacture</label>
                    <div class="col-sm-7">
                        <input id="manufacture_year" type="date" class="form-control " name="manufacture_year" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->manufacture_year : old('manufacture_year') }}">

                    @if ($errors->has('manufacture_year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('manufacture_year') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                <label for="Vehicle name" class="control-label col-sm-4">Driver: </label>

                    <div class="col-sm-7">
                        <select id="driver" type="text" class="form-control " name="driver" value="{{ old('vehicle_name') }}" >
                            <option value="">Select</option>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->f_name." ".$driver->l_name }}</option>
                            @endforeach
                        </select>

                    @if ($errors->has('driver'))
                        <span class="help-block">
                            <strong>{{ $errors->first('driver') }}</strong>
                        </span>
                    @endif</div>
            </div>
          </div>

          <div class="col-md-6">
             <div class="row form-group{{ $errors->has('vin') ? ' has-error' : '' }}">
                <label for="vin" class="control-label col-sm-4">VIN Number</label>
                    <div class="col-sm-7">
                        <input id="vin" type="text" class="form-control " name="vin" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->vin : old('vin') }}" >

                    @if ($errors->has('vin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vin') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('engine') ? ' has-error' : '' }}">
                <label for="engine" class="control-label col-sm-4">Engine Number</label>
                    <div class="col-sm-7">
                        <input id="engine" type="text" class="form-control " name="engine" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->engine : old('engine') }}" >

                    @if ($errors->has('engine'))
                        <span class="help-block">
                            <strong>{{ $errors->first('engine') }}</strong>
                        </span>
                    @endif</div>
            </div> 
             <div class="row form-group{{ $errors->has('plate') ? ' has-error' : '' }}">
                <label for="email" class="control-label col-sm-4">Plate Number</label>
                    <div class="col-sm-7">
                        <input id="plate" type="text" class="form-control " name="plate" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->plate : old('plate') }}" >

                    @if ($errors->has('plate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('plate') }}</strong>
                        </span>
                    @endif</div>
            </div>

            <div class="row form-group{{ $errors->has('fuel') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">Fuel Type</label>
                <div class="col-sm-7">
                    <select id="fuel" type="text" class="form-control " name="fuel" >
                        <option value="">Select</option>
                        <option value="1">Disele</option>
                        <option value="2">Beinsein</option>
                    </select>
                    @if ($errors->has('fuel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fuel') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="row form-group{{ $errors->has('primary_meter') ? ' has-error' : '' }}">
                <label for="fuel_tank" class="control-label col-sm-4">Fuel Tank</label>
                    <div class="col-sm-7">
                        <input id="fuel_tank" type="text" class="form-control " name="fuel_tank" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->fuel_tank : old('fuel_tank') }}" >

                    @if ($errors->has('fuel_tank'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fuel_tank') }}</strong>
                        </span>
                    @endif</div>
            </div>
            
            <div class="row form-group{{ $errors->has('primary_meter') ? ' has-error' : '' }}">
                <label for="primary_meter" class="control-label col-sm-4">Odometer</label>
                <div class="col-sm-7">
                        <input id="primary_meter" type="text" class="form-control" name="primary_meter" value="{{ (isset($vehicle) && count($vehicle)>0) ? $vehicle[0]->primary_meter : old('primary_meter') }}" >
                    @if ($errors->has('primary_meter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('primary_meter') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="row form-group{{ $errors->has('vehicle_image') ? ' has-error' : '' }}">
                <label for="upload-file-info" class="control-label col-sm-4">Picture: </label>
                <div class="col-sm-7">
                    <label class="form-control w-100 text-muted input-group" for="vehicle_image">
                        <span id="upload-file-info">Submit File</span>
                        <input type="file" name="vehicle_image" style="display: none" id="vehicle_image" 
                        onchange="$('#upload-file-info').html(this.files[0].name)">
                    </label>
                    @if ($errors->has('vehicle_image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
            
          <hr class="w-100" />
            <div class="form-group py-2 px-3">
                
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                    <a href="/vehicles" class="btn btn-secondary">
                        cancel
                    </a>
            </div>
        </div>
        </form>
    @endif
</div>

@endsection