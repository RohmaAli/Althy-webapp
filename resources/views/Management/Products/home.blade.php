@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Filter</h4>
              <form name="addForm" method="POST" action="{{ route('managerPortal.productsSearch') }}">
              @csrf
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="inputLastName"> Name</label>
                    <input type="text" name="Name" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
      </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products</h4>
                <br/>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Sale Price</th>
                              <th>Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Sale Price</th>
                              <th>Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($products as $dat)
                            <tr>
                              <td class=" align-left"><img src="{{URL::asset('ProductImages/')}}/{{$dat->Image}}" width="150px"/></td>
                              <td class=" align-left">{{ $dat->Name }}</td>
                              <td class=" align-left">{{ $dat->ProductType }}</td>
                              <td class=" align-left">{{ $dat->SalePrice }}</td>
                              <td class=""><a href="{{ route('managerPortal.productsEdit', $dat->id) }}" target="_blank"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                      {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
