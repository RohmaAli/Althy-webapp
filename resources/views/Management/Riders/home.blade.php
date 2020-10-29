@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Riders</h4>
                <a href="{{ route('ridersAdd') }}" class="btn btn-info d-none d-lg-block m-l-15 col-sm-2">
                  <i class="fa fa-plus-circle"></i> New Rider
                </a>
                <br/>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Contact</th>
                              <th>Email</th>
                              <th>Type</th>
                              <th>View Location</th>
                              <th>Edit</th>
                              <th>Remove</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Name</th>
                              <th>Contact</th>
                              <th>Email</th>
                              <th>Type</th>
                              <th>View Details</th>
                              <th>Edit</th>
                              <th>Remove</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($Riders as $dat)
                            <tr>
                              <td class=" align-left">{{ $dat->Name }}</td>
                              <td class="">{{ $dat->Phone }}</td>
                              <td class="">{{ $dat->Email }}</td>
                              <td class="">{{ $dat->Type }}</td>
                              <td class=""><a href="http://maps.google.com/?q={{$dat->Latitude}},{{$dat->Longitude}}" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td>
                              <td class=""><a href="{{ route('managerPortal.ridersEdit', $dat->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('managerPortal.ridersRemove', $dat->id) }}"><i class="far fa-times-circle"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
