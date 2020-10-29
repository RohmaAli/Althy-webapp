@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Covid-19 Plasma Donors</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Covid-19 Plasma Donors</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row">
          <div class="col-md-3">
              <div class="blog-sidebar">
                <div class="single-sidebar">
                    <h3 class="sidebar-title">Menu</h3>
                    <div class="sidebar-list">
                        <ul>
                            <li><input type="checkbox"> <a href="{{ route('covid') }}">Covid-19 Home</a></li>
                            <li><input type="checkbox"> <a href="{{ route('plasmaDonors') }}">Plasma Donors</a></li>
                            <li><input type="checkbox"> <a href="{{ route('plasmaReceivers') }}">Plasma Receivers</a></li>
                        </ul>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-md-9 col-xs-12 col-sm-12">
            <div class="tab-pane mb-10 active" id="list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row ">
                          @foreach ($donors as $donor)
                          <div class="single-shop mb-40" style="border-bottom:1px solid #eee;height:135px;">
                              <div class="col-md-3 col-sm-3 col-xs-3">
                                  <div class="text-center">
                                      <div class="shop-img text-center centered" style="height:100px;border:none;">
                                          <a><img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" style="width:70px;border:none;margin-top:20px;" alt="" /></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-9 col-sm-9 col-xs-9">
                                  <div class="shop-list-right">
                                      <div class="shop-list-all">
                                          <div class="shop-list-name">
                                              <h6>Name: {{$donor->Name}}</h6>
                                              <h6>Blood Group: {{$donor->BloodGroup}}</h6>
                                              <h6>City: {{$donor->City}}</h6>
                                          </div>
                                          <div class="shop-list-cart">
                                              <div class="shop-group">
                                                  <a  href="tel:{{$donor->Contact}}" class="text-center">
                                                      <i class="pe-7s-call"></i>
                                                  Call
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
