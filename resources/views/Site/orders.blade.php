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
                <li>Order History</li>
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
              <div class="table-content
                  table-responsive">
                  <table>
                      <thead>
                          <tr>
                              <th class="product-price">image</th>
                              <th class="product-name">Product</th>
                              <th class="product-name">Status</th>
                              <th class="product-price">Price</th>
                              <th class="product-name">Re-order</th>
                              <th class="product-name">Return</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                          @foreach ($order->Details as $od)
                            @if ($od->ServiceID!=0)
                              <tr>
                                <td class="product-thumbnail">
                                  <a href="#">
                                    <img src="{{URL::asset('ProductImages/labtest.png')}}" alt="" style="width:100px;">
                                  </a>
                                </td>
                                <td>
                                  {{$od->Service->Name}} x <b>{{$od->Quantity}}</b></td>
                                <td>
                                  {{$order->OrderStatus}}</td>
                                <td>
                                  <span class="amount">Rs. {{number_format($od->Service->SalePrice)}}</span>
                                </td>
                                <td class="product-remove">
                                  <a href='' title="Add to Cart" class="text-center" onclick="addToCart({{$od->Service->id}}, 'Service');return false;"><i class="fa fa-cart-arrow-down"></i></a>
                                </td>
                              </tr>
                            @elseif ($od->ProductID!=0)
                            <tr>
                              <td class="product-thumbnail">
                                <a href="#">
                                  <img src="https://althy.pk/ProductImages/{{$od->Product->Image}}" alt="" style="width:100px;">
                                </a>
                              </td>
                              <td>
                                {{$od->Product->Name}} x <b>{{$od->Quantity}}</b></td>
                              <td>
                                <a href="#">{{$order->OrderStatus}}</a></td>
                              <td>
                                <span class="amount">Rs. {{number_format($od->Product->SalePrice)}}</span>
                              </td>
                              <td class="product-remove">
                                <a href='' title="Add to Cart" class="text-center" onclick="addToCart({{$od->Product->id}}, 'Product');return false;"><i class="fa fa-cart-arrow-down"></i></a>
                              </td>
                              <td class="product-remove">
                                <a href='' title="Return" class="text-center" onclick="addToCartRemove({{$od->Product->id}}, 'Product');return false;"><i class="fa fa-times" aria-hidden="true"></i></a>
                              </td>
                            </tr>
                            @endif
                          @endforeach
                        @endforeach
                      </tbody>
                  </table>
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
