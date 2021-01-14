@extends('site.layouts.app')
@section('css')

<link href="{{ asset('assets/Css/bootstrap-select.css')}}" rel="stylesheet" />
{{-- /var/www/html/backend/partnership/public/assets/Css/Ad-Details.css --}}
<link href="{{ asset('assets/Css/HomePage.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/Ad-Detail.css')}}" rel="stylesheet" />

<link href="{{ asset('assets/Css/Add-ADS.css')}}" rel="stylesheet" />
<style>





.Page-Name{
    font-size: 15px;
    margin-top: 35px;
    color: rgb(175, 83, 83);
    font-family: 'Cairo', sans-serif;
}


.Page-Name :hover{
    font-size: 15px;
    margin-top: 35px;
    color: rgb(175, 83, 83);
    font-family: 'Cairo', sans-serif;
}



.page-footer{

    background-color: #c4c4a3;
    border-top: 5px solid #6d1c1c;
    font-family: 'Cairo', sans-serif;
}


.Title-Head{
    color: #6d1c1c;
    font-size: 25px;
    font-family: 'Cairo', sans-serif;
}


.TextForFooter{
    color: #fff;
    font-weight: 500;
    font-family: 'Cairo', sans-serif;
}

.Link{

}

.list-Link li a{
    color: #6d1c1c;
    font-size: 15px;
    font-weight: 500;
    font-family: 'Cairo', sans-serif;
}





.custom-slider {
    height: 360px !important;
}

.carousel-control-prev {
    text-shadow: 2px 2px 4px #000000;
    font-size: 30px;
}

.carousel-inner {
    height: 100%;
}

.carousel-img-container {
    height: 100%;
}


.carousel-item {
    height: 100%;
}

/* img {
    max-width: 100% !important;
    max-height: 100% !important;
    width: auto !important;
} */




.section-ForTitle {
    padding: 20px;
    background-color: #e5e5ca;
    color: #580707;
}

.section-ForTitle {
    text-align: end
}

.title-forSectionP {
    text-align: end;
    font-size: 14px;
}



.section-style {
    text-align: end;
    color: #580707;
    padding: 15px;
    border: 1px solid ;
}

.p-forfont {
    font-weight: 600;
    font-family: 'Cairo', sans-serif;
}


.h3-forDE {
    text-align: end;
    font-size: 15px;
    margin-bottom: 12px;
    padding: 10px;
    border-bottom: 2px solid;
    font-family: 'Cairo', sans-serif;
    font-weight: 700;
}

.p-forfont-last {
    font-family: 'Cairo', sans-serif;
    font-weight: 300;
}

.h5-titleforPage {
    font-family: 'Cairo', sans-serif;
    font-weight: 600;
}

.title-forSection {
    text-align: end;
    font-family: 'Cairo', sans-serif;
    font-weight: 700;
}




.toolbar {
    border-radius: 10px;
    background-color: forestgreen;
    padding: 6px;
    color: #fff;
    margin-right: 50px;
}



.map-container-6 {
    overflow: hidden;
    padding-bottom: 56.25%;
    position: relative;
    height: 0;
}

    .map-container-6 iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }



.btnblock {
    background-color: #580707;
    color: #fff;
    font-family: 'Cairo', sans-serif;
}












/*...............................................*/


/* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

    section .section-title {
        text-align: center;
        color: #007b5e;
        margin-bottom: 50px;
        text-transform: uppercase;
    }

#team .card {
    border: none;
    background: #ffffff;
}






.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

    .frontside .card,
    .backside .card {
        min-height: 312px;
    }

        .backside .card a {
            font-size: 18px;
            color: #007b5e !important;
        }

        .frontside .card .card-title,
        .backside .card .card-title {
            color: #007b5e !important;
        }

        .frontside .card .card-body img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

/*......................................................*/




.contactbtn {
    background-color: #580707;
    padding: 4px;
    color: #fff;
    font-family: 'Cairo', sans-serif;
    margin-top: 26px
}


* {
    box-sizing: border-box;
}

.img-zoom-container {
    position: relative;
}

.img-zoom-lens {
    position: absolute;
    border: 1px solid #d4d4d4;
    /*set the size of the lens:*/
    width: 40px;
    height: 40px;
}

.img-zoom-result {
    border: 1px solid #d4d4d4;
    /*set the size of the result div:*/
    width: 300px;
    height: 300px;
}



.model-no1{
    background-color: #d2d2af;
    color: #6d1c1c;
}


.modeltitle-no1{
    font-weight: 700;
    font-family: 'Cairo', sans-serif;

}
.modeltitle-no1P{
    font-family: 'Cairo', sans-serif;
    font-weight: 700;
    text-align: justify;
}


.lead {
    font-size: 1.25rem;
    font-weight: 500;
    font-family: 'Cairo', sans-serif;
    color: #fff;
}

.modeltitle-no2P{
    color: grey;
    font-weight: 400;
    font-family: 'Cairo', sans-serif;
    font-size: larger;;
}


