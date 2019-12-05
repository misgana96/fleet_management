@extends('layouts.header')
@section('container')
<div class="row">
        <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <div class="navbar-brand w-100 text-center border-bottom" href="#">ESSTI</div>

            <ul class="nav flex-column">
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
                        <a href="/work_orders">Requests</a>
                    </li>

                </ul>
              </li>
                <li class="nav-item">
                    
             
                <a class="nav-link" href="/notifications">
                    <i class="fa fa-file-alt"></i> Notification
                </a>
                  
              </li>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#collapseParts" role="button" aria-expanded="false" aria-controls="collapseParts">
                    <i class="fa fa-cog"></i> Settings
                </a>
              </li>
    </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="w-100 my-3">
              <ul class="navbar-nav px-3 justify-content-end">
                <li>
                    <a class="btn btn-secondary float-right" role="button" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              </ul>
            </div>
            @yield('content')
        </main>
    </div>
@endsection