@extends('layouts.sidenav')

@section('content')
<div class="content">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">First</th>
	      <th scope="col">Last</th>
	      <th scope="col">Handle</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($service )	
	  </tbody>
	</table>
</div>