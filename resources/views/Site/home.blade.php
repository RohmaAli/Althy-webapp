@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])

@section('content')

<section class="hero-slider-container">
    <div class="hero-slider owl-carousel owl-theme">
        <div class="hero-slider-item hero-slider-item-1">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Medicine Delivery</h1>
                    <p class="title2">All Across Pakistan</p>
                    <a href="{{ route('medicine') }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>

        <div class="hero-slider-item hero-slider-item-3">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Grocery Shopping</h1>
                    <p class="title2">Instant Delivery of Fresh Products</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 'Grocery', 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-20">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Baby Products</h1>
                    <p class="title2">Instant Delivery of Baby Products</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4101, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-21">
            <div class="hero-slider-contents">
                <div class="container">
                  <h1 class="title1">Bakery</h1>
                  <p class="title2">Fresh Bakery Items At Your Doorstep</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 'Bakery', 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-22">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Beverages</h1>
                    <p class="title2">Instant Delivery of Beverages</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4025, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-23">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Cooking Essentials</h1>
                    <p class="title2">Instant Delivery of Cooking Essentials</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4027, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-24">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Dairy Products</h1>
                    <p class="title2">Instant Delivery of Dairy Products</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4061, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-25">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Fresh Food</h1>
                    <p class="title2">Instant Delivery of Fresh Food</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 3980, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-26">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Frozen Food</h1>
                    <p class="title2">Instant Delivery of Frozen Food</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 3989, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-27">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Grocery</h1>
                    <p class="title2">Instant Delivery of Grocery</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4006, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <div class="hero-slider-item hero-slider-item-28">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Health & Beauty Products</h1>
                    <p class="title2">Instant Delivery of Health & Beauty</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4107, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div>
        <!-- <div class="hero-slider-item hero-slider-item-29">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Home Appliances</h1>
                    <p class="title2">Instant Delivery of Home Appliances</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4146, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div> -->
        <!-- <div class="hero-slider-item hero-slider-item-30">
            <div class="hero-slider-contents">
                <div class="container">
                    <h1 class="title1">Mobiles & Tablets</h1>
                    <p class="title2">Instant Delivery of Mobiles & Tablets</p>
                    <a href="{{ route('shop', ['type' => 'Grocery', 'category' => 4144, 'level' => 1]) }}" class="button-hover">Order Now</a>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- slider end -->
<!-- banner style 2 start -->
@if ($agent->isMobile())
<div class="banner-style-2 mt-20 hidden-md hidden-lg higgen-xl">
    <div class="container">
        <div class="row text-center centered">
            <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
              <div class="medicine-box">
                <a href="{{ route('medicine') }}">
                  <div class="text-center centered">
                      <div class="image-box">
                        <img src="categoryImages/Medicine.png" alt="" style="width:50%">
                      </div>
                      <div class="top-box-desc">
                          <h6>Medicine</h6>
                          <sub>Upto 10% Off</sub>
                      </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
              <div class="fruits-box">
                <a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => 'Grocery']) }}">
                  <div class="text-center centered">
                      <div class="image-box">
                        <img src="categoryImages/FreshFood.png" alt="" style="width:50%">
                      </div>
                      <div class="top-box-desc">
                          <h6>Grocery</h6>
                          <sub>Delivered Fresh</sub>
                      </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
              <div class="fruits-box">
                <a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => 'Grocery']) }}">
                  <div class="text-center centered">
                      <div class="image-box">
                        <img src="CategoryImages1/Household.png" alt="" style="width:45%">
                      </div>
                      <div class="top-box-desc">
                          <h6>Household</h6>
                          <sub>Quality Guaranteed</sub>
                      </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
              <div class="labtest-box">
                <a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => 'Bakery']) }}">
                  <div class="text-center centered">
                      <div class="image-box">
                        <img src="categoryImages/Bakery.png" alt="" style="width:50%">
                      </div>
                      <div class="top-box-desc">
                          <h6>Bakery</h6>
                          <sub>Fresh From The Oven</sub>
                      </div>
                  </div>
                </a>
              </div>
            </div>
            <!-- <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
              <div class="electronics-box">
                <a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => 'Electronics']) }}">
                  <div class="text-center centered">
                      <div class="image-box">
                        <img src="categoryImages/Electronics.png" alt="" style="width:50%">
                      </div>
                      <div class="top-box-desc">
                          <h6>Electronics</h6>
                          <sub>Upto 20% off</sub>
                      </div>
                  </div>
                </a>
              </div>
            </div> -->
            <!-- <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
              <div class="apparell-box">
                <a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => 'Fashion']) }}">
                  <div class="text-center centered">
                      <div class="image-box">
                        <img src="categoryImages/WomenFashion.png" alt="" style="width:50%">
                      </div>
                      <div class="top-box-desc">
                          <h6>Apparel</h6>
                          <sub>Upto 40% off</sub>
                      </div>
                  </div>
                </a>
              </div>
            </div> -->
        </div>
    </div>
