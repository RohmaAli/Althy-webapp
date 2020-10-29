@foreach ($categories as $cat)
  @if (count($cat->Products)>0)
  <div class="row grid-item {{$catType}} mb-80" style="display:none;">
    <div class="col-lg-2 col-md-3">
      <div class="shelf-image shelf-image-6 text-center">
        <h2>{{$cat->Title}}</h2>
        <img src="{{URL::asset($cat->Image)}}" style="width:150px;" />
        <a href="{{ route('shelves', ['type' => 'Grocery', 'level' => 1, 'category' => $cat->id]) }}" class="btn btn-danger">View Shelves</a>
      </div>
    </div>
    <div class="col-lg-10 col-md-9">
      <div class="search-input-button">
          <input id="Search{{$cat->id}}"  placeholder="Search" type="text" name="Search" type="search" required minlength="3" onkeyup="searchShelf('{{$cat->id}}', 'Search{{$cat->id}}', 'Search{{$cat->id}}Shelf');">
      </div>
      <div class="product-curosel2 product-curosel-style owl-carousel" id="Search{{$cat->id}}Shelf">
        @include('Site.Partials.partialProductLoopCarousel', ['data' => $cat->Products])
      </div>
    </div>
  </div>
  @endif
@endforeach
