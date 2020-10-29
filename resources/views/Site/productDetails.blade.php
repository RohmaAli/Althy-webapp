@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">{{$product->Name}}</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>{{$product->Name}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="single-product-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="product-details-tab">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="product1">
                            <div class="large-img picZoomer">
                              @if ($product->ImageLarge1 != '')
                                <img class="productDetailsImage" src="https://althy.pk/ProductImages/{{$product->ImageLarge1}}" data-zoom="https://althy.pk/ProductImages/{{$product->ImageLarge1}}" alt="" />
                              @else
                                <img class="productDetailsImage" src="https://althy.pk/ProductImages/{{$product->Image}}" data-zoom="https://althy.pk/ProductImages/{{$product->Image}}" alt="" />
                              @endif
                            </div>
                        </div>

                          @if ($product->ImageLarge2 != '')
                          <div class="tab-pane" id="product2">
                            <div class="large-img picZoomer">
                                <img class="productDetailsImage" src="https://althy.pk/ProductImages/{{$product->ImageLarge2}}" data-zoom="https://althy.pk/ProductImages/{{$product->ImageLarge2}}" alt="" />
                            </div>
                          </div>
                          @endif

                          @if ($product->ImageLarge3 != '')
                          <div class="tab-pane" id="product3">
                            <div class="large-img picZoomer">
                                <img class="productDetailsImage" src="https://althy.pk/ProductImages/{{$product->ImageLarge3}}" data-zoom="https://althy.pk/ProductImages/{{$product->ImageLarge3}}" alt="" />
                            </div>
                          </div>
                          @endif

                          @if ($product->ImageLarge4 != '')
                          <div class="tab-pane" id="product4">
                            <div class="large-img picZoomer">
                                <img class="productDetailsImage" src="https://althy.pk/ProductImages/{{$product->ImageLarge4}}" data-zoom="https://althy.pk/ProductImages/{{$product->ImageLarge4}}" alt="" />
                            </div>
                          </div>
                          @endif

                          @if ($product->ImageLarge5 != '')
                          <div class="tab-pane" id="product5">
                            <div class="large-img picZoomer">
                                <img class="productDetailsImage" src="https://althy.pk/ProductImages/{{$product->ImageLarge5}}" data-zoom="https://althy.pk/ProductImages/{{$product->ImageLarge5}}" alt="" />
                            </div>
                          </div>
                          @endif
                    </div>
                    <!-- Nav tabs -->
                    <div class="details-tab owl-carousel">
                        <div class="active">
                          @if ($product->ImageLarge1 != '')
                            <a href="#product1" data-toggle="tab"><img src="https://althy.pk/ProductImages/{{$product->ImageLarge1}}" alt="" /></a>
                          @else
                            <a href="#product1" data-toggle="tab"><img src="https://althy.pk/ProductImages/{{$product->Image}}" alt="" /></a>
                          @endif
                        </div>
                        @if ($product->ImageLarge2 != '')
                        <div><a href="#product2" data-toggle="tab"><img src="https://althy.pk/ProductImages/{{$product->ImageLarge2}}" alt="" /></a></div>
                        @endif

                        @if ($product->ImageLarge3 != '')
                      <div><a href="#product3" data-toggle="tab"><img src="https://althy.pk/ProductImages/{{$product->ImageLarge3}}" alt="" /></a></div>
                        @endif

                        @if ($product->ImageLarge4 != '')
                        <div><a href="#product4" data-toggle="tab"><img src="https://althy.pk/ProductImages/{{$product->ImageLarge4}}" alt="" /></a></div>
                        @endif

                        @if ($product->ImageLarge5 != '')
                        <div><a href="#product5" data-toggle="tab"><img src="https://althy.pk/ProductImages/{{$product->ImageLarge5}}" alt="" /></a></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="single-product-content">
                    <div class="single-product-dec pb-30  for-pro-border">.
                      @if ($product->onSale==1)
                      <div class="timer2">
                          <div data-countdown2="2020/07/30"></div>
                      </div>
                      @endif

                        <h2>{{$product->Name}}</h2>
                        <span class="ratting">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                        </span>
                        @if ($product->onSale==1)
                          <h3 class="old">Rs. {{number_format($product->ActualPrice, 0)}}</h3>
                        @endif
                        <h3>Rs. {{number_format($product->SalePrice)}}</h3>
                        <p>{!! $product->Description !!}</p>
                    </div>
                    <div class="single-cart-color for-pro-border">
                        <p>availability :
                          @if ($product->Status=='Active')
                            <span>in stock</span></p>
                          @else
                            <span>{{$product->Status}}</span></p>
                          @endif
                        <div class="pro-quality">
                            <p>Quantity:</p>
                            <input value="1" type="number">
                        </div>
                        <div class="single-pro-cart">
                            <a href="" onclick="addToCart({{$product->id}}, 'Product');return false;" title="Add to Cart">
                                <i class="pe-7s-cart"></i>
                                add to cart
                            </a>
                        </div>
                    </div>
                    @if ($product->Category!='')
                    <div class="pro-category-tag ptb-30 for-pro-border">
                        <div class="pro-category">
                            <p>category :</p>
                            <ul>
                                <li><a href="#">{{$product->Category}}</a></li>
                            </ul>
                        </div>
                    @endif
                    </div>
                    <div class="pro-shared">
                        <p>share :</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single product area end -->
