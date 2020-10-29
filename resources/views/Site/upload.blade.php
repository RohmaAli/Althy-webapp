@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
   <div class="container">
      <div class="breadcrumbs text-center">
         <h2 class="breadcrumb-title">Upload</h2>
         <ul>
            <li>
               <a class="active" href="{{ route('home') }}">Home</a>
            </li>
            <li>Upload</li>
         </ul>
      </div>
   </div>
</div>
<!-- breadcrumbs area end -->
<!-- checkout area start -->
<div class="checkout-area ptb-100">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
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
               <form action="{{route('uploadPost')}}" method="post" enctype="multipart/form-data">
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
                     <div class="col-md-12">
                       <label>
                       Choose Medicine Transcript / Grocery List<span class="required">*</span>
                       </label>
                       <input type="file" name="File" required style="background: none; border:none;padding-left:0px;">
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
        </div>
     </div>
  </div>
</div>
<!-- checkout area end -->
@endsection
