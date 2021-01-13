@extends('site.layouts.app')
@section('css')

<link href="{{ asset('assets/Css/bootstrap-select.css')}}" rel="stylesheet" />


<link href="{{ asset('assets/Css/Add-ADS.css')}}" rel="stylesheet" />

@endsection
@section('content')
<br /> <br /><br /> <br /> <br />

        <div class="container">
            <div class="row">
                <div class="col-12" style="text-align: end">
                    <a href="HomePage.html" class="Page-Name" >  العودة للصفحة الرئيسية </a>
                    <hr class="w-100" />
                </div>
            </div>
        </div>

        <br /> <br />
    <!--Add-ADS-->
    <div class="container">


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">


@include('admin.layouts.msg')

                <div class=" title-foraddADS">
                    إضافة الإعلان
                    <hr class="w-100" />
                </div>


                <form class="Form-AddADS" enctype="multipart/form-data" action="{{ route('advertismenets.store')}}" method="post">
                    @csrf
                    @method('POST')
                    @error('title')
                    <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label class="Label-AddADS" for="ProductName"> اسم المنتج  </label>

                    <input type="text" name="title" required value="{{ old('title') ?? $adv->title ?? ""}}" class="form-control inputs-AddADS ProductName DefaultForm" id="ProductName" placeholder="أدرج عنوانا موجزا يصف إعلانك بشكل دقيق.">
                    </div>
                    @error('description')
                    <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
    @enderror
                    <div class="form-group">
                        <label class="Label-AddADS ProductSec" for="ProductDesc1"> وصف الإعلان  </label>

                        <textarea name="description" required class="form-control inputs-AddADS textareaDes DefaultFormTextArea" id="ProductDesc1" placeholder="أدرج وصفا مفصّلا ودقيقا لإعلانك" rows="4">{{ old('description') ?? $adv->description ?? ""}}</textarea>
                    </div>

                    @error('category_id')
                    <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
    @enderror
                    <div class="form-group">
                        <label class="Label-AddADS Productsection" for="Productsection"> اختر قسم المنتج </label>

                        <select id="ProductDesc2" required name="category_id" class="form-control selectpicker inputs-AddADS Productsection" title=" اختر  القسم   ">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "e" }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>














                    <div class="row">

                        <div class="col">
                            @error('phone')
                                <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                            @enderror
                            <input type="number" required name="phone" value="{{ old('phone') ?? $adv->phone ?? ""}}" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="ادخل رقم الهاتف">
                        </div>
                        <div class="col">
                            @error('city_id')
                                <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                            @enderror
                            <select id="ProductDesc2" required name="city_id" class="form-control selectpicker   inputs-AddADS ProductDesc1" title="ادخل المدينة">
                                <option value="">قم باختيار المدينه</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? "selected" : "" }}>{{ $city->title }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <br />
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <label class="form-check-label check-no1" for="defaultCheck1">
                                    إضافة تكاليفٌ ومصاريفٌ الشراء والتوصيلٌ لتتفرق على الحصص
                                </label>
                                <input class="form-check-input form-control-md DefaultForm" value="{{ old('distribute_cost') ?? $adv->distribute_cost ?? ""}}" type="checkbox" name="distribute_cost" id="defaultCheck1">

                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            @error('cost')
                            <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
            @enderror
                            <input type="number" required class="form-control inputs-AddADS DefaultForm"  value="{{ old('cost') ?? $adv->cost ?? ""}}" name="cost" id="exampleFormControlInput1" placeholder="ادخل سعر التكاليف">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            @error('number_of_partners')
                            <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
            @enderror
                            <input type="number" required name="number_of_partners" value="{{ old('number_of_partners') ?? $adv->number_of_partners ?? ""}}" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="عدد الشركاء المطلوب">
                        </div>

                        <div class="col">
                            @error('retail_price')
                            <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
            @enderror
                            <input type="number" required name="retail_price" value="{{ old('retail_price') ?? $adv->retail_price ?? ""}}" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="السعر مفرق">
                        </div>

                        <div class="col">
                            @error('wholesale_price')
                            <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
            @enderror
                            <input type="number" required name="wholesale_price" value="{{ old('wholesale_price') ?? $adv->wholesale_price ?? ""}}" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="السعر بالجملة ">
                        </div>
                    </div>
                    <br />
                    <div class="row" style="margin-right: -50px;">
                        <div class="col">
                            @error('subscription_id')
                            <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
            @enderror
                            <ol class="list-unstyled ol-List-Item"  >
                                <li class="ol-list">
                                    <label class="form-check-label label-checkbox1" >مدة الاعلان</label>

                                </li>
                                @foreach ($subscriptions as $index => $subscription)
                                {{-- {{dd($subscription) }} --}}
                                <li class="ol-list" style="    margin-right: 12px;">
                                    <input class="form-check-input " type="radio" onclick="event.preventDefault; changeSubscriptionPrice({{$subscription->price}} , '{{$subscription->title}}')" name="subscription_id" id="gridRadios{{ $index }}" value="{{ $subscription->id }}" {{ $index == 0 ? "checked" : "" }}>

                                    <label class="form-check-label label-checkbox2" for="gridRadios{{$index}}"  >
                                        {{ $subscription->description }}
                                    </label>

                                </li>
                                @endforeach

                            </ol>
                        </div>




                    </div>



                    <br />
                    <div class="form-group d-none" id="checkout" style="margin-bottom:25px">
                        <a href="#" class="form-control inputs-AddADS   Pay-ADS" id="checkout-price">ادفع قيمة الاعلان وهي 5دولار لمدة 5 ايام</a>
                    </div>

                    <div class="row">
                        <div class="col">
                            @error('imagesFiles')
                                <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                            @enderror
                            <div class="form-group">

                                <div class="input-img" style="padding: 20px;background-color: #e5e5ca;">
                                    <label for="exampleFormControlFile1" class="Add-img">إضافة صور للمنتج</label>

                                    <input required type="file" multiple name="imagesFiles[]" class="form-control-file DefaultForm" id="exampleFormControlFile1">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 40px;">
                        <label class="Label-AddADS" for="exampleFormControlInput1"> تحديد موقع تسليم المنتج لشركاء </label>
                     </div>


                     @error('address')
                     <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
     @enderror
                    <div class="row">
                        <div class="col-md-12">
                            <!--Card-->
                            <div class="card card-cascade narrower">

                                <!--Card image-->
                                <div class="view view-cascade gradient-card-header blue-gradient">

                                </div>
                                <!--/Card image-->
                                <!--Card content-->
                                <div class="card-body card-body-cascade text-center">

                                    <!--Google map-->
                                    {{-- <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                                        <iframe src="https://maps.google.com/maps?q=new%20delphi&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div> --}}
                                    <input type="text" name="address" required value="{{ old('address') ?? $adv->address ?? ""}}" id="pac-input" name="address">
                                    <div id="map"  style="height: 400px">
                                    </div>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->
                        </div>
                    </div>











                    <br />



                    @error('delivery_time_id')
                    <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                @enderror
                    <div class="row">
                        <div class="col">
                            <select id="ProductDesc4" required name="delivery_time_id" class="form-control selectpicker   inputs-AddADS ProductDesc4" title="حدد موعد تسليم المنتج للشركاء">
                               @foreach ($deleviry_times as $deleviry_time)
                               <option value="{{ $deleviry_time->id }}" {{ old('delivery_time_id') == $deleviry_time->id ?? $adv->address ? "checked" : ""}}>{{ $deleviry_time->description }} </option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col">
                            @error('advertisement_type_id')
                                <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                            @enderror

                             <select id="ProductDesc5" required name="advertisement_type_id" class="form-control selectpicker   inputs-AddADS ProductDesc5" title="نوع الإعلان">
                                @foreach ($advertisement_types as $type)
                                    <option value="{{ $type->id }}" {{ old('advertisement_type_id') == $type->id  ? "selected" : ""}}>{{ $type->title }}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col">
                            @error('type_of_price')
                                <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                            @enderror
                            <select id="ProductDesc6" required name="type_of_price" class="form-control selectpicker   inputs-AddADS ProductDesc6" title="نوع سعر المنتج">
                                @foreach (['wholesale' => 'سعر بالجملة' , 'retail' => 'سعر مفرق'] as $key => $value)
                                <option value="{{ $key }}" {{ old('type_of_price') == $key ? "checked" : ""}}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br />
                    @error('publish_date')
                                <div class="alert alert-danger" style="text-align: right;background-color: #ec969e;9">{{ $message }}</div>
                            @enderror
                    <div class="row">


                        <div class="col">
                             <label class="Label-AddADS" for="end_publish_date">  موعد انتهاء اعلانك </label>
                            <input type="date" disabled name="end_publish_date" value="{{ old('end_publish_date') ?? $adv->end_publish_date ?? ""}}" class="form-control inputs-AddADS DefaultForm" id="end_publish_date" placeholder="ادخل سعر التكاليف">
                        </div>

                        <div class="col">

                            <label class="Label-AddADS" for="publish_date"> تحديد موعد نشر اعلانك   </label>
                            <input type="date" required name="publish_date" value="{{ old('publish_date') ?? $adv->publish_date ?? ""}}" onchange="event.preventDefault ; changeEndPublishDate()" class="form-control inputs-AddADS DefaultForm" id="publish_date" placeholder="ادخل سعر التكاليف">
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col">
                            <input type="submit" class="btnSubmit  " value="نشر الاعلان" />
                        </div>
                    </div>
                    <div class="form-group">
                        <p   class="Noties" style="text-align: end;margin-top: 10px;font-family: 'Cairo', sans-serif;color: #6d1c1c;font-weight: 500;"> ملاحظة : لن يتم نشر اعلانك إلا بعد عملية سداد قيمة الاعلان </a>
                    </div>


                    <input type="hidden" name="lat" id="latitude">
                    <input type="hidden" name="long" id="longitude">
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>



@endsection
@section('js')
<script src="{{ asset('assets/Js/bootstrap-select.js')}}"></script>


<script>
    function GetCars(){


        document.getElementById("Cars").style.display = "flex";
    }
</script>


<script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            console.log('Browser doesn\'t support Geolocation');
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }

</script>
<script>
     function changeSubscriptionPrice(price , title){
        if (price == 0 ){
            document.getElementById('checkout').classList.add('d-none') ;
        }
        else{
            document.getElementById('checkout').classList.remove('d-none') ;
            document.getElementById('checkout-price').innerHTML = ' ادفع قيمة الاعلان و هي  ' + price + ' ريال لمدة  ' + title;
        }
    }
    function changeEndPublishDate(){
        console.log('change end publish date ');
        var publish_date = document.getElementById('publish_date').value;
        var date = new Date(publish_date) ;
        date.setDate(date.getDate() + 7) ;
        date = date.toISOString().slice(0,10).split('-') ;
        console.log(date[0]+"-"+(date[2])+"-"+date[1]);
        document.getElementById('end_publish_date').setAttribute("value" , date[0]+"-"+(date[2])+"-"+date[1] )  ;

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjAGp24IL8hsAfS5-f004Pc2cWJDn5etM&libraries=places&callback=initAutocomplete&language=ar&region=EGasyncdefer"></script>
     {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjAGp24IL8hsAfS5-f004Pc2cWJDn5etM&sensor=false&libraries=places&language=ar"></script> --}}

@endsection
