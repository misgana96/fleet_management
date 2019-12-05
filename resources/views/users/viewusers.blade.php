@extends('layouts.sidenav')
@section('content')
<div class="content">
	<div class="d-flex justify-content-between">
	<h4 class="header px-3">Users</h4>
	@if(count($users)>0)
		<a href="/register" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add User</a>
	</div><hr/>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Image</th>
	      <th scope="col">First name</th>
	      <th scope="col">Last Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Phone No</th>
	      <th scope="col">Sex</th>
	      <th scope="col">Role</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($users as $user)
	  <tr>
	  	<td>{{ $user->id }}</td>
	  	<td><img class="no-marigin-top no-marigin-bottom"
	  		src="/{{ $user->image_url}}" width="60px" height="70px"></td>
	  	<td>{{ $user->role}}</td>
	  	<td>{{ $user->f_name}}</td>	
	  	<td>{{ $user->l_name}}</td>
	  	<td>{{ $user->email }}</td>
	  	<td>{{ $user->phone_no}}</td>
	  	<td>{{ $user->sex}}</td>
	  	<td class="form-group">
	  		<a href="users/delete/{{ $user->id }}" class="btn btn-sm btn-danger"><i class="fa fa-delete"></i> Delete</a>
	  	</td>
	  </tr>	
	  @endforeach
	  </tbody>
	</table>
	<hr/>
	{{ $users->links() }}
	@else
	</div><hr/> 
		<div class="jumbotron col-md-8 offset-md-2 center">
			<h2>Oops!</h2>
			<h4 class="text-secondary">There is no user in database add one now.</h4>
			<hr/><a href="/register" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>	
		</div>
	@endif
</div>
@endsection