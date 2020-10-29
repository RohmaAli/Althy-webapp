@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            @if (!isset($currCategory))
            <h2 class="breadcrumb-title">{{$categ}}</h2>
            <ul>
              <li>
                  <a class="active" href="{{ route('home') }}">Home</a>
              </li>
              <li>{{$categ}}</li>
            </ul>
            @else
            <h2 class="breadcrumb-title">{{$currCategory->Title}}</h2>
            <ul>
            <li>
                <a class="active" href="{{ route('home') }}">Home</a>
            </li>
            @if ($currCategory->isRoot==1)
              <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $currCategory->Type2]) }}">{{$currCategory->Type2}}</a></li>
            @else
              @if (isset($currCategory->Parent))
                <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 2, 'category' => $currCategory->Parent->id]) }}">{{$currCategory->Parent->Title}}</a></li>
              @endif
            @endif
            <li>{{$currCategory->Title}}</li>
          </ul>
            @endif
        </div>
    </div>
</div>
@if ($level == 1)
<div class="banner-style-2 mt-20 hidden-md hidden-lg hidden-xl">
  <div class="container">
    <div class="row text-center centered">
      @foreach ($categories as $cat)
        <div class="col-sm-6 col-xs-6 col-md-2 no-padding">
          <div class="cat-box">
            <a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $cat->id]) }}">
              <div class="text-center centered">
                  <div class="image-box">
                    <img src="{{URL::asset($cat->Image)}}" alt="" style="width:45%">
                  </div>
                  <div class="top-box-desc">
                      <h6>{{$cat->Title}}</h6>
                      <sub>&nbsp;</sub>
                  </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endif
<div class="shop-page-area ptb-100 pl-60 pr-60">
        <div class="row">
            <div class="col-md-12 mb-40 pl-50 pr-50 mb-50 text-center">
              <div class="single-sidebar container">
                   <form action="{{route('medicineSearch')}}" method="get">
                      @csrf
                      <div class="search-input-button3">
                        @if (isset($currCategory))
                          <input id="Search{{$currCategory->id}}"  class="text-center"  placeholder="Search {{$currCategory->Title}}" type="text" name="Search" type="search" required minlength="3" onkeyup="searchNonShelfsub('{{$currCategory->id}}', 'Search{{$currCategory->id}}', 'Search{{$currCategory->id}}Shelf', '{{$level}}');">
                        @else
                          <input id="Search{{str_replace(' ', '', $categ)}}"   class="text-center" placeholder="Search {{$categ}}" type="text" name="Search" type="search" required minlength="3" onkeyup="searchNonShelf('{{str_replace(' ', '', $categ)}}', 'Search{{str_replace(' ', '', $categ)}}', 'Search{{str_replace(' ', '', $categ)}}Shelf');">
                        @endif
                      </div>
                   </form>
               </div>
            </div>
            <div class="col-md-12">
                <div class="blog-wrapper shop-page-mrg">
                    <div class="tab-menu-product">
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid">
                                  @if (isset($currCategory))
                                  <div id="Search{{$currCategory->id}}Shelf">
                                    @include('Site.Partials.partialProductLoop', ['data' => $data])
                                  </div>
                                  @else
                                    <div id="Search{{str_replace(' ', '', $categ)}}Shelf">
                                        @include('Site.Partials.partialProductLoop', ['data' => $data])
                                    </div>
                                  @endif
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
@endsection
