@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">{{$category->Title}}</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                @if ($category->isRoot==1)
                  <li><a href="{{ route('shop', ['type' => 'Grocery', 'level' => 1, 'category' => $category->Type2]) }}">{{$category->Type2}}</a></li>
                @else
                  @if (isset($category->Parent))
                    <li>{{$category->Parent->Title}}</li>
                  @endif
                @endif
                <li>{{$category->Title}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area ptb-100" style="padding-left: 50px;padding-right:50px;">
      <div class="row mtb-80">
          @foreach ($categories as $cat)
            <div class="row grid-item mb-80">
              <div class="col-md-3 col-lg-2">
                <div class="shelf-image shelf-image-6 text-center">
                  <h2>{{$cat->Title}}</h2>
                  @if ($level==2)
                  <img src="{{URL::asset($cat->Image)}}" style="width:150px;" class="ptb-20" />
                  <a href="{{ route('shelves', ['type' => 'Grocery', 'level' => 2, 'category' => $cat->id]) }}" class="btn btn-danger">View Shelves</a>
                  @endif
                </div>

              </div>
              <div class="col-md-9 col-lg-10">
                <div class="search-input-button3">
                    <input id="Search{{$cat->id}}"  placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelfSub('{{$cat->id}}', 'Search{{$cat->id}}', 'Search{{$cat->id}}Shelf', '{{$level}}');">
                </div>
                <div class="product-curosel2 product-curosel-style owl-carousel" id="Search{{$cat->id}}Shelf">
                  @include('Site.Partials.partialProductLoopCarousel', ['data' => $cat->Products])
                </div>
              </div>
            </div>
          @endforeach
        </div>
</div>
@endsection
