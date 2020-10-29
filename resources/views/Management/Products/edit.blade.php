@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Edit Product</h4>
            </div>
            <div class="card-body">
              <form name="addForm" method="POST" action="{{ route('managerPortal.productsEditPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Name</label>
                      <input type="text" name="Name" class="form-control" id="inputLastName" placeholder="Name" value="{{$product->Name}}" disabled>
                      <input type="hidden" name="id" value="{{$product->id}}" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Description</label>
                      <textarea class="summernote" name="Description">{{$product->Description}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Features</label>
                      <textarea class="summernote" name="Features">{{$product->Features}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Thumbnail Image</label>
                      <img src="https://althy.pk/ProductImages/{{$product->Image}}" width="150px"/><br/>
                      <input type="file" name="Image" class="form-control" id="inputLastName" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Large Image 1</label>
                      <img src="https://althy.pk/ProductImages/{{$product->ImageLarge1}}" width="150px"/><br/>
                      <input type="file" name="ImageLarge1" class="form-control" id="inputLastName" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Large Image 2</label>
                      <img src="https://althy.pk/ProductImages/{{$product->ImageLarge2}}" width="150px"/><br/>
                      <input type="file" name="ImageLarge2" class="form-control" id="inputLastName" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Large Image 3</label>
                      <img src="https://althy.pk/ProductImages/{{$product->ImageLarge3}}" width="150px"/><br/>
                      <input type="file" name="ImageLarge3" class="form-control" id="inputLastName" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Large Image 4</label>
                      <img src="https://althy.pk/ProductImages/{{$product->ImageLarge4}}" width="150px"/><br/>
                      <input type="file" name="ImageLarge4" class="form-control" id="inputLastName" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Large Image 5</label>
                      <img src="https://althy.pk/ProductImages/{{$product->ImageLarge5}}" width="150px"/><br/>
                      <input type="file" name="ImageLarge5" class="form-control" id="inputLastName" >
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
