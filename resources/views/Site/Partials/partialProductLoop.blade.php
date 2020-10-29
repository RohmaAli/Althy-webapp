@foreach ($data as $prod)
<div class="col-md-2 col-sm-6 col-xs-12 hidden-sm hidden-xs">
  <div class="single-shop mb-10" style="height:380px;">
      <div class="shop-img text-center centered" style="height:245px;">
          <a><img src="https://althy.pk/ProductImages/{{$prod->Image}}" loading="lazy" alt="" style="width:60%;" /></a>
          <div class="shop-quick-view">
              <a href="{{route('productDetails', $prod->id)}}" title="{{$prod->Name}}">
                  <i class="pe-7s-look"></i>
              </a>
          </div>
          @if ($prod->onSale==1)
            <div class="price-up-down">
                <span class="sale-new">- {{$prod->SalePercentage}} %</span>
            </div>
          @endif
          <div class="button-group">
              <a href='' title="Add to Cart" onclick="addToCart({{$prod->id}}, 'Product');return false;">
                  <i class="icofont-cart-alt"></i>
                  add to cart
              </a>
              <a href='' title="Checkout" onclick="addToCartCheckout({{$prod->id}}, 'Product');return false;">
                  <i class="icofont-sign-out"></i>
                  checkout
              </a>
          </div>
      </div>
      <div class="shop-text-all">
          <div class="title-color">
              <div class="shop-title text-center">
                  <h3><a href="{{route('productDetails', $prod->id)}}">{{$prod->Name}}</a></h3>
                  <p class="price">
                    @if ($prod->onSale==1)
                      <span class="old">Rs. {{number_format($prod->ActualPrice, 0)}}</span>
                    @endif
                      <span class="new">Rs. {{number_format($prod->SalePrice, 0)}}</span>
                  </p>
              </div>
          </div>
      </div>
      <div class="bottom-buttons text-center">
        <a href='' title="Add to Cart" onclick="addToCart({{$prod->id}}, 'Product');return false;" alt='Add To Cart'>
            <i class="icofont-cart-alt"></i>
        </a>
        <a href='' title="Checkout" onclick="addToCartCheckout({{$prod->id}}, 'Product');return false;">
            <i class="icofont-sign-out"></i>
        </a>
      </div>
  </div>
</div>
<div class="container hidden-md hidden-lg hidden-xl ">
  <div class="col-md-12 col-sm-12 col-xs-12 mb-10 productMobile no-padding">
    <div class="col-md-3 col-sm-3 col-xs-3">
      <a><img src="https://althy.pk/ProductImages/{{$prod->Image}}" loading="lazy" alt="" style="width:100%;" /></a>
    </div>
    <div class="col-md-7 col-sm-7 col-xs-7">
      <b><a href="{{route('productDetails', $prod->id)}}" style="color:black;">{{$prod->Name}}</a></b>
      <p class="price no-padding no-margin">
        @if ($prod->onSale==1)
          <span class="old dark-grey">Rs. {{number_format($prod->ActualPrice, 0)}}</span>
        @endif
          <span class="new dark-grey">Rs. {{number_format($prod->SalePrice, 0)}}</span>
      </p>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
      <a href='' title="Add to Cart" onclick="addToCart({{$prod->id}}, 'Product');return false;">
          <i class="icofont-cart-alt"></i>
      </a>
    </div>
  </div>
</div>
@endforeach
