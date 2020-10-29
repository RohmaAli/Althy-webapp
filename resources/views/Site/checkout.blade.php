@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
   <div class="container">
      <div class="breadcrumbs text-center">
         <h2 class="breadcrumb-title">checkout</h2>
         <ul>
            <li>
               <a class="active" href="{{ route('home') }}">Home</a>
            </li>
            <li>checkout</li>
         </ul>
      </div>
   </div>
</div>
<!-- breadcrumbs area end -->
<!-- checkout area start -->
<div class="checkout-area ptb-100">
   <div class="container">
      <div class="row">
         <div class="col-md-7">
            <div class="returning-customer">
               <h3><i class="fa fa-user"></i> Returning customer? <span id="customer">Click here to login</span></h3>
               <div id="customer-login" class="coupon-content">
                  <div class="coupon-info">
                     <p class="coupon-text">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                     <form action="{{route('customerLoginPost')}}" method="post">
                         <input placeholder="Email / Phone" name="Username" type="text">
                         <input placeholder="Password" name="Password" type="password" style="margin-top:10px;">
                         <div class="button-remember">
                             <button class="login-btn" type="submit">Login</button>
                         </div>
                         <div class="new-account">
                             <p>new here ? <a href="{{ route('customerRegister') }}">Create an new account</a></p>
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
            <div class="billing-details-area">
               <h2>Billing details</h2>
               <form action="{{route('postCheckout')}}" method="post">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="billing-input">
                           <label>
                           Name
                           <span class="required">*</span>
                           </label>
                           <input placeholder="Name" name="Name" type="text" required>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="billing-input">
                           <label>
                           Address
                           <span class="required">*</span>
                           </label>
                           <input placeholder="Street address" type="text" name="Address1" required>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="billing-input">
                           <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="Address2">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="billing-input">
                           <label>
                           Town / City
                           <span class="required">*</span>
                           </label>
                           <input type="text" name="City" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="billing-input">
                           <label>
                           Phone
                           <span class="required">*</span>
                           </label>
                           <input type="tel" name="Phone" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="billing-input">
                           <label>
                           Email Address
                           <span class="required">*</span>
                           </label>
                           <input type="email" name="Email" required>
                        </div>
                     </div>
                     @if ($hasConsumer == false)
                     <div class="col-md-6">
                        <div class="billing-input">
                           <label>
                           Password
                           <span class="required">*</span>
                           </label>
                           <input type="password" name="Password" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="billing-input">
                           <label>
                           Confirm Password
                           <span class="required">*</span>
                           </label>
                           <input type="password" name="ConfirmPassword" required>
                        </div>
                     </div>
                     @endif
                     <div class="col-md-12">
                        <div class="billing-input">
                           <label>
                           Order Notes
                           <span class="required">*</span>
                           </label>
                           <textarea id="checkout-mess" name='Notes' placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                     </div>
                     <div class="col-md-4">
                       <div class="order-button-payment">
                          <input type="submit" value="Place order" />
                       </div>
                    </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-md-5">
            <div class="customer-coupon">
               <h3>Have a coupon? <span id="coupon">Click here to enter your code</span></h3>
               <div id="have-coupon" class="coupon-checkout-content">
                  <div class="coupon-info">
                     <form action="#">
                        <p class="checkout-coupon">
                           <label>
                           Coupon code
                           <span class="required">*</span>
                           </label>
                           <input type="text">
                           <input class="coupon-submit" type="submit" value="Apply Coupon">
                        </p>
                     </form>
                  </div>
               </div>
            </div>
            <div class="your-order-payment">
               <div class="your-order">
                  <h2>Your Order</h2>
                  <ul>
                    <?php
                    $subtotal = 0;
                    $total = 0;
                    $shipping = 0;
                    ?>
                    @foreach ($cartDetails as $cartItem)
                      @if ($cartItem->ServiceID!=0)
                        <li>{{$cartItem->Service->Name}} x {{$cartItem->Quantity}}<span>Rs. {{number_format($cartItem->Quantity * $cartItem->Service->SalePrice)}}</span></li>
                        <?php
                          $subtotal += $cartItem->Quantity * $cartItem->Service->SalePrice;
                          $total += $cartItem->Quantity * $cartItem->Service->SalePrice;
                        ?>
                      @elseif ($cartItem->ProductID!=0)
                        <li>{{$cartItem->Product->Name}} x {{$cartItem->Quantity}}<span>Rs. {{number_format($cartItem->Quantity * $cartItem->Product->SalePrice)}}</span></li>
                        <?php
                          $subtotal += $cartItem->Quantity * $cartItem->Product->SalePrice;
                          $total += $cartItem->Quantity * $cartItem->Product->SalePrice;
                        ?>
                      @endif
                    @endforeach
                    <li class="order-total">Subtotal <span>Rs. {{number_format($subtotal)}}</span></li>
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
                    <li class="order-total">Delivery <span>Rs. {{number_format($shipping)}}</span></li>
                     <li class="order-total">Order Total <span>Rs. {{number_format($total)}}</span></li>
                  </ul>
               </div>
               <div class="your-payment">
                  <h2>payment method</h2>
                    <div class="payment-method">
                       <div class="payment-accordion">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                             <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                   <h4 class="panel-title">
                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Cash On Delivery
                                      </a>
                                   </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                   <div class="panel-body">
                                      <p>Make your payment directly to Althy Delivery Partner.</p>
                                   </div>
                                </div>
                             </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- checkout area end -->
@endsection
