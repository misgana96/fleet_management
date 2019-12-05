@extends('layouts.header')
@section('container')
<div class="row">
        <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
      <div class="navbar-brand w-100 text-center border-bottom" style="color: blue" href="#">&nbsp;</div>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fa fa-tachometer-alt"></i>  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapsePersonel" role="button" aria-expanded="false" aria-controls="collapsePersonel">
                  <i class="fa fa-users"></i> 
                  Users <div class="fa fa-angle-down float-right"></div>
                </a>
                <ul class="collapse" id="collapsePersonel">
                    <li class="nav-item">
                        <a href="/register">
                          <i class="fa fa-user-plus"></i>
                          Add User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users">
                      <i class="fa fa-male"></i>
                                Users</a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link justify-content-between" data-toggle="collapse" href="#collapseVehicles" role="button" aria-expanded="false" aria-controls="collapseVehicles">
                    <span class="fa fa-truck"></span> Vehicles <div class="fa fa-angle-down float-right"></div>
                </a>
                <ul class="collapse" id="collapseVehicles">
                    <li class="nav-item">
                        <a href="/vehicles/add">
                          <i class="fa fa-plus"></i>
                          Add Vehicle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/vehicles">
                          <i class="fa fa-car"></i>
                        Vehicles</a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseDriver" role="button" aria-expanded="false" aria-controls="collapseDriver">
                  <i class="fa fa-user-secret"></i>  Drivers <div class="fa fa-angle-down float-right"></div>
                </a>
                <ul class="collapse" id="collapseDriver">
                    <li class="nav-item">
                        <a href="/drivers/add">
                          <i class="fa fa-user-plus"></i>
                          Add Driver
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/drivers"><i class="fa fa-male"></i>
                          Drivers</a>
                    </li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseWork" role="button" aria-expanded="false" aria-controls="collapseWork">
                  <i class="fa fa-database"></i>
                  Work Orders <i class="fa fa-angle-down float-right"></i>
                </a>
                <?php 
                $link=mysqli_connect("localhost","root","","fleetmanagement");
$ser="SELECT serv_id FROM Work_orders where serv_id not in(SELECT serv_id FROM assigned_services)";
$ss="SELECT serv_id From  assigned_services where serv_id not in (Select serv_id from finished_services)";
$lin=mysqli_query($link,$ser);
$ll=mysqli_query($link,$ss);
$s=mysqli_num_rows($lin);
$t=mysqli_num_rows($ll);
               ?>
           <ul class="collapse" id="collapseWork">
                    <li class="nav-item">
                        <a href="/assigned_services/add">
                          <i class="fa fa-forward"></i> Requests<?php echo "<strong><font color='orange'>($s)</font></strong>"; ?></a>
                    </li>
                     <li class="nav-item">
                        <a href="/assigned_services">
                        <i class="fa fa-book"></i> Pending</a>
                    </li>
                    <li class="nav-item">
                        <a href="/finished_services/add">
                        <i class="fa fa-forward"></i> Processing<?php echo "<strong><font color='orange'>($t)</font></strong>"; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="/finished_services">
                        <i class="fa fa-book"></i> Finished</a>
                    </li>
                </ul>
              </li>
               <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseservices" role="button" aria-expanded="false" aria-controls="collapseservices">
                  <i class="fa fa-wrench"></i>
                  Services <i class="fa fa-angle-down float-right"></i>
                </a>
                <ul class="collapse" id="collapseservices">
                    <li class="nav-item">
                        <a href="/services/add"> <i class="fa fa-plus"></i> Add services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/services">All services</a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseIssue" role="button" aria-expanded="false" aria-controls="collapseIssue">
                  <i class="fa fa-bug"></i>
                  Issues <i class="fa fa-angle-down float-right"></i>
                </a>
                <ul class="collapse" id="collapseIssue">
                    <li class="nav-item">
                        <a href="/issues/add">
                          <i class="fa fa-plus"></i> Add Issue</a>
                    </li>
                    <li class="nav-item">
                        <a href="/issues">
                         <i class="fa fa-exclamation-circle"></i> All Issues</a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseFuel" role="button" aria-expanded="false" aria-controls="collapseFuel">
                  <i class="fa fa-flask"></i>
                  Fuel Entry <i class="fa fa-angle-down float-right"></i>
                </a>
                <ul class="collapse" id="collapseFuel">
                    <li class="nav-item">
                        <a href="/fuelentries/add">
                          <i class="fa fa-plus"></i> Fuel Entry</a>
                    </li>
                    <li class="nav-item">
                        <a href="/fuelentries">
                          <i class="fa fa-file"></i> All Fuel Log</a>
                    </li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#collapseReminders" role="button" aria-expanded="false" aria-controls="collapseReminders">
                  <i class="fa fa-tint"></i>
                  Reminders <i class="fa fa-angle-down float-right"></i>
                </a>
                <ul class="collapse" id="collapseReminders">
                    <li class="nav-item">
                        <a href="/reminders/add">
                          <i class="fa fa-plus"></i>
                        Add Reminders</a>
                    </li>
                    <li class="nav-item">
                        <a href="/reminders">All Reminders</a>
                    </li>
                </ul>
              </li>
             
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#collapseParts" role="button" aria-expanded="false" aria-controls="collapseParts">
                    <i class="fa fa-map"></i> Map
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/report" role="button">
                    <i class="fa fa-file-alt"></i> Report
                </a>
              </li>
                          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#collapseSetting" role="button" aria-expanded="false" aria-controls="collapseSetting">
                  <i class="fa fa-cogs"></i>  Settings <div class="fa fa-angle-down float-right"></div>
                </a>
                <ul class="collapse" id="collapseSetting">
                    <li class="nav-item">
                        <a href="/admins/edit">
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
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="fa-file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="fa-file-word"></span>
                  Last quarter
                </a>
              </li>
            </ul>
          </div>
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
                $w="SELECT image_url from users where id='$r' and role='admin'";
                $result =mysqli_query($connect,$w);
             $row=mysqli_fetch_array($result);?>
                  <img class="circular-image fa fa-angle-down float-right" alt="my-image" src="/{{$row[0]}}" height="50px" width="50px" >
                </a>
                <ul class="collapse float-right" id="collapseLogout">  
              <li class="nav-item">
                     <a href="/admins/edit">
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
                 <a class="float-right" href="{{ url('/finished_services/add') }}" role="button" aria-expanded="false" aria-controls="collapseN">
        <i class="fa fa-adjust"></i>  <?php echo "<strong>Processing<font color='red'>($t) </font></strong>";?>
               </a>
               <a class='float-right'>
               <?php echo "<font color='white'>. .</font>";?>
               </a>
              <a class="float-right" href="{{ url('/assigned_services/add') }}" role="button" aria-expanded="false" aria-controls="collapseN">
            <i class="fa fa-bell"></i>  <?php echo "<strong>Requests<font color='red'>($s) </font></strong>";?>
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
@endsection