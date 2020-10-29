@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Add Rider</h4>
            </div>
            <div class="card-body">
              <form name="addForm" method="POST" action="{{ route('managerPortal.ridersAddPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Name</label>
                      <input type="text" name="ResellerName" class="form-control" id="inputLastName" placeholder="Name"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Email</label>
                      <input type="email" name="Email" class="form-control" id="inputLastName" placeholder="Email"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Contact Number</label>
                      <input type="tel" name="Phone" class="form-control" id="inputLastName" placeholder="Contact Number"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Password</label>
                      <input type="password" name="Password" class="form-control" id="inputLastName" placeholder="Password"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Type</label>
                      <select name="type">
                        <option value="General">General</option>
                        <option value="EMIT">EMIT</option>
                        <option value="Physiotherapy">Physiotherapy</option>
                        <option value="Ambulance">Ambulance</option>
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
