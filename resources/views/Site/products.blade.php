@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Medicine</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Medicine</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-40">
              <div class="single-sidebar">
                   <form action="{{route('medicineSearch')}}" method="get">
                      @csrf
                       <div class="search-input-button">
                           <input class="" placeholder="Search" type="text" name="Search" type="search" required minlength="3">
                           <button class="search-button2" type="submit">
                               <i class="pe-7s-search"></i>
                           </button>
                       </div>
                   </form>
               </div>
            </div>
            <div class="col-md-12">
                <div class="blog-wrapper shop-page-mrg">
                    <div class="tab-menu-product">
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active hidden-xs hidden-sm visible-md-* visible-lg-* visible-xl-*" id="grid">
                                    <div class="row">
                                      @foreach ($data as $prod)
                                        <div class="col-md-4 col-lg-3 col-sm-12">
                                          <div class="single-shop mb-40">
                                              <div class="shop-img text-center centered">
                                                  <a><img src="https://althy.pk/ProductImages/{{$prod->Image}}" alt="" /></a>
                                                  <div class="shop-quick-view">
                                                      <a href="{{route('productDetails', $prod->id)}}" title="{{$prod->Name}}">
                                                          <i class="pe-7s-look"></i>
                                                      </a>
                                                  </div>
                                                  @if ($prod->onSale==1)
                                                    <div class="price-up-down">
                                                        <span class="sale-new">sale</span>
                                                    </div>
                                                  @endif
                                                  <div class="button-group">
                                                      <a href='' title="Add to Cart" class="text-center" onclick="addToCart({{$prod->id}}, 'Product');return false;">
                                                          <i class="pe-7s-cart"></i>
                                                          add to cart
                                                      </a>
                                                  </div>
                                              </div>
                                              <div class="shop-text-all">
                                                  <div class="title-color fix">
                                                      <div class="shop-title">
                                                          <h3><a href="#">{{$prod->Name}}</a></h3>
                                                      </div>
                                                  </div>
                                                  <div class="fix">
                                                      <span class="f-left">{{$prod->Category}}</span>
                                                      <span class="price f-right">
                                                        @if ($prod->onSale==1)
                                                          <span class="old">Rs. {{number_format($prod->ActualPrice, 0)}}</span>
                                                        @endif
                                                          <span class="new">Rs. {{number_format($prod->SalePrice, 0)}}</span>
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane mb-10 active hidden-md hidden-lg hidden-xl visible-xs-* visible-sm-*" id="list">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row ">
                                              @foreach ($data as $prod)
                                              <div class="single-shop mb-40">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="text-center">
                                                          <div class="shop-img text-center centered">
                                                              <a><img src="https://althy.pk/ProductImages/{{$prod->Image}}" alt="" /></a>
                                                              @if ($prod->onSale==1)
                                                                <div class="price-up-down">
                                                                    <span class="sale-new">sale</span>
                                                                </div>
                                                              @endif
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                      <div class="shop-list-right">
                                                          <div class="shop-list-all">
                                                              <div class="shop-list-name text-center">
                                                                  <h3><a>{{$prod->Name}}</a></h3>
                                                              </div>
                                                              <div class="shop-list-price">
                                                                  <span class="list-price text-center">
                                                                    @if ($prod->onSale==1)
                                                                      <span class="old text-center">Rs. {{number_format($prod->ActualPrice, 0)}}</span>
                                                                    @endif
                                                                      <span class="new text-center">Rs. {{number_format($prod->SalePrice, 0)}}</span>
                                                                  </span>
                                                              </div>
                                                              <div class="shop-list-cart">
                                                                  <div class="shop-group text-center">
                                                                      <a href='' title="Add to Cart" class="text-center" onclick="addToCart({{$prod->id}}, 'Product');return false;">
                                                                          <i class="pe-7s-cart"></i>
                                                                      add to cart
                                                                      </a>
                                                                      <a  href="{{route('productDetails', $prod->id)}}" title="{{$prod->Name}}" class="text-center">
                                                                          <i class="pe-7s-look"></i>
                                                                      View Details
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
                                <div class="page-pagination text-center">
                                    {{$data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