</style>
<script>
    function imageZoom(imgID, resultID) {
        var img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(resultID);
        /*create lens:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "img-zoom-lens");
        /*insert lens:*/
        img.parentElement.insertBefore(lens, img);
        /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
        function moveLens(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            /*calculate the position of the lens:*/
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            /*prevent the lens from being positioned outside the image:*/
            if (x > img.width - lens.offsetWidth) { x = img.width - lens.offsetWidth; }
            if (x < 0) { x = 0; }
            if (y > img.height - lens.offsetHeight) { y = img.height - lens.offsetHeight; }
            if (y < 0) { y = 0; }
            /*set the position of the lens:*/
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            /*display what the lens "sees":*/
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return { x: x, y: y };
        }
    }
</script>
@endsection
@section('content')
<br /> <br /><br /> <br />

<div class="container">
    <div class="row">
        <div class="col-12" style="text-align: end">
            <a href="{{ route('main')}}" class="Page-Name" >  العودة للصفحة الرئيسية </a>
            <hr class="w-100" />
        </div>
    </div>
</div>
<br /><br />

<div class="container-fluid">
    @error('number_of_parts')
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: end;">
       {{ $message }}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>

        @enderror
    <br />
    <div class="row">
        <div class="col-md-12" style="   margin-bottom: 20px;">
            <h3 class="title-forSection">{{ $advertisement->title }}</h3>
            <p class="title-forSectionP" style="text-align:end; font-family: 'Cairo', sans-serif; font-weight:300;">
{{$advertisement->description}}
            </p>
        </div>

        <div class="col-md-8">

            <div class="row" style="padding:20px">
                <div class="col-12">
                    <h3 class="h3-forDE">معلومات   أساسية </h3>
                </div>
                <div class="col-md-6">



                    <p class="section-style p-forfont">   موعد التسليم: {{ $advertisement->deleveiryTime->description }}    </p>


                    <p class="section-style p-forfont">  الضمان     : {{  $advertisement->active == 1 ? " ساري المفعول" : "انتهى التقديم لهذا الاعلان" }}</p>
                    <p class="section-style p-forfont">    الحالة   : جديد </p>

                </div>
                <div class="col-md-6">

                    <p class="section-style p-forfont">   قسم الإعلان    :  {{ $advertisement->category->title }} </p>


                    <p class="section-style p-forfont">  نوع الإعلان    : {{ $advertisement->advertisementType->title }}</p>

                    <p class="section-style p-forfont"> المدينة   :  {{ $advertisement->city->title }}  </p>






                </div>

                <div class="col-12">
                    <p class="section-style p-forfont">  موعد انتهاء الإعلان :  {{ Carbon\Carbon::parse($advertisement->end_publish_date)->diffForHumans() }}  </p>

                </div>


            </div>


        </div>
        <div class="col-md-4 ">
            <div class="img-slider">
                <div id="carouselExampleIndicators" class="carousel slide custom-slider" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="6" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach (json_decode($advertisement->images) as $key => $image)
                            <div class="carousel-item {{  $key == 0 ? 'active' : '' }}">
                                <div class="carousel-img-container d-flex justify-content-center {{  $key == 0 ? 'img-zoom-container' : '' }}">
                                    <img id="myimage" src="{{ asset('user_images/images/'.$image) }}" class="d-block w-100" alt="..." style="width:300px;height:300px;">
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="carousel-item ">
                            <div class="carousel-img-container d-flex justify-content-center">
                                <img id="myimage" src="https://www.meridalivingrealestate.com/images/casas/2019-03-29_08-18-12_House_MeridaRealEstate09.JPG" class="d-block w-100" alt="..." style="width:300px;height:300px;">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-img-container d-flex justify-content-center">
                                <img src="https://www.meridalivingrealestate.com/images/casas/2019-03-29_08-18-12_House_MeridaRealEstate01.JPG" class="d-block w-100" alt="...">
                            </div>
                        </div> --}}

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br />
    <div class="row" style="margin-top:50px">

        <!-- Team member -->
        <div class="col-md-3">
            <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                <div class="mainflip">
                    <div class="frontside" style="    margin-top: 53px;">
                        <div class="card contact-card" style="background-color:#e5e5ca;">
                            <div class="card-body text-center">
                                <p><img class=" img-fluid" src="{{ asset('user_images/public/'.$advertisement->user->person_image) }}" alt="card image"></p>
                                <h4 class="card-title" style="text-align: center;    font-family: 'Cairo', sans-serif;">{{ $advertisement->user->first_name . " " . $advertisement->user->last_name}}</h4>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center contactbtn" href="{{ route('site.user.show' , ['user' => $advertisement->user->id ]) }}" style="background-color: #580707;padding: 4px;color: #fff;    font-size: 11px;">
                                            الاتصال بالمعلن
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class=" text-xs-center contactbtn" href="{{ route('site.dashboard' , ['user' => $advertisement->user->id ]) }}" style="background-color: #580707;padding: 4px;color: #fff;    font-size: 11px; text-decoration:none;">
                                            مراسلة صاحب الإعلان
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- ./Team member -->
        <div class="col-md-5">
            <div class="col-12">
                <h3 class="h3-forDE">   موقع التسليم  </h3>
            </div>

            <!--Card content-->
            <!--Google map-->
            <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                <div id="map" style="height: 400px">
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="col-12">
                <h3 class="h3-forDE">  السعر   </h3>
            </div>
            <p class="section-style p-forfont" style="background-color: #e5e5ca;border: none">  سعر الحصة :  {{ round($advertisement->cost_of_share , 2) }} ر.س</p>
            <div class="form-group col-md-12">
                <p class="p-ForP" style="  font-family: 'Cairo', sans-serif;font-size: 15px;font-weight: 600;color: #580707;margin-top: 21px; margin-bottom: 20px;">
                    عدد الاعضاء المطلوبين  :

                    <span href="#" class="   toolbar  ">{{ $advertisement->number_of_partners }}</span>
                </p>
                @php
                    $bar_percentage = ($advertisement->userSubscriptions()->sum('number_of_parts') / $advertisement->number_of_partners) *100 ;
                @endphp
                <div class="progress" style="direction: rtl;background-color: #e5e5ca; height: 25px; ">
                    <div class="progress-bar progress-bar-striped " role="progressbar" style=" font-family: 'Cairo', sans-serif;width: {{ $bar_percentage }}%;background-color: {{ $bar_percentage ==100 ?"#28a745" : "#6d1c1c"}};" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">تبقى   {{ $advertisement->number_of_partners - $advertisement->userSubscriptions()->sum('number_of_parts') }} اعضاء</div>
                </div>


            </div>
