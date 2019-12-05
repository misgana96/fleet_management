@extends('layouts.sidenav')

@section('content')
<div class="content">
<div class="d-flex justify-content-between">
  <h4 class="header px-3">Services</h4>
  @if(count($services)>0)
    <a href="/services/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Service</a>
  </div><hr/>
  <table class="table">
    <thead>
       <tr>
        <th scope="col">#</th>
       <!-- <th scope="col">Vehicle photo</th>-->
        <th scope="col">vehicle Name</th>
        <th scope="col">Plate Number</th>
        <th scope="col">Parts</th>
        <th scope="col">Labago</th>
        <th scope="col">labor</th>
        <th scope="col">Fuel</th>
        <th scope="col">Tire</th>
        <th scope="col">Tire Inflation</th>
        <th scope="col">total</th>

      </tr>
    </thead>
   <tbody> 
      @foreach($services as $service)
      <tr>
          <td>{{ $service->service_id }}</td>
            <td>{{ $service->vehicle_name }}</td>
            <td>{{ $service->plate }}</td>
            <td>{{ $service->parts }}</td>
            <td>{{ $service->labago }}</td>
            <td>{{ $service->labor }}</td>
            <td>{{ $service->fuel }}</td>
            <td>{{ $service->tire }}</td>
            <td>{{ $service->tire_infl }}</td>
            <td>{{ $service->parts + $service->labago + $service->labor + $service->fuel + $service->tire + $service->tire_infl }}</td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  <hr/>
  {{ $services->links() }}
  @else
  </div><hr/> 
    <div class="jumbotron col-md-8 offset-md-2 center">
      <h2>Oops!</h2>
      <h4 class="text-secondary">There is no vehicle in database add one now.</h4>
      <hr/><a href="/vehicles/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Vehicle</a> 
    </div>
  @endif
</div>
@endsection