</div>
@else
<div class="portfolio-area pt-100 pb-70 pl-50 pr-50 hidden-sm hidden-xs" id="shelvesDiv">
    <div class="section-title text-center mb-50">
        <h2>Shelves</h2>
    </div>
    <div class="shop-menu portfolio-left-menu text-center mb-50">
        <button class="active" data-filter=".type2">All </button>
        <button data-filter=".medicine">Medicine</button>
        <button data-filter=".Grocery">Grocery </button>
        <button data-filter=".Bakery">Bakery </button>
        <!-- <button data-filter=".Electronics">Electronics </button> -->
        <button data-filter=".Household">Household </button>
        <!-- <button data-filter=".Fashion">Apparel </button> -->
    </div>
    <div class="row portfolio-style-2">
        <div class="grid">
          <div class="row grid-item type2 mtb-80">
            <div class="col-lg-2 col-md-3" style="
                padding-left: 0px;
                padding-right: 20px;">
              <div class="shelf-image shelf-image-2 text-center main-shelf" data-filter=".medicine">
                <h2>Medicine</h2>
                <p style="margin-top:150px;">Powered By</p>
                <img src="{{URL::asset('BrandLogos/shaheen.png')}}" width="70%" />
              </div>
            </div>
            <div class="col-lg-10 col-md-9">
              <div class="search-input-button">
                  <input id="MedicineShelfSearch" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('Medicine', 'MedicineShelfSearch', 'MedicineShelf');">
              </div>
              <div class="product-curosel2 product-curosel-style owl-carousel" id="MedicineShelf">
                @include('Site.Partials.partialProductLoopCarousel', ['data' => $homeData->MedicineGeneral])
              </div>
            </div>
          </div>
          <div class="row grid-item type2 mb-80">
            <div class="col-lg-2 col-md-3">
              <div class="shelf-image shelf-image-1 text-center main-shelf" data-filter=".grocery">
                <h2>Grocery</h2>
                <p style="margin-top:150px;">Powered By</p>
                <img src="{{URL::asset('BrandLogos/white-logo.png')}}" width="70%" />
              </div>
            </div>
            <div class="col-lg-10 col-md-9">
              <div class="search-input-button">
                  <input id="GroceryShelfSearch" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('Grocery', 'GroceryShelfSearch', 'GroceryShelf');">
              </div>
              <div class="product-curosel2 product-curosel-style owl-carousel"  id="GroceryShelf">
                @include('Site.Partials.partialProductLoopCarousel', ['data' => $homeData->GroceryGeneral])
              </div>
            </div>
          </div>
          <div class="row grid-item type2 mb-80">
            <div class="col-lg-2 col-md-3">
              <div class="shelf-image shelf-image-1 text-center main-shelf" data-filter=".bakery">
                <h2>Bakery</h2>
                <p style="margin-top:150px;">Powered By</p>
                <img src="{{URL::asset('BrandLogos/tehzeeb.png')}}" width="70%" />
              </div>
            </div>
            <div class="col-lg-10 col-md-9">
              <div class="search-input-button">
                  <input id="BakeryShelfSearch" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('Bakery', 'BakeryShelfSearch', 'BakeryShelf');">
              </div>
              <div class="product-curosel2 product-curosel-style owl-carousel"  id="BakeryShelf">
                @include('Site.Partials.partialProductLoopCarousel', ['data' => $homeData->BakeryGeneral])
              </div>
            </div>
          </div>
          <!-- <div class="row grid-item type2 mb-80">
            <div class="col-lg-2 col-md-3">
              <div class="shelf-image shelf-image-1 text-center main-shelf" data-filter=".electronics">
                <h2>Electronics</h2>
                <p style="margin-top:150px;">Powered By</p>
                <img src="{{URL::asset('BrandLogos/white-logo.png')}}" width="70%" />
              </div>
            </div>
            <div class="col-lg-10 col-md-9">
              <div class="search-input-button">
                  <input id="ElectronicsShelfSearch" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('Electronics', 'ElectronicsShelfSearch', 'ElectronicsShelf');">
              </div>
              
            </div>
          </div> -->
          <div class="row grid-item type2 mb-80">
            <div class="col-lg-2 col-md-3">
              <div class="shelf-image shelf-image-3 text-center main-shelf" data-filter=".household">
                <h2>Household</h2>
                <p style="margin-top:150px;">Powered By</p>
                <img src="{{URL::asset('BrandLogos/white-logo.png')}}" width="70%" />
              </div>

            </div>
            <div class="col-lg-10 col-md-9">
              <div class="search-input-button">
                  <input id="HouseholdShelfSearch" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('Household', 'HouseholdShelfSearch', 'HouseholdShelf');">
              </div>
              <div class="product-curosel2 product-curosel-style owl-carousel" id="HouseholdShelf">
                @include('Site.Partials.partialProductLoopCarousel', ['data' => $homeData->HouseholdGeneral])
              </div>
            </div>
          </div>
          <!-- <div class="row grid-item type2 mb-80">
            <div class="col-lg-2 col-md-3">
              <div class="shelf-image shelf-image-4 text-center main-shelf" data-filter=".apparell">
                <h2>Fashion</h2>
                <p style="margin-top:150px;">Powered By</p>
                <img src="{{URL::asset('BrandLogos/white-logo.png')}}" width="70%" />
              </div>

            </div>
            <div class="col-lg-10 col-md-3">
              <div class="search-input-button">
                  <input id="FashionShelfSearch" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('Fashion', 'FashionShelfSearch', 'FashionShelf');">
              </div>
             
            </div>
          </div> -->
          <div class="row grid-item medicine mb-80" style="position: absolute; left: 0%; top: 0px; display: none;">
            <div class="col-md-12">
              <div class="search-input-button3 mtb-40 text-center">
                  <input id="MedicineGeneralSearch" class="text-center" placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchNonShelf('Medicine', 'MedicineGeneralSearch', 'MedicineNonShelf');">
              </div>
              <div id="MedicineNonShelf" class="col-md-12">
                @include('Site.Partials.partialProductLoop', ['data' => $homeData->Medicine])
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endif





