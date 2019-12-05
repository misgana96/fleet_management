@extends('layouts.header')

@section('container')
<div class="d-flex content-signin align-items-center">
    <form class="text-center form-signin form-horizontal content" role="form" method="POST" action="{{ url('/login') }}">
        <img class="mb-4 img rounded-circle" src="/img/scenery.jpg" alt="" width="100" height="100">
        {{ csrf_field() }}
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>   

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label sr-only">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label sr-only">Password</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

        <div class="form-group">

                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>
        </div>
        <p class="mt-5 text-muted">&copy; 2017-2018</p>
    </form>
</div>
@endsection
