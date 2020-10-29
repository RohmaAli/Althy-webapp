@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Add Product</h4>
            </div>
            <div class="card-body">
              <form name="addForm" method="POST" action="{{ route('managerPortal.productAddPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Name</label>
                      <input type="text" name="Name" class="form-control" id="inputLastName" placeholder="Name"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Image</label>
                      <input type="file" name="Image" class="form-control" id="inputLastName" placeholder="Formula"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Packaging</label>
                      <input type="text" name="Packaging" class="form-control" id="inputLastName" placeholder="Packaging"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Purchase Price</label>
                      <input type="text" name="PurchasePrice" class="form-control" id="inputLastName" placeholder="PurchasePrice"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Sale Price</label>
                      <input type="text" name="SalePrice" class="form-control" id="inputLastName" placeholder="Sale Price"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Active</label>
                      <input type="checkbox" name="isActive" value="1" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="inputFirstName">Status</label>
                      <select name="Status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Out Of Stock">Out Of Stock</option>
                        <option value="Discontinued">Discontinued</option>
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
