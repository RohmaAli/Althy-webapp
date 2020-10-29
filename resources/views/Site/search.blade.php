@extends('layouts.web', ['hasConsumer' => $hasConsumer, 'menuCategories' => $menuCategories, 'consumer' => $consumer])
@section('content')
<div class="breadcrumbs-area breadcrumb-bg ptb-50">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">Search Results</h2>
            <ul>
                <li>
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li>Search Results</li>
            </ul>
        </div>
    </div>
</div>


<div class="shop-page-area ptb-100 pl-60 pr-60">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-wrapper shop-page-mrg">
                    <div class="tab-menu-product">
                        <div class="tab-product">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid">
                                    <div class="row" id="medicineNoShelf">
                                      @if (count($data)>0)
                                        @include('Site.Partials.partialProductLoop', ['data' => $data])
                                      @else
                                        <h3 class="text-center">No Products Found!</h3><h5 class="text-center">Please change your search term!</h5>
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
</div>
@endsection
