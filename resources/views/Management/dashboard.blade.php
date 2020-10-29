@extends('layouts.app')

@section('content')

 <div class="row">
             <div class="col-xl-3 col-md-3">
                <div class="card mini-stat bg-primary">
                   <div class="card-body mini-stat-img">
                      <div class="mini-stat-icon"><i class="mdi mdi-cube-outline float-right"></i></div>
                      <div class="text-white">
                         <h6 class="text-uppercase mb-3">Total Orders</h6>
                         <h4 class="mb-4">{{$orders}}</h4>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-3 col-md-3">
                <div class="card mini-stat bg-primary">
                   <div class="card-body mini-stat-img">
                      <div class="mini-stat-icon"><i class="mdi mdi-buffer float-right"></i></div>
                      <div class="text-white">
                         <h6 class="text-uppercase mb-3">Incomplete Orders</h6>
                         <h4 class="mb-4">{{$incompleteOrders}}</h4>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-3 col-md-3">
                <div class="card mini-stat bg-primary">
                   <div class="card-body mini-stat-img">
                      <div class="mini-stat-icon"><i class="mdi mdi-buffer float-right"></i></div>
                      <div class="text-white">
                         <h6 class="text-uppercase mb-3">Unassigned Orders</h6>
                         <h4 class="mb-4">{{$unassignedOrders}}</h4>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-3 col-md-3">
                <div class="card mini-stat bg-primary">
                   <div class="card-body mini-stat-img">
                      <div class="mini-stat-icon"><i class="mdi mdi-buffer float-right"></i></div>
                      <div class="text-white">
                         <h6 class="text-uppercase mb-3">Complete Orders</h6>
                         <h4 class="mb-4">{{$completeOrders}}</h4>
                      </div>
                   </div>
                </div>
             </div>
          </div>

          <div class="row">
             <div class="col-lg-12">
                <div class="card m-b-20">
                   <div class="card-body">
                      <h4 class="mt-0 header-title">Rider Locations</h4>
                      <div id="gmaps-markers" class="gmaps"></div>

                   </div>
                </div>
             </div>
           </div>

@endsection

@section('customJS')
<script>
var map;
$(document).ready(function() {
    initialize();
});

var map;
var arrMarkers = new Array(0);
var bounds;
var gmarkers1 = [];
var markers1 = [];


function initialize()

{

    var latlng = new google.maps.LatLng(33.7152574,73.0997876);

    var myOptions = {
        zoom: 12,
        center: latlng,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: true,
        streetViewControl: true,
        rotateControl: true,
        fullscreenControl: true,
    };
    map = new google.maps.Map(document.getElementById("gmaps-markers"), myOptions);

      number = 0;
      @foreach ($riders as $d)
        @if ($d->Latitude!="" && $d->Longitude!="")
            markers1.push(['{{$d->Name}}', {{$d->Latitude}}, {{$d->Longitude}}]);
        @endif
      @endforeach
      for (i = 0; i < markers1.length; i++) {
          placeMarker(markers1[i]);
      }

}


function placeMarker(marker)
{
    var iconFile = 'assets/images/location.png';
    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(marker[1], marker[2]),
        map: map,
        icon: iconFile,
        title: marker[0],
        draggable: false
    });
    gmarkers1.push(marker1);
}

filterMarkers = function (title) {
    for (i = 0; i < gmarkers1.length; i++) {
        marker = gmarkers1[i];
        // If is same category or category not picked
        if (marker.title == title || title.length === 0) {
            marker.setVisible(true);
        }
        // Categories don't match
        else {
            marker.setVisible(false);
        }
    }
}

</script>
@endsection
