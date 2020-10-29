@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Welcome {{$consumer->Name}}</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Profile</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-40">
                <div class="blog-sidebar">
                  <div class="single-sidebar">
                      <h3 class="sidebar-title">Profile Menu</h3>
                      <div class="sidebar-list">
                          <ul>
                              <li><a href="{{route('profile')}}">My Profile</a></li>
                              <li><a href="{{route('orders')}}">My Orders</a></li>
                              <li><a href="{{route('customerLogout')}}">Logout</a></li>
                          </ul>
                      </div>
                  </div>
                </div>
            </div>
            <div class="col-md-9 mt-40">
              <div class="login-area">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="login-content">
                                  <div class="login-form">
                                    <form action="{{route('profilePost')}}" method="post">
                                        <input name="Name" placeholder="Name" type="text" value="{{$consumer->Name}}">
                                        <input name="Email" placeholder="Email" type="email" value="{{$consumer->Email}}">
                                        <input name="Phone" placeholder="Phone" type="tel" value="{{$consumer->Phone}}">
                                        <input name="Password" placeholder="Password" type="password">
                                        <input name="ConfirmPassword" placeholder="Confirm Password" type="password">
                                        <div class="button-remember">
                                            <button class="login-btn" type="submit">Update</button>
                                        </div>
                                        @if (\Session::has('error'))
                                          <div class="alert alert-success">
                                              <ul>
                                                  <li>{!! \Session::get('error') !!}</li>
                                              </ul>
                                          </div>
                                      @endif
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="subscribe-area gray-bg mt-100">
    <div class="container">
        <div class="subscribe-bg ptb-80">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
                    <div class="subscribe-from
                        text-center">
                        <h3>Download Our App Now to Get Amazing Discounts</h3>
                        <a href='https://play.google.com/store/apps/details?id=com.althy.org&hl=en' style="margin-top:20px;"><img src="{{URL::asset('playstore.png')}}" width="200px" style="margin-top:20px;"/></a>
                        <a href='https://apps.apple.com/pk/app/althy/id1504725029' style="margin-top:20px;"><img src="{{URL::asset('appstore.png')}}"  width="200px" style="margin-top:20px;"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
