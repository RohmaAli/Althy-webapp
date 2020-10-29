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
            <div class="col-lg-12 col-md-12 col-sm-12
                col-xs-12">
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
                                @if ($cartItem->ServiceID!=0)
                                  <tr>
                                    <td class="product-thumbnail">
                                      <a href="#">
                                        <img src="{{URL::asset('ProductImages/labtest.png')}}" alt="">
                                      </a>
                                    </td>
                                    <td class="product-name">
                                      <a href="#">{{$cartItem->Service->Name}}</a></td>
                                    <td class="product-name">
                                      <a href="#">{{$cartItem->Type}}</a></td>
                                    <td class="product-price">
                                      <span class="amount">Rs. {{number_format($cartItem->Service->SalePrice)}}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <input value="{{$cartItem->Quantity}}" type="number">
                                    </td>
                                    <td class="product-subtotal">Rs. {{number_format($cartItem->Quantity * $cartItem->Service->SalePrice)}}</td>
                                    <?php
                                      $subtotal += $cartItem->Quantity * $cartItem->Service->SalePrice;
                                      $total += $cartItem->Quantity * $cartItem->Service->SalePrice;
                                    ?>
                                    <td class="product-remove">
                                      <a href="{{route('removeFromCart', ['id' => $cartItem->ServiceID, 'type' => 'Service', 'cartID' => $cartID])}}"><i class="fa fa-times"></i></a>
                                    </td>
                                  </tr>
                                @elseif ($cartItem->ProductID!=0)
                                <tr>
                                  <td class="product-thumbnail">
                                    <a href="#">
                                      <img src="https://althy.pk/ProductImages/{{$cartItem->Product->Image}}" alt="">
                                    </a>
                                  </td>
                                  <td class="product-name">
                                    <a href="#">{{$cartItem->Product->Name}}</a></td>
                                  <td class="product-name">
                                    <a href="#">{{$cartItem->Type}}</a></td>
                                  <td class="product-price">
                                    <span class="amount">Rs. {{number_format($cartItem->Product->SalePrice)}}</span>
                                  </td>
                                  <td class="product-quantity">
                                      <input value="{{$cartItem->Quantity}}" type="number">
                                  </td>
                                  <td class="product-subtotal">Rs. {{number_format($cartItem->Quantity * $cartItem->Product->SalePrice)}}</td>
                                  <?php
                                    $subtotal += $cartItem->Quantity * $cartItem->Product->SalePrice;
                                    $total += $cartItem->Quantity * $cartItem->Product->SalePrice;
                                  ?>
                                  <td class="product-remove">
                                    <a href="{{route('removeFromCart', ['id' => $cartItem->ServiceID, 'type' => 'Service', 'cartID' => $cartID])}}"><i class="fa fa-times"></i></a>
                                  </td>
                                </tr>
                                @endif

                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
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
