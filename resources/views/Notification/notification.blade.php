 @extends('layouts.navbar')
@section('content')
 <div class="content">
   <table class="table">
     <thead>
       <tr>
      <th scope="col">Notification</th>
      <th scope="col">Plate No</th>
      <th scope="col">Created At</th>
      <th scope="col">In Detail</th>
         </tr>
     </thead>
       <tbody>
        @foreach( Auth::user()->unreadnotifications as $notification)
        <tr>
        <td >{{$notification->data['assign']}}</td>
        <td >{{$notification->plate}}</td> 
        <td >{{$notification->created_at}}</td>  

        <td class="form-group">
          
      <a href="/notifications/view/{{ $notification->notifiable_id }}/assigned_services" class="btn btn-sm btn-secondary">View in Detail</a>&nbsp;
         
        </td>
    
        </tr>
        @endforeach
       </tbody>
   </table>
             <?php 
  $link=mysqli_connect("localhost","root","","fleetmanagement");
  $y=Auth::user()->id;
  mysqli_query($link,"UPDATE notifications SET status='yes' where notifiable_id=$y");?>
  </div>
  @endsection
 