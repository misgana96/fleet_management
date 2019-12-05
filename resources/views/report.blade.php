@extends('layouts.sidenav')

@include('layouts.tables')

@section('fuelentrys')
<div class="my-3">
  @if(isset($fuelentrys) && count($fuelentrys)>0)
  <h5 class="text-muted p-2">Fuel Entries</h5>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Vehicle</th>
        <th scope="col">Distance</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total Cost</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($fuelentrys as $fuelentry)
    <tr>
      <td><a href="/vehicles/view/{{$fuelentry->vehicle_id}}/">{{ $fuelentry->vehicle_id }}</a></td>
      <td>{{ $fuelentry->vehicle_name }}</td>
      <td>{{ $fuelentry->vehicle_name }}</td>
      <td>{{ $fuelentry->amount }}</td>
      <td>{{ $fuelentry->price_unit }}</td>
      <td><a href="/vehicles/view/{{$fuelentry->vehicle_id}}/fuel_log" class="btn btn-secondary btn-sm">Detail</a></td>
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
      <h4 class="text-secondary">There is no fuel log for this vehicle in database add one now.</h4>
      <hr/><a href="/issues/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Issue</a> 
    </div>
  @endif
@endsection

@section('content')
<div class="content">
    <h4 class="header">Reports<hr/></h4>
    <form class="form px-2"role="form" method="POST" action="{{ url('/report') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col">
                <label for="type" class="control-label">Type : </label>
                <select class="form-control" id="type" name="type">
                    <option value="">Select</option>>
                    <option value="1">Fuel Entrys</option>
                    <option value="2">Issues</option>
                    <option value="3">Services</option>
                    <option value="4">Monthly</option>
                </select>

                @if ($errors->has('type'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col">
                <label for="vehicle" class="control-label">Vehicle : </label>
                <select id="vehicle" type="text" class="form-control " name="vehicle" value="{{ old('vehicle') }}" >
                    <option value="">Select</option>
                    <option value="0">All</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->vehicle_id }}">{{ $vehicle->vehicle_name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('vehicle'))
                <span class="text-danger">
                     <strong>{{ $errors->first('vehicle') }}</strong>
                 </span>
                 @endif
            </div>
            <div class="form-group col">
              <label for="vehicle" class="control-label">From Date : </label>
              <input type="date" name="from_date" class="form-control">
              @if ($errors->has('from_date'))
                <span class="text-danger">
                     <strong>{{ $errors->first('from_date') }}</strong>
                 </span>
              @endif
          </div>
          <div class="form-group col">
              <label for="vehicle" class="control-label">To Date : </label>
              <input type="date" name="to_date" class="form-control">
              @if ($errors->has('to_date'))
                <span class="text-danger">
                     <strong>{{ $errors->first('to_date') }}</strong>
                 </span>
              @endif
          </div>
      </div>
      <div class="form-group">       
          <button type="submit" class="btn btn-primary">Show Report</button>
      </div>
  </form>
  <hr/>
    <div class="container">
        @if(isset($fuelentrys))
            @yield('fuelentrys')
        @elseif(isset($fuelentries))
            @yield('fuelentries')
        @elseif(isset($issues))
            @yield('issues')
        @elseif(isset($services))
            @yield('services')
        @else
            
        @endif
  </div>
</div>
@endsection
