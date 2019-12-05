@extends('layouts.header')

@section('container')
<div class="d-flex content-signin align-items-center">
    <form class="text-center form-signin form-horizontal content" role="form" method="POST" action="{{ url('/password/email') }}">
        <img class="mb-4 img rounded-circle" src="/img/scenery.jpg" alt="" width="100" height="100">
        {{ csrf_field() }}
        <h3 class="h3 mb-3 font-weight-normal">Reset password</h3> 
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label sr-only">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        <div class="form-group">

                <a class="btn btn-link" href="{{ url('/login') }}">
                    Login Now
                </a>
        </div>
        <p class="mt-5 text-muted">&copy; 2017-2018</p>
    </form>
</div>
@endsection
