@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Add Ambulance Request</h4>
            </div>
            <div class="card-body">
              <form name="addForm" method="POST" action="{{ route('managerPortal.ambulanceEditPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                 <div class="col-sm-12">
                   <div class="form-group">
                     <label for="inputFirstName">Consumer</label>
                     <select name="ConsumerID"  class="form-control">
                       @foreach ($Consumers as $dat)
                        @if ($amb->ConsumerID==$dat->id)
                           <option value="{{ $dat->id }}" selected>{{ $dat->Name }}</option>
                        @else
                           <option value="{{ $dat->id }}">{{ $dat->Name }}</option>
                        @endif
                       @endforeach
                       </select>
                   </div>
                 </div>
               </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Address</label>
                      <input type="text" name="Address" class="form-control" id="inputLastName" placeholder="Address" value="{{$amb->Address}}"  required>
                      <input type="hidden" name="id" value="{{$amb->id}}" />
                      <input type="hidden" name="Latitude" value="" />
                      <input type="hidden" name="Longitude" value="" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Notes</label>
                      <input type="text" name="Notes" class="form-control" id="inputLastName" placeholder="Notes" value="{{$amb->Notes}}" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Assigned To</label>
                      <input type="text" name="AssignedTo" class="form-control" id="inputLastName" placeholder="Assigned To" value="{{$amb->AssignedTo}}"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Status</label>
                      <select name="Status"  class="form-control">
                        @if ($amb->Status=='Pending')
                           <option value="Pending" selected>Pending</option>
                        @else
                           <option value="Pending">Pending</option>
                        @endif
                        @if ($amb->Status=='Assigned')
                           <option value="Assigned" selected>Assigned</option>
                        @else
                           <option value="Assigned">Assigned</option>
                        @endif
                        @if ($amb->Status=='Complete')
                           <option value="Complete" selected>Complete</option>
                        @else
                           <option value="Complete">Complete</option>
                        @endif
                        </select>
                    </div>
                  </div>
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
