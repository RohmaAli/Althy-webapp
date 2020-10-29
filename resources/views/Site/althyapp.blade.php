@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<section class="hero-slider-container">
    <div class="hero-slider owl-carousel owl-theme">
        <div class="hero-slider-item hero-slider-item-7">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Download Our App</h1>
                    <p class="title2"> For Amazing Discounts</p>
                    <img src="{{URL::asset('QRCode.png')}}" style="width:150px" alt="" />
                    <a href='https://play.google.com/store/apps/details?id=com.althy.org&hl=en' style="margin-top:20px;width:150px;background:none; padding:0;"><img src="{{URL::asset('playstore.png')}}" width="200px" style="margin-top:20px;width:150px"/></a>
                    <a href='https://apps.apple.com/pk/app/althy/id1504725029' style="margin-top:20px;width:150px;background:none; padding:0;"><img src="{{URL::asset('appstore.png')}}"  width="200px" style="margin-top:20px;width:150px"/></a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-11">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Download Our App</h1>
                    <p class="title2"> For Amazing Discounts</p>
                    <img src="{{URL::asset('QRCode.png')}}" style="width:150px" alt="" />
                    <a href='https://play.google.com/store/apps/details?id=com.althy.org&hl=en' style="margin-top:20px;width:150px;background:none; padding:0;"><img src="{{URL::asset('playstore.png')}}" width="200px" style="margin-top:20px;width:150px"/></a>
                    <a href='https://apps.apple.com/pk/app/althy/id1504725029' style="margin-top:20px;width:150px;background:none; padding:0;"><img src="{{URL::asset('appstore.png')}}"  width="200px" style="margin-top:20px;width:150px"/></a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-9">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Download Our App</h1>
                    <p class="title2"> For Amazing Discounts</p>
                    <img src="{{URL::asset('QRCode.png')}}" style="width:150px" alt="" />
                    <a href='https://play.google.com/store/apps/details?id=com.althy.org&hl=en' style="margin-top:20px;width:150px;background:none; padding:0;"><img src="{{URL::asset('playstore.png')}}" width="200px" style="margin-top:20px;width:150px"/></a>
                    <a href='https://apps.apple.com/pk/app/althy/id1504725029' style="margin-top:20px;width:150px;background:none; padding:0;"><img src="{{URL::asset('appstore.png')}}"  width="200px" style="margin-top:20px;width:150px"/></a>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection
