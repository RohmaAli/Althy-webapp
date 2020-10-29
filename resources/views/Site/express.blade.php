@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<section class="hero-slider-container">
    <div class="hero-slider owl-carousel owl-theme">
        <div class="hero-slider-item hero-slider-item-8">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Become An Express Member</h1>
                    <p class="title2"> 10% Flat Discount</p>
                    <p class="title2"> Expedited Delivery</p>
                    <p class="title2"> </p>
                    <a href="{{route('checkout')}}">Join Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
