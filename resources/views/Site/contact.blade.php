@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">contact us</h2>
            <ul>
                <li>
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>contact</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div id="contact-area" class="contact-area ptb-100 gray-bg">
    <div class="container">
        <div class="section-title text-center mb-70">
            <h2>GET IN TOUCH <i class="fa fa-phone"></i></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel volutpat felis, eu condimentum massa. Pellentesque mollis eros vel mattis tempor.</p>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-offset-2 col-lg-8 col-sm-12">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        <div class="contact-info-area">
                            <ul>
                                <li>
                                    <div class="contact-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-address">
                                        <h5>Phone</h5>
                                        <span>+88 669 658 6586</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="contact-address">
                                        <h5>Email</h5>
                                        <span><a href="#">themeglass@gmail.com</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-address">
                                        <h5>Our Location</h5>
                                        <span>Location Name,here.US</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-7">
                        <div class="sent-message">
                            <form class="contact_form" id="contact_form" action="http://nahartheme.com/tf/jerin-preview/jerin/contact-form.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-input mb-10">
                                            <input id="contact_name" name="name" placeholder="Name*" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="main-input mrg-eml mrg-contact mb-10">
                                            <input id="contact_email" name="email" type="email" placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-leave2 mb-20">
                                            <textarea name="message" id="contact_message" placeholder="Type Your Massage......."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="submit ripple-btn" type="submit" name="submit" id="contact_submit" data-complete-text="Well done!">Send Massage</button>
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
<div class="contact-area-all">
    <div id="jerin"></div>
</div>
@endsection
