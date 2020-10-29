@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Edit Consumer</h4>
            </div>
            <div class="card-body">
              <form name="addForm" method="POST" action="{{ route('managerPortal.consumerEditPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Name</label>
                      <input type="text" name="Name" class="form-control" id="inputLastName" placeholder="Name" value="{{$c->Name}}"  required>
                      <input type="hidden" name="id" value="{{$c->id}}" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Email</label>
                      <input type="email" name="Email" class="form-control" id="inputLastName" placeholder="Email"  value="{{$c->Email}}"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Contact Number</label>
                      <input type="tel" name="Phone" class="form-control" id="inputLastName" placeholder="Contact Number" value="{{$c->Phone}}"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Password</label>
                      <input type="password" name="Password" class="form-control" id="inputLastName" placeholder="Password" value="" required>
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
