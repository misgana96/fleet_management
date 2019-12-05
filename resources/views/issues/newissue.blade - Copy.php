@extends('layouts.header')

@section('content')
<div class="content">    
        <form class="form-horizontal col-lg-8 lg-offset-2" role="form" method="POST" action="{{ url('/addvehicle') }}">
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-6">
         <div class="form-group{{ $errors->has('Vehicle name') ? ' has-error' : '' }}">
                <label for="Vehicle name" class="control-label">Vehicle name</label>

                    <input id="vehicle_name" type="text" class="form-control" name="vehicle_name" value="{{ old('Vehicle name') }}" required>

                    @if ($errors->has('Vehicle name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Vehicle name') }}</strong>
                        </span>
                    @endif
            </div> 
             <div class="form-group{{ $errors->has('make') ? ' has-error' : '' }}">
                <label for="email" class="control-label">make</label>

                    <input id="make" type="text" class="form-control" name="make" value="{{ old('make') }}" required>

                    @if ($errors->has('make'))
                        <span class="help-block">
                            <strong>{{ $errors->first('make') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                <label for="password" class="control-label">model</label>

                    <input id="model" type="text" class="form-control" name="model" required>

                    @if ($errors->has('model'))
                        <span class="help-block">
                            <strong>{{ $errors->first('model') }}</strong>
                        </span>
                    @endif
            </div>
             <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                <label for="password" class="control-label">year</label>

                    <input id="year" type="int" class="form-control" name="year" required>

                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group{{ $errors->has('engine') ? ' has-error' : '' }}">
                <label for="engine" class="control-label">Engine Number</label>

                    <input id="engine" type="text" class="form-control" name="engine" value="{{ old('engine') }}" required>

                    @if ($errors->has('engine'))
                        <span class="help-block">
                            <strong>{{ $errors->first('engine') }}</strong>
                        </span>
                    @endif
            </div> 
             <div class="form-group{{ $errors->has('plate') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Plate Number</label>

                    <input id="plate" type="text" class="form-control" name="plate" value="{{ old('plate') }}" required>

                    @if ($errors->has('plate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('plate') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('fuel') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Fuel Type</label>

                    <select id="fuel" type="text" class="form-control" name="fuel" required>
                        <option value="1">Disele</option>
                        <option value="2">Beinsein</option>
                    </select>
                    @if ($errors->has('fuel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fuel') }}</strong>
                        </span>
                    @endif
            </div>
             <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                <label for="password" class="control-label">year</label>

                    <input id="year" type="int" class="form-control" name="year" required>

                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
            </div>
          </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                </div>
            </div>
        </div>
        </form>
</div>

@endsection