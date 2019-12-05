@extends('layouts.header')
@section('container')
<div class="row">
        <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <div class="navbar-brand w-100 text-center border-bottom" style="color: blue" href="#">.</div>
            <ul class="nav flex-column">
                  <li class="nav-item">
                <a class="nav-link" href="/user_dashboard">
                  <i class="fa fa-tachometer-alt"></i>  Dashboard
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseDriver" role="button" aria-expanded="false" aria-controls="collapseDriver">
                  <i class="fa fa-envelope"></i>  Requests <div class="fa fa-angle-down float-right"></div>
                </a>
                <ul class="collapse" id="collapseDriver">
                    <li class="nav-item">
                        <a href="/work_orders/add">
                          <i class="fa fa-comment"></i> New Request
                        </a>
                    </li>
                    <li class="nav-item">
                         <a href="/work_orders">
                          <i class="fa fa-tasks"></i> My Requests</a>
                    </li>
                </ul>
              </li>
                              <?php 
      $link=mysqli_connect("localhost","root","","fleetmanagement");
      $y=Auth::user()->id;
    $ser="SELECT id FROM notifications where notifiable_id=$y and status='no'";
    $lin=mysqli_query($link,$ser);
    $u=mysqli_num_rows($lin);
               ?>
                <li class="nav-item">
                <a class="nav-link" href="/notifications">
                    <i class="fa fa-bell"></i> Notification<?php echo "<strong><font color='orange'>($u)</font></strong>"; ?></a>
              </li>
              <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#collapseSetting" role="button" aria-expanded="false" aria-controls="collapseSetting">
                  <i class="fa fa-cog"></i>  Settings <div class="fa fa-angle-down float-right"></div>
                </a>
                <ul class="collapse" id="collapseSetting">
                    <li class="nav-item">
                        <a href="/users/edit">
                          <i class="fa fa-comment"></i> Edit Profile
                        </a>
                    </li>
                  <li class="nav-item">
                    <a class="fa fa-forward" role="button" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                </ul>
              </li>
    </nav>
    <style>
#navbar{
  width:100%;
  height:60px;
  background-color:rgb(210,220,230);
  color:black;
  top: 0;
}
</style>
        <main role="main" class="ml-sm-auto col-md-9 col-lg-10">
   <div class="row mb-4 bg-white mt-0 border-bottom justify-content-between" href="/admins/edit">
        <div class="col" id="navbar">
              <ul class="navbar-nav px-3">
                <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseLogout" role="button" aria-expanded="false" aria-controls="collapseLogout">
                 <?php
                 $connect=mysqli_connect("localhost","root","","fleetmanagement");
                 $r=Auth::user()->id;
                $w="SELECT image_url from users where id='$r'";
                 $result =mysqli_query($connect,$w);
             $row=mysqli_fetch_array($result);
                 ?>
                  <img class="circular-image fa fa-angle-down float-right" alt="my-image" src="/{{$row[0]}}" height="60px" width="60px" >
                </a>
                <ul class="collapse float-right" id="collapseLogout">  
              <li class="nav-item">
                     <a href="/users/edit">
                        <i class="fa fa-forward"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="fa fa-forward" role="button" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              </ul>
              <a class="float-right" href="{{ url('/notifications') }}" role="button" aria-expanded="false" aria-controls="collapseN">
                <i class="fa fa-bell"></i>  <?php echo "<strong>Notification<font color='red'>($u) </font> </strong>"; ?>
               </a>
              <a><center><strong><h3>Fleet Management System</h3></strong></center></a>
              </li>
              </ul>
            </div>
          </div>
          <div class="px-4">
            @yield('content')
          </div>
        </main>
      </div>
    </div>
@endsection