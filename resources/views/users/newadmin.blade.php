@extends('layouts.sidenav')
@section('content')
<div class="content">
<h4 class="header">Edit Profile<hr/></h4>   
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ url('/admins/edit') }}">
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-6">
         <div class="row form-group{{ $errors->has('f_name') ? ' has-error' : '' }}">
                <label for="f_name" class="control-label col-sm-4">First Name:</label>
                
                    <input id="f_name" type="text" class="form-control col-sm-7" name="f_name" value="{{ (isset($user) && count($user)>0) ? $user[0]->f_name : old('f_name') }}" >
                    @if ($errors->has('f_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('f_name') }}</strong>
                        </span>
                    @endif
            </div> 
         <div class="row form-group{{ $errors->has('l_name') ? ' has-error' : '' }}">
                <label for="l_name" class="control-label col-sm-4">Last Name:</label>
                    <input id="l_name" type="text" class="form-control col-sm-7" name="l_name" value="{{ (isset($user) && count($user)>0) ? $user[0]->l_name : old('l_name') }}" >
                    @if ($errors->has('l_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('l_name') }}</strong>
                        </span>
                    @endif
            </div> 
             <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label col-sm-4">Email:</label>
                    <input id="email" type="text" class="form-control col-sm-7" name="email" value="{{ (isset($user) && count($user)>0) ? $user[0]->email : old('email') }}" >
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
                        <div class="row form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                <label for="phone_no" class="control-label col-sm-4">Phone No:</label>
                    <input id="phone_no" type="text" class="form-control col-sm-7" name="phone_no" value="{{ (isset($user) && count($user)>0) ? $user[0]->phone_no : old('phone_no') }}" >
                    @if ($errors->has('phone_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                    @endif
            </div>
                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label col-sm-4">New Password:</label>
                                <input id="password" type="password" class="form-control col-sm-7" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                       <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label col-sm-4">Confirm New Password:</label>
                                <input id="password-confirm" type="password" class="form-control col-sm-7" name="password_confirmation" required>
                            </div>
          </div>
          <div class="col-md-6">
            <div class="row form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                <label for="sex" class="control-label col-sm-4">Sex:</label>
                    <select id="sex" type="text" class="form-control col-sm-7" name="sex" value="{{ (isset($user) && count($user)>0) ? $user[0]->sex : old('sex') }}" >>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    @if ($errors->has('sex'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sex') }}</strong>
                        </span>
                    @endif
            </div>
                <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="control-label col-sm-4">Address:</label>
                    <input id="address" type="text" class="form-control col-sm-7" name="address" value="{{ (isset($user) && count($user)>0) ? $user[0]->address : old('address') }}" >
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
            </div>
            <div class=" row form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
                <label for="image_url" class="control-label col-sm-4">Profile Picture:</label>
        <input id="image_url" type="file" class="filename" name="image_url" value="{{ old('image_url') }}" required>
                    @if ($errors->has('image_url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image_url') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
          </div>
          <hr class="w-100" />
            <div class="form-group py-2 px-3">          
        <button type="submit" onclick="return confirm('Are you sure for Update ?')" class="btn btn-primary">submit
                    </button>
                    <button type="submit" class="btn btn-secondary">
                        cancel
                    </button>
            </div>
        </div>
        </form>
</div>
@endsection