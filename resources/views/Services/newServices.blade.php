@extends('layouts.sidenav')

@section('content')
<div class="content"> 
    <form class="form-horizontal col-lg-10 col-md-8 lg-offset-2" role="form" method="POST" action="{{ url('/services/add') }}">
        {{ csrf_field() }}
        <div class="row p-6">
        <div class="col-md-6">
         <h3>Service Entry<hr/></h3><br>

               <div class="row form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                <label for="Vehicle name" class="control-label col-sm-4">Vehicle: </label>

                    <div class="col-sm-7">
                        <select id="vehicle" type="text" class="form-control " name="vehicle" value="{{ old('vehicle_name') }}" >
                            <option value="">Select</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->vehicle_id }}">{{ $vehicle->plate }}</option>
                        @endforeach
                        </select>

                    @if ($errors->has('vehicle'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle') }}</strong>
                        </span>
                    @endif</div>
            </div>

    <div class=" row form-group{{ $errors->has('Date_field') ? ' has-error' : '' }}">
                <label for="Date_field" class="control-label col-sm-4">Date</label>
                  <div class="col-sm-7">
                    <input id="Date_field" type="date" class="form-control" placeholder="dd-MMM-yyyy" name="Date_field" value="{{ old('Date_field') }}" required>

                    @if ($errors->has('Date_field'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Date_field') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 

            
             <div class=" row form-group{{ $errors->has('odometer') ? ' has-error' : '' }}">
                <label for="odometer" class="control-label col-sm-4">Odometer</label>
                  <div class="col-sm-7">
                    <input id="odometer" type="text" class="form-control" name="image_url" value="{{ old('odometer') }}" required>

                    @if ($errors->has('odometer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('odometer') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             
            <div class="row form-group{{ $errors->has('attached_file') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-4">Attach File: </label>

                    <div class="col-sm-7">
                    <label class="form-control form-control w-100 text-muted input-group" id="upload-file-info" for="my-file-selector">
                        <input id="my-file-selector" type="file" style="display:none" name="attached_file"
                        onchange="$('#upload-file-info').html(this.files[0].name)">
                        Select File
                    </label>
                    @if ($errors->has('attached_file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('attached_file') }}</strong>
                        </span>
                    @endif</div>
            </div>  
        </div>
             
<br>
<br>


       
            <div class="col-md-6">
            
          
           <h3>Cost<hr/></h3><br>
             <div class="row form-group{{ $errors->has('parts') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">parts</label>
                    <div class="col-sm-7">
                   <input id="parts" type="int" class="form-control" name="parts" value="0.00"  required>
                    @if ($errors->has('parts'))
                        <span class="help-block">
                            <strong>{{ $errors->first('parts') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row form-group{{ $errors->has('labor') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">labor</label>
                    <div class="col-sm-7">
                   <input id="labor" type="int" class="form-control"  name="labor" value="0.00"  required>
                    @if ($errors->has('labor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('labor') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

             <div class="row form-group{{ $errors->has('labago') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">labago</label>
                    <div class="col-sm-7">
                       
                   <input id="labago" type="int" class="form-control " name="labago" value="0.00"  required>
                    @if ($errors->has('labago'))
                        <span class="help-block">
                            <strong>{{ $errors->first('labago') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="row form-group{{ $errors->has('fuel') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">Lubricant</label>
                    <div class="col-sm-7">
                   <input id="fuel" type="int" class="form-control"  name="fuel" value="0.00"  required>
                    @if ($errors->has('fuel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fuel') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="row form-group{{ $errors->has('tire') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">Tire</label>
                    <div class="col-sm-7">
                   <input id="tire" type="int" class="form-control"  name="tire" value="0.00"  required>
                    @if ($errors->has('tire'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tire') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="row form-group{{ $errors->has('tire_infl') ? ' has-error' : '' }}">
                <label for="password" class="control-label col-sm-4">Tire inflation</label>
                    <div class="col-sm-7 ">
                        
                   <input id="tire_infl" type="int" class="form-control"  name="tire_infl" value="0.00"  required>
                    @if ($errors->has('tire_infl'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tire_infl') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                       
            </div>
         </div>
         <hr/>
           <div class="row form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                    <a href="/services" class="btn btn-secondary">
                        cancel
                    </a>
                </div>
            </div>
    

        </form>
         
</div>

@endsection