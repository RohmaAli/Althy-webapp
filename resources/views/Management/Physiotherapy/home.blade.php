@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Physiotherapy Requests</h4>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Request By</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Notes</th>
                              <th>Status</th>
                              <th>Preferred Time</th>
                              <th>Assigned To</th>
                              <th>View On Map</th>
                              <th>View Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Request By</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Notes</th>
                              <th>Status</th>
                              <th>Preferred Time</th>
                              <th>Assigned To</th>
                              <th>View On Map</th>
                              <th>View Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($physiotherapy as $dat)
                            <tr>
                              <td class=" align-left">{{ $dat->Consumer->Name }}</td>
                              <td class="">{{ $dat->Consumer->Phone }}</td>
                              <td class="">{{ $dat->Address->Address }}</td>
                              <td class="">{{ $dat->Notes }}</td>
                              <td class="">{{ $dat->Status }}</td>
                              <td class="">{{ $dat->PreferredTime }}</td>
                              <td class="">{{ $dat->AssignedTo }}</td>
                              <td class=""><a href="https://www.google.com/maps/@{{$dat->Address->Latitude}},{{$dat->Address->Longitude}},16z" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td>
                              <td class=""><a href="{{ route('managerPortal.physiotherapyDetails', $dat->id) }}"><i class="fas fa-eye"></i></a></td>
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
