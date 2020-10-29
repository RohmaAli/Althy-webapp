<!doctype html>
 <html class="no-js" lang="en">
 <head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Althy - The Best Of Islamabad At Your Doorstep</title>
     <meta name="description" content="Althy is now delivering the best of your city to your doorstep. From medicine to grocery, Althy brings fresh products to your home. Everything is now just a tap away!">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Favicon -->
     <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

     <!-- all css here -->
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/magnific-popup.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/pe-icon-7-stroke.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/lib/css/nivo-slider.css')}}" type="text/css" />
     <link rel="stylesheet" type="text/css" href="{{URL::asset('Site/assets/css/jquery.zeynep.min.css')}}" />
     <link rel="stylesheet" href="{{URL::asset('Site/lib/css/preview.css')}}" type="text/css" media="screen" />
     <link rel="stylesheet" href="{{URL::asset('Site/lib/icofont/icofont.css')}}" type="text/css" media="screen" />
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/animate.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/meanmenu.min.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/bundle.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/style.css')}}">
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/responsive.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('Site/assets/css/demo.css')}}" />
     <link rel="stylesheet" type="text/css" href="{{URL::asset('Site/assets/css/menu_elastic.css')}}" />
     <script src="{{URL::asset('Site/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
     <link rel="stylesheet" href="{{URL::asset('Site/assets/css/owl.carousel.min.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('Site/assets/css/jquery-picZoomer.css')}}" />

 </head>
 <body>
     <div class="canvas-wrapper">
       <div class="zeynep">
         <div class="logo centered text-center">
             <a href="{{ route('home') }}" class="text-center">
                 <img src="{{URL::asset('Site/assets/logo.png')}}" width="200px" alt="">
             </a>
         </div>
         @if ($hasConsumer == false)
          <h5 class="text-center" style="color:black;">Hello, <a style="display: inline;padding-left: 0px;" href="{{route('customerLogin')}}">Sign In</a></h5>
         @else
          <h5 class="text-center" style="color:black;">Hello, {{$consumer->Name}}</h5>
         @endif

           <ul>
              <li>
                 <a href="{{ route('home') }}">Home</a>
              </li>
              @if ($hasConsumer == false)
              <li>
                 <a href="{{ route('customerRegister') }}">Login / Register</a>
              </li>
              @else
              <li>
                 <a href="{{ route('orders') }}">Account</a>
              </li>
              @endif
              <li>
                 <a href="{{ route('upload') }}">Upload List</a>
              </li>
              <li>
                 <a href="{{ route('medicine') }}">Medicine</a>
              </li>


              @foreach ($menuCategories as $cat1)
                @if (count($cat1->Children) == 0)
                <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $cat1->Type2]) }}">{{$cat1->Type2}}</a></li>
                @else
                  <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat1->Type2)}}1">{{$cat1->Type2}}</a>
                    <div id="{{str_replace(' ', '', $cat1->Type2)}}1" class="submenu">
                       <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat1->Type2)}}1">
                          <a href="#">Main Menu</a>
                       </div>
                       <label>{{$cat1->Type2}}</label>
                       <ul>
                         <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $cat1->Type2]) }}">All {{$cat1->Type2}}</a></li>
                         @foreach ($cat1->Children as $cat2)
                          @if (count($cat2->Children)==0)
                          <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $cat2->id]) }}">{{$cat2->Title}}</a></li>
                          @else
                          <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat2->Title)}}2">{{$cat2->Title}}</a>
                            <div id="{{str_replace(' ', '', $cat2->Title)}}2" class="submenu">
                               <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat2->Title)}}2">
                                  <a href="#">{{$cat1->Type2}}</a>
                               </div>
                               <label>{{$cat2->Title}}</label>
                               <ul>
                                 <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $cat2->id]) }}">All {{$cat2->Title}}</a></li>
                                 @foreach ($cat2->Children as $cat3)
                                   @if (count($cat3->Children)==0)
                                   <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 2, 'category' => $cat3->id]) }}">{{$cat3->Title}}</a></li>
                                   @else
                                   <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat3->Title)}}3">{{$cat3->Title}}</a>
                                     <div id="{{str_replace(' ', '', $cat3->Title)}}3" class="submenu">
                                        <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat3->Title)}}3">
                                           <a href="#">{{$cat2->Title}}</a>
                                        </div>
                                        <label>{{$cat3->Title}}</label>
                                        <ul>
                                          <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 2, 'category' => $cat3->id]) }}">All {{$cat3->Title}}</a></li>
                                          @foreach ($cat3->Children as $cat4)
                                            @if (count($cat4->Children)==0)
                                            <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 3, 'category' => $cat4->id]) }}">{{$cat4->Title}}</a></li>
                                            @else
                                            <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat4->Title)}}4">{{$cat3->Title}}</a>
                                              <div id="{{str_replace(' ', '', $cat4->Title)}}4" class="submenu">
                                                 <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat4->Title)}}4">
                                                    <a href="#">{{$cat3->Title}}</a>
                                                 </div>
                                                 <label>{{$cat4->Title}}</label>
                                                 <ul>
                                                   <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 3, 'category' => $cat4->id]) }}">All {{$cat4->Title}}</a></li>
                                                   @foreach ($cat4->Children as $cat5)
                                                     <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 4, 'category' => $cat5->id]) }}">{{$cat5->Title}}</a></li>
                                                   @endforeach
                                                 </ul>
                                              </div>
                                            </li>
                                            @endif
                                          @endforeach
                                        </ul>
                                     </div>
                                   </li>
                                    @endif
                                 @endforeach
                               </ul>
                            </div>
                          </li>
                           @endif
                         @endforeach
                       </ul>
                    </div>
                   </li>
                @endif
              @endforeach
           </ul>
         </div>
         <div class="content-wrap">
             <div class="content">
                 <!-- header start -->
                 <header class="header-area home-style-2">
                     <div class="header-bottom">
                         <div class="row">
                             <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="cart-menu">
                                <div class="col-md-3 col-sm-8 col-xs-8">
                                  <div class="f-left pr-20">
                                    <div class="user user-style-3 f-left">
                                        <a href="#" id="open-button">
                                            <i class="pe-7s-menu"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="logo f-left">
                                      <a href="{{ route('home') }}">
                                          <img src="{{URL::asset('Site/images/logo-white.png')}}" alt="">
                                      </a>
                                  </div>
                                </div>
                                <div class="col-md-9 hidden-sm hidden-xs no-padding">
                                  <div class="col-md-9 col-sm-12 col-xs-12 hidden-sm hidden-xs no-padding">
                                    <div class="main-menu f-left">
                                      <form action="{{route('globalSearch')}}" method="get">
                                        @csrf
                                          <div class="search-input-button2">
                                            <select name="Category" class="top-category-select">
                                              <option value="All">All</option>
                                              <option value="Medicine">Medicine</option>
                                              @foreach ($menuCategories as $cat1)
                                                     <option value="{{$cat1->Type2}}">{{$cat1->Type2}}</option>
                                              @endforeach
                                            </select>
                                            <input class="" placeholder="Search Anything" type="search" name="Search" />
                                            <button class="search-button2" type="submit">
                                                <i class="pe-7s-search"></i>
                                            </button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                  <div class="col-md-3 col-sm-12 col-xs-12 pull-right hidden-sm hiden-xs">
                                    <div class="shopping-cart f-right" style="padding-right:10px;padding-left:10px;">
                                        <a class="top-cart" href="{{ route('cart') }}"><i class="pe-7s-cart"></i></a>
                                        <span class='cartCount'></span>
                                    </div>
                                    @if ($hasConsumer == true)
                                      <div class="user user-style-3 f-right">
                                          <a href="{{route('profile')}}" id="open-button">
                                              <i class="pe-7s-user"></i>
                                          </a>
                                      </div>
                                    @else
                                      <div class="user user-style-3 f-right">
                                          <a href="{{route('customerRegister')}}" id="open-button">
                                              <i class="pe-7s-user"></i>
                                          </a>
                                      </div>
                                    @endif
                                  </div>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right hidden-md hidden-lg hidden-xl no-padding">
                                  <div class="shopping-cart f-right" style="padding-right:10px;padding-left:10px;">
                                      <a class="top-cart" href="{{ route('cart') }}"><i class="pe-7s-cart"></i></a>
                                      <span class='cartCount'></span>
                                  </div>
                                  @if ($hasConsumer == false)
                                    <div class="user user-style-3 f-right">
                                        <a href="{{route('profile')}}" id="open-button">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                    </div>
                                  @else
                                    <div class="user user-style-3 f-right">
                                        <a href="{{route('customerRegister')}}" id="open-button">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                    </div>
                                  @endif
                                </div>
                                <div class="col-sm-12 col-xs-12 hidden-md hidden-lg hidden-xl no-padding">
                                  <div class="main-menu f-left" style="width:100%">
                                    <form action="{{route('globalSearch')}}" method="get">
                                      @csrf
                                        <div class="search-input-button2">
                                          <select name="Category" class="top-category-select">
                                            <option value="All">All</option>
                                            <option value="Medicine">Medicine</option>
                                            @foreach ($menuCategories as $cat1)
                                                   <option value="{{$cat1->Type2}}">{{$cat1->Type2}}</option>
                                            @endforeach
                                          </select>
                                          <input class="" placeholder="Search Anything" type="search" name="Search" style="width:63%" />
                                          <button class="search-button2" type="submit">
                                              <i class="pe-7s-search"></i>
                                          </button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                               </div>
                             </div>
                         </div>
                     </div>
                     <div class="header-bottom header-lower hidden-xs hidden-sm">
                         <div class="row">
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <div class="cart-menu">
                                 <div class="col-md-3">
                                   <div class="shopping-cart f-left">
                                       <a class="top-cart" style="width:150px"><i class="pe-7s-map-marker" style="float:left;"></i><span style="float:left;font-size:13px;line-height:16px;padding-top:3px;padding-left:5px;">Deliver To<br/><b>{{GeoIP::getLocation()->city}}</b></span></a>
                                   </div>
                                 </div>
                                 <div class="col-md-8 text-center">
                                   <div class="main-menu2 text-center">
                                       <nav class="text-center">
                                           <ul class="text-center">
                                             @if ($hasConsumer == true)
                                               <li><a href="{{route('orders')}}" style="padding-left:0px;">Returns & Refunds</a></li>
                                               <li><a href="{{route('orders')}}">Order Again</a></li>
                                             @else
                                               <li><a href="{{route('customerRegister')}}" style="padding-left:0px;">Returns & Refunds</a></li>
                                               <li><a href="{{route('customerRegister')}}">Order Again</a></li>
                                             @endif

                                               <li><a href="{{route('express')}}">Express</a></li>
                                               <li><a href="{{route('althyapp')}}">App</a></li>
                                               <li><a href="{{route('covid')}}">Covid-19</a></li>
                                               <li><a href="{{route('upload')}}">Upload</a></li>
                                           </ul>
                                       </nav>
                                   </div>
                                 </div>
                               </div>
                             </div>
                         </div>
                     </div>
                 </header>
                 <!-- header end -->
                 @yield('content')
                 <!-- footer area start -->
                 <footer class="footer-area" style="padding-left:50px;padding-right:50px;">
                       <div class="footer-top pt-60 pb-30">
                           <div class="row">
                               <div class="col-md-3 col-sm-12">
                                   <div class="footer-widget mb-30">
                                       <div class="footer-logo">
                                           <a href="{{route('home')}}">
                                               <img src="{{URL::asset('Site/assets/logo.png')}}" style="width:200px" alt="">
                                           </a>
                                       </div>
                                       <div class="widget-info">
                                           <p>
                                               <i class="pe-7s-map-marker"> </i>
                                               <span>
                                                   Islamabad, Pakistan
                                               </span>
                                           </p>
                                           <p>
                                               <i class="pe-7s-mail"></i>
                                               <span>
                                                   <a href="mailto:hello@althy.pk">hello@althy.pk</a>
                                               </span>
                                           </p>
                                           <p>
                                               <i class="pe-7s-call"></i>
                                               <span><a href="tel:+923481112911">+92-348-1112911 </a></span>
                                           </p>
                                       </div>
                                       <div class="footer-social">
                                           <ul>
                                               <li><a href="https://www.facebook.com/AlthyPk/"><i class="fa fa-facebook"></i></a></li>
                                               <li><a href="https://twitter.com/AlthyPk"><i class="fa fa-twitter"></i></a></li>
                                               <li><a href="https://www.instagram.com/althystayhealthy/"><i class="fa fa-instagram"></i></a></li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 hidden-sm">
                                 <div class="footer-widget mb-30">
                                   <div class="footer-title">
                                       <h3>Download Our App</h3>
                                   </div>
                                     <div class="footer-logo">
                                         <a>
                                             <img src="{{URL::asset('QRCode.png')}}" alt="">
                                         </a><br/>
                                         <a href='https://play.google.com/store/apps/details?id=com.althy.org&hl=en'><img src="{{URL::asset('playstore.png')}}" style="margin-top:10px;"  width="150px"/></a>
                                         <br/>
                                         <a href='https://apps.apple.com/pk/app/althy/id1504725029'><img src="{{URL::asset('appstore.png')}}" style="margin-top:10px;"  width="150px"/></a>
                                     </div>
                                 </div>
                               </div>
                               <div class="col-md-3 col-sm-3">
                                   <div class="footer-widget mb-30">
                                       <div class="footer-title">
                                           <h3>Quick Links</h3>
                                       </div>
                                       <div class="widget-text">
                                           <ul>
                                               <li><a href="{{route('customerLogin')}}">Login </a></li>
                                               <li><a href="{{route('customerRegister')}}">Register </a></li>
                                               <li><a href="{{route('cart')}}">My Cart</a></li>
                                               <li><a href="{{route('checkout')}}">Checkout </a></li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 col-sm-3">
                                   <div class="footer-widget mb-30">
                                       <div class="footer-title">
                                           <h3>Company</h3>
                                       </div>
                                       <div class="widget-text">
                                           <ul>
                                               <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                               <li><a href="{{route('terms')}}">Privacy Policy </a></li>
                                               <li><a href="{{route('returns')}}">Return Policy </a></li>
                                               <li><a href="{{route('terms')}}">Warranty</a></li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                         <div class="footer-bottom ptb-20">
                             <div class="row text-center centered">
                               <div class="col-md-12 col-sm-12">
                                       <img src="{{URL::asset('Site/images/trust.png')}}" style="width:250px;" />
                               </div>
                                 <div class="col-md-12 col-sm-12">
                                     <div class="copyright">
                                         <p>
                                             Copyright © 2020
                                             <a href="{{route('home')}}"> Althy<a>
                                             . All Rights Reserved.
                                         </p>
                                     </div>
                                 </div>

                             </div>
                         </div>
                 </footer>
                 <!-- footer area end -->
             </div>
             <!-- content end -->
         </div>
       <!-- <div class="zeynep-overlay"></div> -->
     </div>
     <script src="{{URL::asset('Site/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
     <script src="{{URL::asset('Site/assets/js/snap.svg-min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/jquery.meanmenu.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/jquery.magnific-popup.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/isotope.pkgd.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/zeynep.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/imagesloaded.pkgd.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/jquery.validate.min.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/jquery.picZoomer.js')}}"></script>
     <script src="{{URL::asset('Site/lib/js/jquery.nivo.slider.js')}}"></script>
     <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script src="https://www.jqueryscript.net/demo/Stylish-Multi-level-Sidebar-Menu-Plugin-With-jQuery-sidebar-menu-js/dist/sidebar-menu.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.js"></script>
     <script src="{{URL::asset('Site/lib/home.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/plugins.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/main.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/classie.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/main3.js')}}"></script>
     <script src="{{URL::asset('Site/assets/js/scripts.js')}}"></script>


     <script>
     function addToCart(id, type)
     {
       if (type == 'Service')
       {
         $.post('{{route('addToCart')}}', {ServiceID: id, Type: 'Service'}, function (data, status)
         {
           toastr.options.timeOut = 1500; // 1.5s
           toastr.success('Successfully Added To Cart!');
           updateTotals();
         });
       }

       if (type == 'Product')
       {
         $.post('{{route('addToCart')}}', {ProductID: id, Type: 'Product'}, function (data, status)
         {
           toastr.options.timeOut = 1500; // 1.5s
           toastr.success('Successfully Added To Cart!');
           updateTotals();
         });
       }
     }


     function addToCartCheckout(id, type)
     {
       if (type == 'Service')
       {
         $.post('{{route('addToCart')}}', {ServiceID: id, Type: 'Service'}, function (data, status)
         {
           toastr.options.timeOut = 1500; // 1.5s
           toastr.success('Successfully Added To Cart!');
           window.location.href="{{route('checkout')}}";
         });
       }

       if (type == 'Product')
       {
         $.post('{{route('addToCart')}}', {ProductID: id, Type: 'Product'}, function (data, status)
         {
           toastr.options.timeOut = 1500; // 1.5s
           toastr.success('Successfully Added To Cart!');
           window.location.href="{{route('checkout')}}";
         });
       }
     }



     function addToCartRemove(id, type)
     {
       if (type == 'Product')
       {
         $.post('{{route('addToCartRemove')}}', {ProductID: id, Type: 'Product'}, function (data, status)
         {
           toastr.options.timeOut = 1500; // 1.5s
           toastr.error('Removal Added To Cart!');
           updateTotals();
         });
       }
     }

     function updateTotals()
     {
         $.get('{{route('updateTotals')}}', function (data, status) {
             //alert("Quantity Updated!");
             if (data.CartCount == 0) {
                 $('.cartCount').hide();
             } else {
                 $('.cartCount').html(data.CartCount);
                 $('.cartCount').show();
             }
         });
     }

     function makeCarousel () {
       $('.product-curosel2').owlCarousel({
           loop: true,
           nav: true,
           items: 3,
           navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
           responsive: {
               0: {
                   items: 1
               },
               768: {
                   items: 3
               },
               1000: {
                   items: 6
               }
           }
       });
     }

     function searchShelf(searchCategory, searchObj, shelfName)
     {
       var Category = searchCategory;
       var searchTerm = $('#'+searchObj).val();
       var owl = $('#'+shelfName).owlCarousel({
           loop: true,
           nav: true,
           items: 3,
           navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
           responsive: {
               0: {
                   items: 1
               },
               768: {
                   items: 3
               },
               1000: {
                   items: 6
               }
           }
       });
       if (searchTerm.length >= 0)
       {
         $.post('{{route('searchShelf')}}', {Category: Category, Search: searchTerm}, function (data, status)
         {
           var sysURL = '<?php echo url('/'); ?>';
           var itemCount = owl.find('.owl-item').length;
           for (var i = itemCount-1; i>=0; i--)
           {
              owl.trigger('remove.owl.carousel', [i]);
           }

           $.each(data.Products, function(k, v) {
             var addToCartLink = '<a href="" title="Add to Cart" onclick="addToCart('+v.id;
             addToCartLink += ',\'Product\');return false;">';
             var addToCartCheckoutLink = '<a href="" title="Add to Cart" onclick="addToCartCheckout('+v.id;
             addToCartCheckoutLink += ',\'Product\');return false;">';
             var html = '<div class="single-shop mb-10" style="height:380px;"><div class="shop-img text-center centered" style="height:245px;">';
             html += '<a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"><img src="{{URL::asset('ProductImages/')}}/'+v.Image+'" alt="" style="width:60%;"/></a>';
             html += '<div class="shop-quick-view"> <a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"> <i class="pe-7s-look"></i> </a> </div>';
             if (v.onSale == 1)
             {
               html += '<div class="price-up-down"> <span class="sale-new">-'+v.SalePercentage+'%</span></div>';
             }
             html += '<div class="button-group"> '+addToCartLink+' <i class="icofont-cart-alt"></i> add to cart </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> checkout </a> </div></div>';
             html += '<div class="shop-text-all"><div class="title-color"><div class="shop-title text-center"><h3><a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'">'+v.Name+'</a></h3><p class="price">';
             if (v.onSale == 1)
             {
               var ActualPrice = v.ActualPrice;
               html += '<span class="old">Rs. '+ActualPrice+'</span>';
             }
             var SalePrice = v.SalePrice;
             html += '<span class="new">Rs. '+SalePrice+'</span> </p></div></div></div><div class="bottom-buttons text-center"> '+addToCartLink+' <i class="icofont-cart-alt"></i> </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> </a> </div></div>';
    			    owl.trigger('add.owl.carousel', [jQuery(html)]);
    			});
			    owl.trigger('refresh.owl.carousel');
         });
       }
     }

     function searchShelfSub(searchCategory, searchObj, shelfName, level)
     {
       var Category = searchCategory;
       var searchTerm = $('#'+searchObj).val();
       var owl = $('#'+shelfName).owlCarousel({
           loop: true,
           nav: true,
           items: 3,
           navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
           responsive: {
               0: {
                   items: 1
               },
               768: {
                   items: 3
               },
               1000: {
                   items: 5
               }
           }
       });
       if (searchTerm.length >= 0)
       {
         $.post('{{route('searchShelfsub')}}', {Category: Category, Search: searchTerm, Level: level}, function (data, status)
         {
           var sysURL = '<?php echo url('/'); ?>';
           var itemCount = owl.find('.owl-item').length;
           for (var i = itemCount-1; i>=0; i--)
           {
              owl.trigger('remove.owl.carousel', [i]);
           }

           $.each(data.Products, function(k, v) {
             var addToCartLink = '<a href="" title="Add to Cart" onclick="addToCart('+v.id;
             addToCartLink += ',\'Product\');return false;">';
             var addToCartCheckoutLink = '<a href="" title="Add to Cart" onclick="addToCartCheckout('+v.id;
             addToCartCheckoutLink += ',\'Product\');return false;">';
              var html = '<div class="single-shop mb-10" style="height:380px;"><div class="shop-img text-center centered" style="height:245px;">';
              html += '<a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"><img src="{{URL::asset('ProductImages/')}}/'+v.Image+'" alt="" style="width:60%;"/></a>';
              html += '<div class="shop-quick-view"> <a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"> <i class="pe-7s-look"></i> </a> </div>';
              if (v.onSale == 1)
              {
                html += '<div class="price-up-down"> <span class="sale-new">-'+v.SalePercentage+'%</span></div>';
              }
              html += '<div class="button-group"> '+addToCartLink+' <i class="icofont-cart-alt"></i> add to cart </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> checkout </a> </div></div>';
              html += '<div class="shop-text-all"><div class="title-color"><div class="shop-title text-center"><h3><a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'">'+v.Name+'</a></h3><p class="price">';
              if (v.onSale == 1)
              {
                var ActualPrice = v.ActualPrice;
                html += '<span class="old">Rs. '+ActualPrice+'</span>';
              }
              var SalePrice = v.SalePrice;
              html += '<span class="new">Rs. '+SalePrice+'</span> </p></div></div></div><div class="bottom-buttons text-center"> '+addToCartLink+' <i class="icofont-cart-alt"></i> </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> </a> </div></div>';

    			    owl.trigger('add.owl.carousel', [jQuery(html)]);
    			});
			    owl.trigger('refresh.owl.carousel');
         });
       }
     }

     function searchNonShelf(searchCategory, searchObj, shelfName)
     {
       var Category = searchCategory;
       var searchTerm = $('#'+searchObj).val();
       if (searchTerm.length >= 0)
       {
         $.post('{{route('searchShelf')}}', {Category: Category, Search: searchTerm}, function (data, status)
         {
           var sysURL = '<?php echo url('/'); ?>';
           var html = "";
           if (data.Products.length > 0)
           {
             $.each(data.Products, function(k, v) {
               var addToCartLink = '<a href="" title="Add to Cart" onclick="addToCart('+v.id;
               addToCartLink += ',\'Product\');return false;">';
               var addToCartCheckoutLink = '<a href="" title="Add to Cart" onclick="addToCartCheckout('+v.id;
               addToCartCheckoutLink += ',\'Product\');return false;">';
               html += '<div class="col-md-2 col-sm-6 col-xs-12 hidden-sm hidden-xs"><div class="single-shop mb-10" style="height:380px;"><div class="shop-img text-center centered" style="height:245px;">';
               html += '<a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"><img src="{{URL::asset('ProductImages/')}}/'+v.Image+'" alt="" style="width:60%;"/></a>';
               html += '<div class="shop-quick-view"> <a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"> <i class="pe-7s-look"></i> </a> </div>';
               if (v.onSale == 1)
               {
                 html += '<div class="price-up-down"> <span class="sale-new">-'+v.SalePercentage+'%</span></div>';
               }
               html += '<div class="button-group"> '+addToCartLink+' <i class="icofont-cart-alt"></i> add to cart </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> checkout </a> </div></div>';
               html += '<div class="shop-text-all"><div class="title-color"><div class="shop-title text-center"><h3><a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'">'+v.Name+'</a></h3><p class="price">';
               if (v.onSale == 1)
               {
                 var ActualPrice = v.ActualPrice;
                 html += '<span class="old">Rs. '+ActualPrice+'</span>';
               }
               var SalePrice = v.SalePrice;
               html += '<span class="new">Rs. '+SalePrice+'</span> </p></div></div></div><div class="bottom-buttons text-center"> '+addToCartLink+' <i class="icofont-cart-alt"></i> </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> </a> </div></div></div>';
               html += '<div class="container hidden-md hidden-lg hidden-xl "> <div class="col-md-12 col-sm-12 col-xs-12 hidden-md hidden-lg hidden-xl mb-10 productMobile no-padding"> <div class="col-md-3 col-sm-3 col-xs-3"> <a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"><img src="{{URL::asset('ProductImages/')}}/'+v.Image+'" alt="" style="width:60%;"/></a> </div><div class="col-md-7 col-sm-7 col-xs-7"> <b><a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'" style="color:black;">'+v.Name+'</a></b> <p class="price no-padding no-margin">';
               if (v.onSale == 1)
               {
                 var ActualPrice = v.ActualPrice;
                 html += '<span class="old dark-grey">Rs. '+ActualPrice+'</span>';
               }
               html += '<span class="new dark-grey">Rs. '+SalePrice+'</span> </p></div><div class="col-md-2 col-sm-2 col-xs-2"> '+addToCartLink+' <i class="icofont-cart-alt"></i> </a> </div></div></div>';

      			});
            $('.page-pagination').hide();
            $('#'+shelfName).html(html);
           }
           else
           {
             html = '<h3 class="text-center">No Products Found!</h3><h5 class="text-center">Please change your search term!</h5>';
             $('.page-pagination').hide();
             $('#'+shelfName).html(html);
           }
         });
       }
     }

     function searchNonShelfsub(searchCategory, searchObj, shelfName, level)
     {
       var Category = searchCategory;
       var searchTerm = $('#'+searchObj).val();
       if (searchTerm.length >= 0)
       {
         $.post('{{route('searchShelfsub')}}', {Category: Category, Search: searchTerm, Level: level}, function (data, status)
         {
           var sysURL = '<?php echo url('/'); ?>';
           var html = "";
           if (data.Products.length > 0)
           {
             $.each(data.Products, function(k, v) {
               var addToCartLink = '<a href="" title="Add to Cart" onclick="addToCart('+v.id;
               addToCartLink += ',\'Product\');return false;">';
               var addToCartCheckoutLink = '<a href="" title="Add to Cart" onclick="addToCartCheckout('+v.id;
               addToCartCheckoutLink += ',\'Product\');return false;">';
               html += '<div class="col-md-2 col-sm-6 col-xs-12 hidden-sm hidden-xs"><div class="single-shop mb-10" style="height:380px;"><div class="shop-img text-center centered" style="height:245px;">';
               html += '<a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"><img src="{{URL::asset('ProductImages/')}}/'+v.Image+'" alt="" style="width:60%;"/></a>';
               html += '<div class="shop-quick-view"> <a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"> <i class="pe-7s-look"></i> </a> </div>';
               if (v.onSale == 1)
               {
                 html += '<div class="price-up-down"> <span class="sale-new">-'+v.SalePercentage+'%</span></div>';
               }
               html += '<div class="button-group"> '+addToCartLink+' <i class="icofont-cart-alt"></i> add to cart </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> checkout </a> </div></div>';
               html += '<div class="shop-text-all"><div class="title-color"><div class="shop-title text-center"><h3><a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'">'+v.Name+'</a></h3><p class="price">';
               if (v.onSale == 1)
               {
                 var ActualPrice = v.ActualPrice;
                 html += '<span class="old">Rs. '+ActualPrice+'</span>';
               }
               var SalePrice = v.SalePrice;
               html += '<span class="new">Rs. '+SalePrice+'</span> </p></div></div></div><div class="bottom-buttons text-center"> '+addToCartLink+' <i class="icofont-cart-alt"></i> </a> '+addToCartCheckoutLink+' <i class="icofont-sign-out"></i> </a> </div></div></div>';
               html += '<div class="container hidden-md hidden-lg hidden-xl "> <div class="col-md-12 col-sm-12 col-xs-12 hidden-md hidden-lg hidden-xl mb-10 productMobile no-padding"> <div class="col-md-3 col-sm-3 col-xs-3"> <a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'"><img src="{{URL::asset('ProductImages/')}}/'+v.Image+'" alt="" style="width:60%;"/></a> </div><div class="col-md-7 col-sm-7 col-xs-7"> <b><a href="'+sysURL+'/productDetails/'+v.id+'" title="'+v.Name+'" style="color:black;">'+v.Name+'</a></b> <p class="price no-padding no-margin">';
               if (v.onSale == 1)
               {
                 var ActualPrice = v.ActualPrice;
                 html += '<span class="old dark-grey">Rs. '+ActualPrice+'</span>';
               }
               html += '<span class="new dark-grey">Rs. '+SalePrice+'</span> </p></div><div class="col-md-2 col-sm-2 col-xs-2">'+addToCartLink+' <i class="icofont-cart-alt"></i> </a> </div></div></div>';
      			});
            $('.page-pagination').hide();
            $('#'+shelfName).html(html);
          }
          else
          {
            html = '<h3 class="text-center">No Products Found!</h3><h5 class="text-center">Please change your search term!</h5>';
            $('.page-pagination').hide();
            $('#'+shelfName).html(html);
          }
         });
       }
     }



     updateTotals();
     </script>
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174694937-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-174694937-1');
    </script>

     @yield('customJS')
 </body>
 </html>
