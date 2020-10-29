@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Success</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Success</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- error area start -->
<div class="error-area text-center ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-content">
                    <h3>Order Created Successfully!</h3>
                    <h5>Please wait for a call from Althy Partner! Your order will be delivered soon!</h5>
                    <sub>Please note that we are a platform between Consumers and Suppliers. We do not store any products!</sub><br/><br/>
                    <a href="{{ route('home') }}">TAKE ME HOME</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
