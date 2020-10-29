@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Verify Phone</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Verify Phone</li>
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
                        <h4>Verify Phone</h4>
                        <p>A 6-Digit Verification has been sent to your phone. <br/>Please enter the recieved number.</p>
                    </div>
                    <div class="login-form">
                        <form action="{{route('verifyPhonePost')}}" method="post">
                            <input name="OTP" placeholder="OTP" type="text">
                            <div class="button-remember">
                                <button class="login-btn" type="submit">Verify</button>
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
