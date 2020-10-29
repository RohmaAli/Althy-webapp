@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">register</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>register</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- login area end -->
<div class="login-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-content">
                    <div class="login-title">
                        <h4>register</h4>
                        <p>Please sign up using account detail bellow.</p>
                    </div>
                    <div class="login-form">
                        <form action="{{route('customerRegisterPost')}}" method="post">
                            <input name="Name" placeholder="Name" type="text">
                            <input name="Email" placeholder="Email" type="email">
                            <input name="Phone" placeholder="Phone" type="tel">
                            <input name="Password" placeholder="Password" type="password">
                            <input name="ConfirmPassword" placeholder="Confirm Password" type="password">
                            <div class="button-remember">
                                <button class="login-btn" type="submit">register</button>
                            </div>
                            <div class="new-account">
                                <p>already have an account ? <a href="{{ route('customerLogin') }}">Login here</a></p>
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
<!-- login area end -->
<!-- subscribe area start -->
<div class="subscribe-area gray-bg mt-40">
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
