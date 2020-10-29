  <div class="logo center-align">
      <a href="homepage.html" class="center-align">
          <img src="{{URL::asset('Site/assets/logo.png')}}" width="130px" alt="">
      </a>
  </div>
   <h5 class="center-align" style="color:black;">Hello, CONSNAME</h5>

    <ul>
       <li>
          <a href="homepage.html">Home</a>
       </li>
       <li>
         <a href="uploadPicture.html">Upload List</a>
       </li>
       <li>
          <a href="medicine.html">Medicine</a>
       </li>


       @foreach ($categories as $cat1)
         @if (count($cat1->Children) == 0)
         <li><a href="products.html?category={{$cat1->Type2}}&level=1">{{$cat1->Type2}}</a></li>
         @else
           <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat1->Type2)}}1">{{$cat1->Type2}}</a>
             <div id="{{str_replace(' ', '', $cat1->Type2)}}1" class="submenu">
                <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat1->Type2)}}1">
                   <a href="#">Main Menu</a>
                </div>
                <label>{{$cat1->Type2}}</label>
                <ul>
                  <li><a href="products.html?category={{$cat1->Type2}}&level=1">All {{$cat1->Type2}}</a></li>
                  @foreach ($cat1->Children as $cat2)
                   @if (count($cat2->Children)==0)
                   <li><a href="products.html?category={{$cat2->id}}&level=2">{{$cat2->Title}}</a></li>
                   @else
                   <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat2->Title)}}2">{{$cat2->Title}}</a>
                     <div id="{{str_replace(' ', '', $cat2->Title)}}2" class="submenu">
                        <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat2->Title)}}2">
                           <a href="#">{{$cat1->Type2}}</a>
                        </div>
                        <label>{{$cat2->Title}}</label>
                        <ul>
                          <li><a href="products.html?category={{$cat2->id}}&level=2">All {{$cat2->Title}}</a></li>
                          @foreach ($cat2->Children as $cat3)
                            @if (count($cat3->Children)==0)
                            <li><a href="products.html?category={{$cat3->id}}&level=3">{{$cat3->Title}}</a></li>
                            @else
                            <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat3->Title)}}3">{{$cat3->Title}}</a>
                              <div id="{{str_replace(' ', '', $cat3->Title)}}3" class="submenu">
                                 <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat3->Title)}}3">
                                    <a href="#">{{$cat2->Title}}</a>
                                 </div>
                                 <label>{{$cat3->Title}}</label>
                                 <ul>
                                   <li><a href="products.html?category={{$cat3->id}}&level=3">All {{$cat3->Title}}</a></li>
                                   @foreach ($cat3->Children as $cat4)
                                     @if (count($cat4->Children)==0)
                                     <li><a href="products.html?category={{$cat4->id}}&level=4">{{$cat4->Title}}</a></li>
                                     @else
                                     <li class="has-submenu"><a href="#" data-submenu="{{str_replace(' ', '', $cat4->Title)}}4">{{$cat3->Title}}</a>
                                       <div id="{{str_replace(' ', '', $cat4->Title)}}4" class="submenu">
                                          <div class="submenu-header" data-submenu-close="{{str_replace(' ', '', $cat4->Title)}}4">
                                             <a href="#">{{$cat3->Title}}</a>
                                          </div>
                                          <label>{{$cat4->Title}}</label>
                                          <ul>
                                            <li><a href="products.html?category={{$cat4->id}}&level=4">All {{$cat4->Title}}</a></li>
                                            @foreach ($cat4->Children as $cat5)
                                              <li><a href="products.html?category={{$cat5->id}}&level=5">{{$cat5->Title}}</a></li>
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