@auth

            @if (auth()->user()->alternative_phone !== null && $advertisement->active && $advertisement->end_publish_date >= Carbon\Carbon::now() &&  $bar_percentage !== 100)
            <div class="col-12">
                <form id="subscription_form" method="post" action="{{route('advertismenets.add.subscription' , ['user'=>auth()->id() , 'advertisement'=>$advertisement->id])}}">
                @csrf
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-default btnblock btn-block" data-toggle="modal" data-target="#exampleModalLong" style="margin-top:27px">
                                تقديم طلب مشاركة
                            </button>
                        </div>
                        <div class="col" >

                            <h6 class="p-forfont" style="  text-align: end; color: #580707;">عدد الحصص</h6>

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="" style=" border-color: #fff;   background-color: #580707;">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="number_of_parts" class="form-control input-number" value="{{ $advertisement->number_of_partners }}" min="1" max="{{ $advertisement->number_of_partners }}">

                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" style="    border-color: #fff;background-color: #580707;">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </div>



                        </div>

                    </div>
                    {{-- @error('number_of_parts')
                    <div class="row" style="direction: rtl">
                        <div class="alert alert-danger" style="text-align: right">{{$message}}</div>
                    </div>
                        @enderror --}}
                </form>
                <br>
                {{-- <div class="row">
                    <div class="col">
                        <label class="Label-AddADS Productsection" for="Productsection"> التبليغ عن هذا الاعلان </label>
                        <select id="ProductDesc2" name="Section" class="form-control selectpicker inputs-AddADS Productsection" title=" اختر  القسم   ">

                            <option >مخالف للشرع  </option>
                            <option  > ربا </option>
                            <option  >يحتوي على اعلانات  تجارية كاذية</option>
                            <option  >  المنتج مسروق </option>
                        </select>
                    </div>
                </div> --}}
            </div>
            @endif


            @endauth

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="direction:rtl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header model-no1">
                <h5 class="modal-title modeltitle-no1" id="exampleModalLongTitle">تحديد المسؤولية  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: justify;">
                <p class="modeltitle-no1P">

                    بموجب هذا فإنت توافق على أن  تذك شروط الأعلان
                    بأن المسلمون على شروطهم وأن طلب المشاركة سيتٌرتب عليهٌ شراء طالب الإعلان
                    السلعة على حسابه وأن الذمة لا تبرأ بالتراجع عن المشاركة دون سبب يعٌود لطالب
                    الشراكة أو لعيبٌ في السلعة وفي حال التراجع لابد من استئذان المعلن .
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="    background-color:  #d2d2af;border-color: #6d1c1c;color: #6d1c1c; margin-left: 8px;"> تراجع عن المشاركة </button>
                <button type="submit" form="subscription_form"  class="btn btn-primary" data-toggle="modal" data-target="#centralModalSuccess" onclick="Popup()" style="background-color: #6d1c1c;border-color: #6d1c1c;"> تأكيد المشاركة </button>
            </div>
        </div>
    </div>
</div>





@endsection
@section('js')
<script src="{{ asset('assets/Js/bootstrap-select.js')}}"></script>


<script>
    $(document).ready(function () {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function (e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });


    function Popup() {
        $("#exampleModalLong").modal("hide");
    }
</script>
<script>
    // Initiate zoom effect:
    imageZoom("myimage", "myresult");

</script>
<script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').value = {{ $advertisement->lat }};
    $('#longitude').value = {{ $advertisement->long }};
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
        // infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: @php echo $advertisement->lat @endphp,
                    lng: @php echo $advertisement->long @endphp
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjAGp24IL8hsAfS5-f004Pc2cWJDn5etM&libraries=places&callback=initAutocomplete&language=ar&region=KSAasyncdefer"></script>


@endsection
