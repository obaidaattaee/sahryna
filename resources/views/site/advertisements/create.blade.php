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





                <div class=" title-foraddADS">
                    إضافة الإعلان
                    <hr class="w-100" />
                </div>


                <form class="Form-AddADS">

                    <div class="form-group">
                        <label class="Label-AddADS" for="ProductName"> اسم المنتج  </label>

                        <input type="text" class="form-control inputs-AddADS ProductName DefaultForm" id="ProductName" placeholder="أدرج عنوانا موجزا يصف إعلانك بشكل دقيق.">
                    </div>

                    <div class="form-group">
                        <label class="Label-AddADS ProductSec" for="ProductDesc1"> وصف الإعلان  </label>
                        <textarea class="form-control inputs-AddADS textareaDes DefaultFormTextArea" id="ProductDesc1" placeholder="أدرج وصفا مفصّلا ودقيقا لإعلانك" rows="4"></textarea>
                    </div>


                    <div class="form-group">
                        <label class="Label-AddADS Productsection" for="Productsection"> اختر قسم المنتج </label>
                        <select id="ProductDesc2" name="Section" class="form-control selectpicker inputs-AddADS Productsection" title=" اختر  القسم   ">

                            <option onclick="GetProperty()">عقارات</option>
                            <option onclick="GetCars()">مركبات</option>
                            <option onclick="GetHardware()">اجهزة</option>
                            <option onclick="GetCars()">مبيعات متنوعة</option>
                        </select>
                    </div>














                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="ادخل رقم الهاتف">
                        </div>
                        <div class="col">
                            <select id="ProductDesc2" name="ProductDesc2" class="form-control selectpicker   inputs-AddADS ProductDesc1" title="ادخل المدينة">
                                <option>الرياض</option>
                                <option>مكة المكرمة</option>
                                <option>الطائف</option>
                                <option>الخبر</option>
                                <option>الأحساء</option>
                                <option>جدة </option>
                                <option>تبوك </option>
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
                                <input class="form-check-input form-control-md DefaultForm" type="checkbox" value="" id="defaultCheck1">

                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="ادخل سعر التكاليف">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="عدد الشركاء المطلوب">
                        </div>

                        <div class="col">
                            <input type="number" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="السعر مفرق">
                        </div>

                        <div class="col">
                            <input type="number" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput1" placeholder="السعر بالجملة ">
                        </div>
                    </div>
                    <br />
                    <div class="row" style="margin-right: -50px;">
                        <div class="col">

                            <ol class="list-unstyled ol-List-Item"  >
                                <li class="ol-list">
                                    <label class="form-check-label label-checkbox1" for="gridRadios1" >مدة الاعلان</label>

                                </li>
                                <li class="ol-list" style="    margin-right: 12px;">
                                    <input class="form-check-input " type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>

                                    <label class="form-check-label label-checkbox2" for="gridRadios1"  >
                                        ثلاثة ايام
                                    </label>

                                </li>

                                <li class="ol-list">
                                    <input class="form-check-input " type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>

                                    <label class="form-check-label label-checkbox3" for="gridRadios1"   >
                                        خمسة ايام
                                    </label>

                                </li>
                                <li class="ol-list">
                                    <input class="form-check-input " type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>

                                    <label class="form-check-label label-checkbox4" for="gridRadios1"  >
                                        اسبوع
                                    </label>

                                </li>


                                <li class="ol-list">
                                    <input class="form-check-input " type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>

                                    <label class="form-check-label label-checkbox5" for="gridRadios1"  >
                                        اسبوعين
                                    </label>

                                </li>
                            </ol>
                        </div>




                    </div>



                    <br />
                    <div class="form-group" style="margin-bottom:25px">
                        <a href="#" class="form-control inputs-AddADS   Pay-ADS" id="inputs-AddADS">ادفع قيمة الاعلان وهي 5دولار لمدة 5 ايام</a>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <div class="input-img" style="padding: 20px;background-color: #e5e5ca;">
                                    <label for="exampleFormControlFile1" class="Add-img">إضافة صور للمنتج</label>

                                    <input type="file" multiple class="form-control-file DefaultForm" id="exampleFormControlFile1">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 40px;">
                        <label class="Label-AddADS" for="exampleFormControlInput1"> تحديد موقع تسليم المنتج لشركاء </label>
                     </div>





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
                                    <input type="text" name="adress" id="pac-input" name="address">
                                    <div id="map"  style="height: 400px">
                                    </div>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->
                        </div>
                    </div>











                    <br />




                    <div class="row">
                        <div class="col">
                            <select id="ProductDesc4" name="ProductDesc2" class="form-control selectpicker   inputs-AddADS ProductDesc4" title="حدد موعد تسليم المنتج للشركاء">
                                <option>خلال 2 ايام من انتهاء الإعلان واكتمال المشاركات </option>
                                <option>خلال 5ايام من انتهاء الإعلان واكتمال المشاركات </option>
                                <option>خلال 7ايام من انتهاء الإعلان واكتمال المشاركات </option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <select id="ProductDesc5" name="ProductDesc5" class="form-control selectpicker   inputs-AddADS ProductDesc5" title="نوع الإعلان">
                                <option>عروض موسمية  </option>
                                <option>عروض يومية  </option>
                                <option>   طلب</option>
                                <option> عرض </option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="ProductDesc6" name="ProductDesc6" class="form-control selectpicker   inputs-AddADS ProductDesc6" title="نوع سعر المنتج">
                                <option>سعر جملة  </option>
                                <option>سعر مفرق  </option>
                                <option> مفرق  </option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col">
                            <label class="Label-AddADS" for="exampleFormControlInput1">  موعد انتهاء اعلانك </label>
                            <input type="date" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput6" placeholder="ادخل سعر التكاليف">
                        </div>
                        <div class="col">
                            <label class="Label-AddADS" for="exampleFormControlInput1"> تحديد موعد نشر اعلانك   </label>
                            <input type="date" class="form-control inputs-AddADS DefaultForm" id="exampleFormControlInput5" placeholder="ادخل سعر التكاليف">
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
            console.log('dsdsdsdsddsd');
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjAGp24IL8hsAfS5-f004Pc2cWJDn5etM&libraries=places&callback=initAutocomplete&language=ar&region=EGasync defer"></script>
     {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjAGp24IL8hsAfS5-f004Pc2cWJDn5etM&sensor=false&libraries=places&language=ar"></script> --}}

@endsection
