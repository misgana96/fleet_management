@extends('layouts.navbar')
@section('content')
<div class="content">
	<h2>Your Request is no Assigned still.</h2>
	<h2>Your Request is Assigned!!</h2>
	<h2>Your Request is no Finsihed still.</h2>
	<h2>Your Request is Finished!!</h2>
	  <div class="row">
            <div class="form-group py-0 px-3">
           <a name="submit"  href="/work_orders/add">New Requests</a>
            </div>
            <div class="form-group py-0 px-3">
           <a name="submitt"  href="/work_orders">Requests</a>
            </div>
        </div>
</div>
@endsection