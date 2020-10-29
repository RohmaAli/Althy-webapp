@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Covid-19</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Covid-19</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row">
          <div class="col-md-3 hidden-xs hidden-sm">
              <div class="blog-sidebar">
                <div class="single-sidebar">
                    <h3 class="sidebar-title">Menu</h3>
                    <div class="sidebar-list">
                        <ul>
                            <li><input type="checkbox"> <a href="{{ route('covid') }}">Covid-19 Home</a></li>
                            <li><input type="checkbox"> <a href="{{ route('plasmaDonors') }}">Plasma Donors</a></li>
                            <li><input type="checkbox"> <a href="{{ route('plasmaReceivers') }}">Plasma Receivers</a></li>
                        </ul>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-md-9 col-xs-12 col-sm-12">
              <div class="blog-wrapper shop-page-mrg">
                  <div class="col-md-12 centered text-center">
                    <h3>World map of cases and deaths</h3>
                    <br/>
                    <div class="flourish-embed flourish-map" data-src="story/225979"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
                  </div>
                  <div class="col-md-12 centered text-center ptb-100">
                    <h3>Deaths by country</h3>
                    <br/>
                    <div class="flourish-embed flourish-map" data-src="story/229998"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
                  </div>
                  <div class="col-md-12 centered text-center ptb-100">
                    <h3>Breakdown of impacts by country</h3>
                    <br/>
                    <div class="flourish-embed flourish-chart" data-src="story/230085"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
                  </div>

              </div>
          </div>
        </div>
    </div>
</div>
@endsection
