@extends('layouts.navbar')
@section('content')
<div class="content"> 
<h4 class="header">New Request<hr/></h4>         
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/work_orders/add') }}">
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-6">
            <div class="row form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                <label for="user_name" class="control-label col-sm-3">User Name: </label>

                    <div class="col-sm-7"><input id="user_name" type="text" class="form-control " name="user_name" value="{{ old('user_name') }}" >

                    @if ($errors->has('user_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_name') }}</strong>
                        </span>
                    @endif</div>
            </div> 
          <div class="row form-group{{ $errors->has('jour_name') ? ' has-error' : '' }}">
                <label for="jour_name" class="control-label col-sm-3">Traveler List: </label>

                      <div class="col-sm-7"><textarea id="jour_name" type="text" rows="3" class="form-control " name="jour_name" ></textarea>

                    @if ($errors->has('jour_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jour_name') }}</strong>
                        </span>
                    @endif</div>
            </div>
             <div class="row form-group{{ $errors->has('serv_location') ? ' has-error' : '' }}">
                <label for="serv_location" class="control-label col-sm-3">Location: </label>

                    <div class="col-sm-7"><input id="serv_location" type="text" class="form-control " name="serv_location" value="{{ old('serv_location') }}" >

                    @if ($errors->has('serv_location'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serv_location') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('serv_length') ? ' has-error' : '' }}">
                <label for="serv_length" class="control-label col-sm-3">Length(km): </label>

                    <div class="col-sm-7">
                        <input id="serv_length" type="text" class="form-control " name="serv_length" value="{{ old('serv_length') }}">

                    @if ($errors->has('serv_length'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serv_length') }}</strong>
                        </span>
                    @endif</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row form-group{{ $errors->has('serv_initial_time') ? ' has-error' : '' }}">
                <label for="serv_initial_time" class="control-label col-sm-3">Initial Time: </label>
                    <div class="col-sm-7"><input id="serv_initial_time" type="time" value="08:00" class="form-control " name="serv_initial_time" value="{{ old('serv_initial_time') }}">

                    @if ($errors->has('serv_initial_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serv_initial_time') }}</strong>
                        </span>
                    @endif</div>
            </div>
            <div class="row form-group{{ $errors->has('serv_exp_time') ? ' has-error' : '' }}">
                <label for="serv_exp_time" class="control-label col-sm-3">Expired Time: </label>

                    <div class="col-sm-7"><input id="serv_exp_time" type="time" value="18:00" class="form-control " name="serv_exp_time" value="{{ old('serv_exp_time') }}">

                    @if ($errors->has('serv_exp_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serv_exp_time') }}</strong>
                        </span>
                    @endif</div>
            </div>
           <div class="row form-group{{ $errors->has('serv_case') ? ' has-error' : '' }}">
                <label for="serv_case" class="control-label col-sm-3">Request Case: </label>

                    <div class="col-sm-7"><textarea id="serv_case" type="text" rows="3" class="form-control " name="serv_case" ></textarea>

                    @if ($errors->has('serv_case'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serv_case') }}</strong>
                        </span>
                    @endif</div>
            </div>
        </div>
         </div>
            <div class="form-group py-2 px-3">
                
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                    <button type="submit" class="btn btn-secondary">
                        cancel
                    </button>
           <a name="submitt"  href="/work_orders">Requests</a>
            </div>
        </form>
</div>
@endsection