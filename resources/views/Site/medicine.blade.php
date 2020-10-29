@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Medicine</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Medicine</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-area ptb-100 pl-60 pr-60">
        <div class="row">
            <div class="col-md-12 mb-40 pl-50 pr-50 mb-50 text-center">
              <div class="single-sidebar container">
                   <form action="{{route('medicineSearch')}}" method="get">
                      @csrf
                       <div class="search-input-button3">
                           <input id="MedicineGeneralSearch" class="text-center" placeholder="Search Medicine" type="text" name="Search" type="search" required minlength="3" onkeyup="searchNonShelf('Medicine', 'MedicineGeneralSearch', 'medicineNoShelf');">
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
                                    <div class="row" id="medicineNoShelf">
                                      @include('Site.Partials.partialProductLoop', ['data' => $medicine])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
