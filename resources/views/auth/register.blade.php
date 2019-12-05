@extends('layouts.sidenav')
@section('content')
    <div class="d-flex justify-content-between float-right">
        <a href="/users" class="btn btn-primary"><i class="fa fa-user"></i> Users</a>
    </div>
<div class="content my-3">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h2 class="panel-heading">Register Users<hr/></h2>
                <div class="panel-body px-3">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-6">
         <div class="row form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
                <label for="f_name" class="control-label col-sm-4">First Name:</label>
                    <input id="f_name" type="text" class="form-control col-sm-7" name="f_name" value="{{ old('f_name') }}" >
                    @if ($errors->has('f_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('f_name') }}</strong>
                        </span>
                    @endif
            </div> 
         <div class="row form-group{{ $errors->has('l_name') ? ' has-error' : '' }}">
                <label for="l_name" class="control-label col-sm-4">Last Name:</label>
                    <input id="l_name" type="text" class="form-control col-sm-7" name="l_name" value="{{ old('l_name') }}" >
                    @if ($errors->has('l_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('l_name') }}</strong>
                        </span>
                    @endif
            </div> 
             <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label col-sm-4">Email:</label>
                    <input id="email" type="text" class="form-control col-sm-7" name="email" value="{{ old('email') }}" >
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label col-sm-4">Password:</label>
                                <input id="password" type="password" class="form-control col-sm-7" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                       <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label col-sm-4">Confirm Password:</label>
                                <input id="password-confirm" type="password" class="form-control col-sm-7" name="password_confirmation" required>
                            </div>
          </div>
          <div class="col-md-6">
                      <div class="row form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                <label for="phone_no" class="control-label col-sm-4">Phone No:</label>
                    <input id="phone_no" type="text" class="form-control col-sm-7" name="phone_no" value="09">
                    @if ($errors->has('phone_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="row form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                <label for="sex" class="control-label col-sm-4">Sex:</label>
                    <select id="sex" type="text" class="form-control col-sm-7" name="sex" >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    @if ($errors->has('sex'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sex') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="row form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="role" class="control-label col-sm-4">Role:</label>
                    <select id="role" type="text" class="form-control col-sm-7" name="role" >
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                    </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
            </div>
                <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="control-label col-sm-4">Address:</label>
                    <input id="address" type="text" class="form-control col-sm-7" name="address" >
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
            </div>
          </div>
          <hr class="w-100" />
            <div class="form-group py-2 px-3">          
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                    <button type="submit" class="btn btn-secondary">
                        cancel
                    </button>
            </div>
        </div>
        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
