@extends('layouts.sidenav')

@section('content')
<div class="content">
	 <div class="justify-conten-end form-group">
    <a href="/reminders/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Reminder</a>
  </div>
   <table class="table">
   	 <thead>
   	 	 <tr>
   	 	<th scope="col">Reminder Id</th>
       <!-- <th scope="col">Vehicle photo</th>-->
        <th scope="col">Users</th>
        <th scope="col">vehicle Name</th>
        <th scope="col">Issue</th>
        <th scope="col">Due Date</th>
        <th scope="col">Action</th>

   	 	 </tr>
   	 </thead>
   	   <tbody>
   	   	@foreach($reminders as $reminder)
   	   	<tr>
   	   		 <td>{{ $reminder->reminder_id }}</td> 
   	   		 <td>{{ $reminder->users }}</td> 
   	   		 <td>{{ $reminder->vehicle_name }}</td> 
   	   		 <td>{{ $reminder->issue_id }}</td>
           <td>{{ $reminder->due_date }}</td>
           <td class="form-group">
           <a href="reminders/view/{{ $reminder->issue_id }}/issues" class="btn btn-sm btn-primary">View</a>&nbsp;
          <a href="reminders/edit/{{ $reminder->issue_id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
          </td>

   	   	</tr>
   	   	@endforeach
   	   </tbody>
   </table>
	</div>
@endsection