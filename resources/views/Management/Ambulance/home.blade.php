@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ambulance Requests</h4>
                <a href="{{ route('managerPortal.ambulanceAdd') }}" class="btn btn-info d-none d-lg-block m-l-15 col-sm-2">
                  <i class="fa fa-plus-circle"></i> New Ambulance Request
                </a>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Request By</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Notes</th>
                              <th>Status</th>
                              <th>Assigned To</th>
                              <th>View On Map</th>
                              <th>View Details</th>
                              <th>Edit</th>
                              <th>Remove</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Request By</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Notes</th>
                              <th>Status</th>
                              <th>Assigned To</th>
                              <th>View On Map</th>
                              <th>View Details</th>
                              <th>Edit</th>
                              <th>Remove</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($ambulances as $dat)
                            <tr>
                              <td class=" align-left">{{ $dat->Consumer->Name }}</td>
                              <td class="">{{ $dat->Consumer->Phone }}</td>
                              <td class="">{{ $dat->Address }}</td>
                              <td class="">{{ $dat->Notes }}</td>
                              <td class="">{{ $dat->Status }}</td>
                              <td class="">{{ $dat->AssignedTo }}</td>
                              <td class=""><a href="http://maps.google.com/?q={{$dat->Latitude}},{{$dat->Longitude}}" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td>
                              <td class=""><a href="{{ route('managerPortal.ambulanceDetails', $dat->id) }}"><i class="fas fa-eye"></i></a></td>
                              <td class=""><a href="{{ route('managerPortal.ambulanceEdit', $dat->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('managerPortal.ambulanceRemove', $dat->id) }}"><i class="far fa-times-circle"></i></a></td>
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
