@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Orders</h4>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Request By</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Details</th>
                              <th>Notes</th>
                              <th>Status</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>View On Map</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Request By</th>
                              <th>Contact</th>
                              <th>Address</th>
                              <th>Details</th>
                              <th>Notes</th>
                              <th>Status</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>View On Map</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($orders as $dat)
                            <tr>
                              <td class=" align-left">{{ $dat->Consumer->Name }}</td>
                              <td class="">{{ $dat->Consumer->Phone }}</td>
                              <td class="">{{ $dat->Address }}</td>
                              <td class="">
                                <ul>
                                  @if ($dat->OrderType=='General' || $dat->OrderType=='Medicine')
                                    @foreach ($dat->Details as $od)
                                      @if(isset($od->Product))
                                        <li>{{$od->Product->Name}} x {{$od->Quantity}}</li>
                                      @endif
                                    @endforeach
                                  @endif
                                  @if ($dat->OrderType=='Service')
                                    @foreach ($dat->Details as $od)
                                      @if(isset($od->Service))
                                        <li>{{$od->Service->Name}}</li>
                                      @endif
                                    @endforeach
                                  @endif
                                </ul>
                              </td>
                              <td class="">{{ $dat->Notes }}</td>
                              <td class="">{{ $dat->OrderStatus }}</td>
                              <td class="">{{ $dat->OrderPrice }}</td>
                              <td class="">{{ $dat->created_at }}</td>
                              <td class=""><a href="https://www.google.com/maps/@{{$dat->Latitude}},{{$dat->Longitude}},16z" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td>
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
