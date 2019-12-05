@extends('layouts.sidenav')

@section('content')
<div class="content"> 
<h4 class="header">Add Issue<hr/></h4>   
        <form class="form-horizontal form-horizontal" role="form" method="POST" action="{{ url('/issues/add') }}">
        {{ csrf_field() }}
        <div class="col-lg-7 lg-offset-2">
         <div class="row form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                <label for="Vehicle name" class="control-label col-sm-3">Vehicle: </label>

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

            <div class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="control-label col-sm-3">Title: </label>

                    <div class="col-sm-7">
                        <input id="model" type="text" class="form-control " name="title" >

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif</div>
            </div>  
             <div class="row form-group{{ $errors->has('reported_by') ? ' has-error' : '' }}">
                <label for="reported_by" class="control-label col-sm-3">Reported By: </label>

                    <div class="col-sm-7">
                        <input id="reported_by" type="text" class="form-control " name="reported_by" value="{{ old('reported_by') }}" >

                    @if ($errors->has('reported_by'))
                        <span class="help-block">
                            <strong>{{ $errors->first('reported_by') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-3">Priority: </label>

                    <div class="col-sm-7"><input id="color" type="text" class="form-control " name="priority" >

                    @if ($errors->has('priority'))
                        <span class="help-block">
                            <strong>{{ $errors->first('priority') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('due_date') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-3">Due Date: </label>

                    <div class="col-sm-7"><input id="due_date" type="date" class="form-control " name="due_date" >

                    @if ($errors->has('due_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('due_date') }}</strong>
                        </span>
                    @endif</div>
            </div>

            <div class="row form-group{{ $errors->has('attached_file') ? ' has-error' : '' }}">
                <label for="color" class="control-label col-sm-3">Attach File: </label>

                    <div class="col-sm-7">
                    <label class="form-control form-control-sm w-100 text-muted input-group" id="upload-file-info" for="my-file-selector">
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

             <div class="row form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="manufacture_year" class="control-label col-sm-3">Description: </label>

                    <div class="col-sm-7"><textarea id="manufacture_year" type="text" rows="3" class="form-control " name="description" ></textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif</div>
            </div>
        </div>
            <hr class="w-100" />
            <div class="form-group p-2">
                
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                     <a href="/issues" class="btn btn-secondary">
                        cancel
                    </a>
            </div>
        </form>
</div>

@endsection