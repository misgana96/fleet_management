@extends('layouts.sidenav')

@section('content')
<div class="content"> 
<h4 class="header">Add Driver<hr/></h4>         
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/fuelentries/add') }}">
        {{ csrf_field() }}
        <div class="col-lg-7 lg-offset-2">
         <div class="row form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                <label for="vehicle" class="control-label col-sm-3">Vehicle: </label>

                    <div class="col-sm-7">
                        <select id="vehicle" type="text" class="form-control " name="vehicle" value="{{ old('vehicle_name') }}" >
                            <option value="">Select</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->vehicle_id }}">{{ $vehicle->vehicle_name }}</option>
                        @endforeach
                        </select>

                    @if ($errors->has('vehicle'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle') }}</strong>
                        </span>
                    @endif</div>
            </div>
         <div class="row form-group{{ $errors->has('fuelentry_date') ? ' has-error' : '' }}">
                <label for="fuelentry_date" class="control-label col-sm-3">Date: </label>

                    <div class="col-sm-7"><input id="vehicle_type" type="text" class="form-control " name="fuelentry_date" value="{{ old('fuelentry_date') }}" >

                    @if ($errors->has('fuelentry_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fuelentry_date') }}</strong>
                        </span>
                    @endif</div>
            </div> 
             <div class="row form-group{{ $errors->has('meter_start') ? ' has-error' : '' }}">
                <label for="meter_start" class="control-label col-sm-3">Meter Start: </label>

                    <div class="col-sm-7"><input id="meter_start" type="text" class="form-control " name="meter_start" value="{{ old('meter_start') }}" >

                    @if ($errors->has('meter_start'))
                        <span class="help-block">
                            <strong>{{ $errors->first('meter_start') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('fill_up') ? ' has-error' : '' }}">
                <label for="fill_up" class="control-label col-sm-3">Complete Fill Up: </label>
                <div class="col-sm-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fill_up" id="fill_up_1" value="1">
                        <label class="form-check-label" for="fill_up_1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fill_up" id="fill_up_2" value="0">
                      <label class="form-check-label" for="fill_up_2">No</label>
                    </div>

                    @if ($errors->has('fill_up'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fill_up') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="amount" class="control-label col-sm-3">Amount: </label>

                    <div class="col-sm-7">
                        <input type="range" class="form-control-range" id="formControlRange" name="amount" value="{{ old('amount') }}">

                    @if ($errors->has('amount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('price_unit') ? ' has-error' : '' }}">
                <label for="price_unit" class="control-label col-sm-3">Price/Unit: </label>

                    <div class="col-sm-7">
                        <input id="price_unit" type="text" class="form-control " name="price_unit" value="{{ old('price_unit') }}">

                    @if ($errors->has('price_unit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price_unit') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('vendor') ? ' has-error' : '' }}">
                <label for="vendor" class="control-label col-sm-3">Vendor: </label>

                    <div class="col-sm-7">
                        <input id="vendor" type="text" class="form-control " name="vendor" value="{{ old('vendor') }}">

                    @if ($errors->has('vendor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vendor') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('invoice_number') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-3">Invoice Number: </label>

                    <div class="col-sm-7"><input id="color" type="text" class="form-control " name="invoice_number" value="{{ old('invoice_number') }}">

                    @if ($errors->has('invoice_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('invoice_number') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('invoice') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-3">Invoice: </label>

                    <div class="col-sm-7">
                    <label class="form-control w-100 text-muted input-group" id="upload-file-info" for="my-file-selector">
                        <input id="my-file-selector" type="file" style="display:none" 
                        onchange="$('#upload-file-info').html(this.files[0].name)">
                        Select File
                    </label>
                    @if ($errors->has('inovice'))
                        <span class="help-block">
                            <strong>{{ $errors->first('invoice') }}</strong>
                        </span>
                    @endif</div>
            </div>
        </div>
            <hr class="w-100" />
            <div class="form-group p-2">
                
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                     <a href="/fuelentries" class="btn btn-secondary">
                        cancel
                    </a>
            </div>
        </form>
</div>
@endsection