<!-- single product area end -->
<div class="single-product-dec-area">
    <div class="container">
        <div class="single-product-dec-tab">
            <ul role="tablist">
                <li class="active">
                    <a href="#description" data-toggle="tab">
                        description
                    </a>
                </li>
                <li>
                    <a href="#reviews" data-toggle="tab">
                        reviews
                    </a>
                </li>
            </ul>
        </div>
        <div class="single-product-dec pb-100">
            <div class="tab-content">
                <div class="tab-pane active" id="description">
                  @if ($product->Description!='')
                    {!! $product->Description !!}
                  @else
                    {{$product->Name}}<br/>
                    {{$product->Category}}
                  @endif
                </div>
                <div class="tab-pane" id="reviews">
                    <div class="customer-reviews-all">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="reviews-form">
                                    <h5>Add a review</h5>
                                    <div class="single-reviews-rating">
                                        <ul>
                                            <li><p>Your Rating: </p></li>
                                            <li>Quality: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                            <li>Price: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                            <li>Value: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input placeholder="Your name" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <input placeholder="Summary of Your Review" type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea id="contact_message" name="message" placeholder="Review"></textarea>
                                                <button class="reviews-btn" type="submit" name="submit">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($product->similarProductCode != '')
        <div class="features-tab pb-100">
            <div class="home-2-tab">
                <ul role="tablist">
                    <li class="active">
                        <a href="#dresses" data-toggle="tab">
                            related product
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="dresses">
                    <div class="row">
                        <div class="product-curosel product-curosel-style owl-carousel">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <a href="#"><img src="assets/img/shop/electronics/1.jpg" alt="" /></a>
                                        <div class="shop-quick-view">
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="price-up-down">
                                            <span class="sale-new">sale</span>
                                        </div>
                                        <div class="button-group">
                                            <a href="#" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                                add to cart
                                            </a>
                                            <a class="wishlist" href="#" title="Wishlist">
                                                <i class="pe-7s-like"></i>
                                                Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shop-text-all">
                                        <div class="title-color fix">
                                            <div class="shop-title f-left">
                                                <h3><a href="#">PC Headphone</a></h3>
                                            </div>
                                            <span class="price f-right">
                                                <span class="new">$120.00</span>
                                            </span>
                                        </div>
                                        <div class="fix">
                                            <span class="f-left">Fashion</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <a href="#"><img src="assets/img/shop/electronics/8.jpg" alt="" /></a>
                                        <div class="shop-quick-view">
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="price-up-down">
                                            <span class="sale-new">sale</span>
                                        </div>
                                        <div class="button-group">
                                            <a href="#" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                                add to cart
                                            </a>
                                            <a class="wishlist" href="#" title="Wishlist">
                                                <i class="pe-7s-like"></i>
                                                Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shop-text-all">
                                        <div class="title-color fix">
                                            <div class="shop-title f-left">
                                                <h3><a href="#">Table Lamp</a></h3>
                                            </div>
                                            <span class="price f-right">
                                                <span class="new">$120.00</span>
                                            </span>
                                        </div>
                                        <div class="fix">
                                            <span class="f-left">Fashion</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <a href="#"><img src="assets/img/shop/electronics/7.jpg" alt="" /></a>
                                        <div class="shop-quick-view">
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="price-up-down">
                                            <span class="sale-new">sale</span>
                                        </div>
                                        <div class="button-group">
                                            <a href="#" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                                add to cart
                                            </a>
                                            <a class="wishlist" href="#" title="Wishlist">
                                                <i class="pe-7s-like"></i>
                                                Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shop-text-all">
                                        <div class="title-color fix">
                                            <div class="shop-title f-left">
                                                <h3><a href="#">Micro woven</a></h3>
                                            </div>
                                            <span class="price f-right">
                                                <span class="new">$120.00</span>
                                            </span>
                                        </div>
                                        <div class="fix">
                                            <span class="f-left">Fashion</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <a href="#"><img src="assets/img/shop/electronics/6.jpg" alt="" /></a>
                                        <div class="shop-quick-view">
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="price-up-down">
                                            <span class="sale-new">sale</span>
                                        </div>
                                        <div class="button-group">
                                            <a href="#" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                                add to cart
                                            </a>
                                            <a class="wishlist" href="#" title="Wishlist">
                                                <i class="pe-7s-like"></i>
                                                Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shop-text-all">
                                        <div class="title-color fix">
                                            <div class="shop-title f-left">
                                                <h3><a href="#">Air conditionar</a></h3>
                                            </div>
                                            <span class="price f-right">
                                                <span class="new">$120.00</span>
                                            </span>
                                        </div>
                                        <div class="fix">
                                            <span class="f-left">Fashion</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <a href="#"><img src="assets/img/shop/electronics/5.jpg" alt="" /></a>
                                        <div class="shop-quick-view">
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="price-up-down">
                                            <span class="sale-new">sale</span>
                                        </div>
                                        <div class="button-group">
                                            <a href="#" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                                add to cart
                                            </a>
                                            <a class="wishlist" href="#" title="Wishlist">
                                                <i class="pe-7s-like"></i>
                                                Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shop-text-all">
                                        <div class="title-color fix">
                                            <div class="shop-title f-left">
                                                <h3><a href="#">Table Fan</a></h3>
                                            </div>
                                            <span class="price f-right">
                                                <span class="new">$120.00</span>
                                            </span>
                                        </div>
                                        <div class="fix">
                                            <span class="f-left">Fashion</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <a href="#"><img src="assets/img/shop/electronics/4.jpg" alt="" /></a>
                                        <div class="shop-quick-view">
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                        <div class="price-up-down">
                                            <span class="sale-new">sale</span>
                                        </div>
                                        <div class="button-group">
                                            <a href="#" title="Add to Cart">
                                                <i class="pe-7s-cart"></i>
                                                add to cart
                                            </a>
                                            <a class="wishlist" href="#" title="Wishlist">
                                                <i class="pe-7s-like"></i>
                                                Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="shop-text-all">
                                        <div class="title-color fix">
                                            <div class="shop-title f-left">
                                                <h3><a href="#">Water heater</a></h3>
                                            </div>
                                            <span class="price f-right">
                                                <span class="new">$120.00</span>
                                            </span>
                                        </div>
                                        <div class="fix">
                                            <span class="f-left">Fashion</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
