@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')

<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">shopping cart</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>cart</li>
            </ul>
        </div>
    </div>
</div>
<?php
$subtotal = 0;
$total = 0;
$shipping = 0;
?>
<!-- breadcrumbs area end -->
<!-- shopping-cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                <form action="#">
                    <div class="table-content
                        table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-price">image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-name">Type</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-name">remove</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($cartDetails as $cartItem)
                                <tr>
                                  <td class="product-thumbnail">
                                    <a href="{{route('productDetails', $cartItem->Product->id)}}">
                                      <img src="https://althy.pk/ProductImages/{{$cartItem->Product->Image}}" alt="" style="width:150px;">
                                    </a>
                                  </td>
                                  <td class="product-name">
                                    <a href="{{route('productDetails', $cartItem->Product->id)}}">{{$cartItem->Product->Name}}</a></td>
                                  <td class="product-name">
                                    <a href="{{route('productDetails', $cartItem->Product->id)}}">{{$cartItem->Type}}</a></td>
                                  <td class="product-price">
                                    <span class="amount">Rs. {{number_format($cartItem->Product->SalePrice)}}</span>
                                  </td>
                                  <td class="product-price">
                                      <span class="amount">{{$cartItem->Quantity}}</span>
                                  </td>
                                  <td class="product-subtotal">Rs. {{number_format($cartItem->Quantity * $cartItem->Product->SalePrice)}}</td>
                                  <?php
                                    $subtotal += $cartItem->Quantity * $cartItem->Product->SalePrice;
                                    $total += $cartItem->Quantity * $cartItem->Product->SalePrice;
                                  ?>
                                  <td class="product-remove">
                                    <a href="{{route('removeFromCart', ['id' => $cartItem->ProductID, 'type' => 'Product', 'cartID' => $cartID])}}"><i class="fa fa-times"></i></a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            @foreach ($cartDetails as $cartItem)
            <div class="col-sm-12 col-xs-12 hidden-md hidden-lg hidden-xl productMobile pt-20">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <a><img src="https://althy.pk/ProductImages/{{$cartItem->Product->Image}}" alt="" style="width:100%;" /></a>
              </div>
              <div class="col-md-7 col-sm-7 col-xs-7">
                <b><a href="{{route('productDetails', $cartItem->Product->id)}}" style="color:black;">{{$cartItem->Product->Name}}</a></b>
                <p class="price no-padding no-margin">
                    <span class="new dark-grey">Price: Rs. {{number_format($cartItem->Product->SalePrice, 0)}}</span>
                </p>
                <p class="price no-padding no-margin">
                    <span class="new dark-grey">Qty: {{number_format($cartItem->Quantity, 0)}}</span>
                </p>
                <p class="price no-padding no-margin">
                    <span class="new dark-grey">Total: Rs. {{number_format($cartItem->Quantity * $cartItem->Product->SalePrice)}}</span>
                </p>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2">
                <a href="{{route('removeFromCart', ['id' => $cartItem->ProductID, 'type' => 'Product', 'cartID' => $cartID])}}"><i class="fa fa-times"></i></a>
              </div>
            </div>
            @endforeach


        </div>
        <div class="row tax-coupon-div">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="cart-total">
                    <ul>
                        <li>Subtotal<span>Rs. {{number_format($subtotal)}}</span></li>
                        <?php
                          if ($subtotal < 1000)
                          {
                            $shipping = 100;
                          }
                          if ($subtotal >= 1000 && $subtotal <= 10000)
                          {
                            $shipping = 200;
                          }
                          if ($subtotal > 10000)
                          {
                            $shipping = 0;
                          }
                          if ($subtotal <= 0)
                          {
                            $shipping = 0;
                          }
                          $total += $shipping;
                         ?>
                        <li>Delivery<span>Rs. {{number_format($shipping)}}</span></li>
                        <li class="cart-black">Total<span>Rs. {{number_format($total)}}</span></li>
                    </ul>
                    <div class="cart-total-btn">
                        <div class="cart-total-btn1 f-left">
                            <a href="{{route('checkout')}}">Proceed to
                                checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
