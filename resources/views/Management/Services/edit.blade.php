@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Edit Service</h4>
            </div>
            <div class="card-body">
              <form name="addForm" method="POST" action="{{ route('managerPortal.servicesAddPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Name</label>
                      <input type="text" name="Name" class="form-control" id="inputLastName" placeholder="Name" value="{{$service->Name}}"  required>
                      <input type="hidden" name="id" value="{{$service->id}}" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Category</label>
                      <input type="text" name="Category" class="form-control" id="inputLastName" placeholder="Category" value="{{$service->Category}}"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Price</label>
                      <input type="text" name="Price" class="form-control" id="inputLastName" placeholder="Price" value="{{$service->Price}}"  required>
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