<!-- banner style 2 end -->
<div class="portfolio-area pt-70 pb-70 pl-50 pr-50">
  <div class="section-title text-center mb-50">
      <h2>Featured Products</h2>
  </div>
  <div class="row portfolio-style-2">
    <div class="features-tab">
        <div class="tab-content">
            <div class="tab-pane active" id="dresses">
                <div class="row">
                    <div class="product-curosel product-curosel-style owl-carousel">
                      @include('Site.Partials.partialProductLoopCarousel', ['data' => $featuredProducts])

                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


<div class="portfolio-area pt-70 pb-70 pl-50 pr-50">
        <div class="section-title text-center mb-50">
            <h2>Exclusive Discounts</h2>
        </div>
        <div class="row portfolio-style-2">
          <div class="features-tab">
            <div class="home-2-tab">
                <ul role="tablist">
                    <li>
                      <div class="timer2">
                          <div data-countdown2="2020/07/20"></div>
                      </div>
                    </li>
                </ul>
            </div>
              <div class="tab-content">
                  <div class="tab-pane active" id="dresses">
                      <div class="row">
                          <div class="product-curosel product-curosel-style owl-carousel">
                            @include('Site.Partials.partialProductLoopCarousel', ['data' => $onSaleProducts])
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
</div>


@endsection

@section('customJS')
@if (!$agent->isMobile())
  <script>
  $(document).ready(function(){
    $.get("{{route('getShelf', 'Grocery')}}", function(data, status){
      $('.grid').append(data);
      $('.product-curosel2').owlCarousel({
          loop: true,
          nav: false,
          items: 4,
          navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
          responsive: {
              0: {
                  items: 1
              },
              768: {
                  items: 2
              },
              1000: {
                  items: 6
              }
          }
      });
    });
    // $.get("{{route('getShelf', 'Electronics')}}", function(data, status){
    //   $('.grid').append(data);
    //   $('.product-curosel2').owlCarousel({
    //       loop: true,
    //       nav: false,
    //       items: 4,
    //       navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    //       responsive: {
    //           0: {
    //               items: 1
    //           },
    //           768: {
    //               items: 2
    //           },
    //           1000: {
    //               items: 6
    //           }
    //       }
    //   });
    // });
    $.get("{{route('getShelf', 'Household')}}", function(data, status){
      $('.grid').append(data);
      $('.product-curosel2').owlCarousel({
          loop: true,
          nav: false,
          items: 4,
          navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
          responsive: {
              0: {
                  items: 1
              },
              768: {
                  items: 2
              },
              1000: {
                  items: 6
              }
          }
      });
    });
    $.get("{{route('getShelf', 'Bakery')}}", function(data, status){
      $('.grid').append(data);
      $('.product-curosel2').owlCarousel({
          loop: true,
          nav: false,
          items: 4,
          navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
          responsive: {
              0: {
                  items: 1
              },
              768: {
                  items: 2
              },
              1000: {
                  items: 6
              }
          }
      });
    });
    // $.get("{{route('getShelf', 'Fashion')}}", function(data, status){
    //   $('.grid').append(data);
    //   $('.product-curosel2').owlCarousel({
    //       loop: true,
    //       nav: false,
    //       items: 4,
    //       navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    //       responsive: {
    //           0: {
    //               items: 1
    //           },
    //           768: {
    //               items: 2
    //           },
    //           1000: {
    //               items: 6
    //           }
    //       }
    //   });
    // });
    $('.shop-menu button').on('click', function(){
      var filter = $(this).data("filter");
      console.log(filter);
      $('.grid-item').hide();
      $(filter).show();
    });
  });

  </script>
@endif
@endsection
