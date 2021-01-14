@extends('site.layouts.app')
@section('css')
<style>

        /*search box css start here*/
    .search-sec{
        padding: 2rem;
    }
    .search-slt{
        display: block;
        width: 100%;
        font-family: cairo;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #55595c;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    .wrn-btn{
        width: 100%;
        font-size: 16px;
        font-weight: 400;
        text-transform: capitalize;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    @media (min-width: 992px){
        .search-sec{
            position: relative;
            top: -114px;
            background: rgba(26, 70, 104, 0.51);
        }
    }

    @media (max-width: 992px){
        .search-sec{
            background: #1A4668;
        }
    }
    .hover-p:hover{
        cursor: pointer;
    }
</style>

@endsection
@section('content')

@php
        $settings = \App\Models\Settings::first();
    @endphp

<!--A moving bar-->
<div class="container-fluid" style="margin-top: 118px;">
    <div class="row">
        <marquee class="for-marquee" direction="left" width="100%" height="50" style="background-color: #dfdfd3" bgcolor="#CCC" scrolldelay="80" scrollamount="3" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);">
            <p>{{ $settings->wellcom_message }}</p>
        </marquee>
    </div>
</div>



<!--A static bar-->



 {{-- <div class="col-12"  style="text-align: end;margin-top: 20px;">
    <a href="{{ route('main')}}" class="p-forpage" >الصفحة الرئيسية</h5>
</div> --}}
{{-- <hr class="w-100" />
<br /> --}}
<!--img slide-->

@if ($settings->slider_images != null)

<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach (json_decode($settings->slider_images) as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? "active" : "" }}">
                <img src="{{ asset('user_images/settings/'.($slider ?? '')) }}" style="max-height: 500px" class="d-block w-100" alt="...">
            </div>
            @endforeach


        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="search-sec">

@else
<section class="search-sec" style="margin-top: 115px">
@endif

    <div class="container">
        <form action="" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row"  style="border-radius: 20px">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" name="q" placeholder="كلمة البحث" style="direction: rtl">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" style="direction: rtl" name="category" id="exampleFormControlSelect1">
                                <option value="" style="direction: rtl">اختر القسم</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt"  style="direction: rtl" name="city" id="exampleFormControlSelect1">
                                <option value="" style="direction: rtl"> اختر المدينة</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{ $city->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn wrn-btn" style="background-color: #7d0505;color: white">بحث</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!--content-->
<h1 style="background-color: #580707;margin: 0px 20px 20px 20px ;color: white;padding: 10px;border-radius: 10px;font-family: cairo;font-size: 28px;text-align: right;padding-right: 35px">   احدث  طلبات المشاركة</h1>

@if(count($trinds_advertisements) > 0)
<div class="container-fluid" style="direction: rtl">
   <div class="row Row-Cards ml-1">


    @foreach ($trinds_advertisements as $advertisement)
        <div class="col-md-3 " style="margin-top:20px;margin-bottom:20px">

            <div class="card crad-no1 Cards"  >
            <a href="{{ route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title]) }}">
                <img class="card-img-top" src="{{ asset('user_images/images/'.(json_decode($advertisement->images)[0] ?? ""))}}"  alt="Card image cap" style="max-height: 250px;min-height: 250px">

                <div class="card-img d-flex align-items-center">
                    <div>
                        <h5 class="h2 card-title   PriceFor-ADs-exp1" >    ر. س <span class="number"> &nbsp; {{ $advertisement->retail_price }} </span></h5>
                    </div>
                </div>
            </a>

                <div class="card-body">
                    <p  style="font-size: 12px;text-align: right" class="hover-p" data-toggle="popover" title="التفاصيل" data-content="{{  mb_strimwidth($advertisement->description , 0 , 250 , '....') }}">اضغط هنا لمشاهدة التفاصيل</p>
                    <h5 class="card-title" style="text-align: right">{{ $advertisement->title }}</h5>
                        <p class="card-text TwoProp" style="text-align: left">
                            <span class="p-forprice" style="    float: right;">سعر الحصة :  {{ round($advertisement->cost_of_share , 2) }}</span>
                            <span class="p-forcity p-ForP" style="text-align: left" >     مدينة {{ $advertisement->city->title }}  <i class="fas fa-map-marker-alt"></i></span>
                            </p>



                    <div class="card-text">
                        <div class="form-row" style="    margin-top: -3px;">

                            <div class="form-group col-md-12">
                                <p class="p-ForP" style="text-align: right; font-size: 12px">عدد الاعضاء المطلوبين : <span>{{$advertisement->number_of_partners}}</span> </p>

                                <div class="progress"  >
                                    @php
                                        $bar_percentage = ($advertisement->userSubscriptions()->sum('number_of_parts') / $advertisement->number_of_partners) *100 ;
                                    @endphp
                                    <div class="progress-bar progress-bar-striped " role="progressbar" style="width: {{ $bar_percentage == 0 ? 100 : $bar_percentage }}%;background-color: '#6d1c1c' ;background-color:{{ $bar_percentage == 0 ?   "#6d1c1c" : "#28a745" }};"  aria-valuemin="0" aria-valuemax="100">تبقى   {{ $advertisement->number_of_partners - $advertisement->userSubscriptions()->sum('number_of_parts') }} اعضاء</div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <p class="card-text Card-Footer" style="    padding: 1px">
                        <small class="text-muted">
                            <span class="text-muted dataEnd">  باقي على انتهاء الاعلان  {{ Carbon\Carbon::parse($advertisement->end_publish_date)->diffForHumans() }}   </span>
                            <i class="fa fa-clock-o" class="text-muted" aria-hidden="true"></i>
                    </small></p>

                </div>
            </div>
        </div>
    @endforeach





</div>

</div>

@else
<center>
    <div class="alert alert-danger col-8" style="text-align: center">عذرا لا يوجد اعلانات</div>
</center>
@endif
<h1 style="background-color: #580707;margin: 0px 20px 20px 20px ;color: white;padding: 10px;border-radius: 10px;font-family: cairo;font-size: 28px;text-align: right;padding-right: 35px">  جميع طلبات المشاركة</h1>

@if(count($buyers_advertisements) > 0)
    <div class="container-fluid" style="direction: rtl">
        <div class="row Row-Cards ml-1">


        @foreach ($buyers_advertisements as $advertisement)
            <div class="col-md-3 " style="margin-top:20px;margin-bottom:20px">

                <div class="card crad-no1 Cards"  >
                <a href="{{ route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title]) }}">
                    <img class="card-img-top" src="{{ asset('user_images/images/'.(json_decode($advertisement->images)[0] ?? ""))}}"  alt="Card image cap" style="max-height: 250px;min-height: 250px">

                    <div class="card-img d-flex align-items-center">
                        <div>
                            <h5 class="h2 card-title   PriceFor-ADs-exp1" >    ر. س <span class="number"> &nbsp; {{ $advertisement->price }} </span></h5>
                        </div>
                    </div>
                </a>

                    <div class="card-body">
                        <p  style="font-size: 12px;text-align: right" class="hover-p" data-toggle="popover" title="التفاصيل" data-content="{{  mb_strimwidth($advertisement->description , 0 , 250 , '....') }}">اضغط هنا لمشاهدة التفاصيل</p>
                        <h5 class="card-title" style="text-align: right">{{ $advertisement->title }}</h5>
                            <p class="card-text TwoProp" style="text-align: left">
                                <span class="p-forcity p-ForP" style="text-align: left" >     مدينة {{ $advertisement->city->title }}  <i class="fas fa-map-marker-alt"></i></span>
                                </p>



                        {{-- <div class="card-text">
                            <div class="form-row" style="    margin-top: -3px;">

                                <div class="form-group col-md-12">
                                    <p class="p-ForP" style="text-align: right; font-size: 12px">عدد الاعضاء المطلوبين : <span>{{$advertisement->number_of_partners}}</span> </p>

                                    <div class="progress"  >
                                        @php
                                            $bar_percentage = ($advertisement->userSubscriptions()->sum('number_of_parts') / $advertisement->number_of_partners) *100 ;
                                        @endphp
                                        <div class="progress-bar progress-bar-striped " role="progressbar" style="width: {{ $bar_percentage == 0 ? 100 : $bar_percentage }}%;background-color: '#6d1c1c' ;background-color:{{ $bar_percentage == 0 ?   "#6d1c1c" : "#28a745" }};"  aria-valuemin="0" aria-valuemax="100">تبقى   {{ $advertisement->number_of_partners - $advertisement->userSubscriptions()->sum('number_of_parts') }} اعضاء</div>
                                    </div>
                                </div>


                            </div>
                        </div> --}}
                        <p class="card-text Card-Footer" style="    padding: 1px">
                            <small class="text-muted">
                                <span class="text-muted dataEnd"> {{ is_null($advertisement) ? "" : "باقي على انتهاء الاعلان" . Carbon\Carbon::parse($advertisement->end_publish_date)->diffForHumans()  }}    </span>
                                <i class="fa fa-clock-o" class="text-muted" aria-hidden="true"></i>
                        </small></p>

                    </div>
                </div>
            </div>
        @endforeach





        </div>

    </div>
@else
<center>
    <div class="alert alert-danger col-8" style="text-align: center">عذرا لا يوجد اعلانات</div>
</center>
@endif

<!--content-->
<h1 style="background-color: #580707;margin: 0px 20px 20px 20px ;color: white;padding: 10px;border-radius: 10px;font-family: cairo;font-size: 28px;text-align: right;padding-right: 35px">  جميع طلبات المشاركة</h1>

@if(count($advertisements) > 0)
<div class="container-fluid" style="direction: rtl">
   <div class="row Row-Cards ml-1">


    @foreach ($advertisements as $advertisement)
        <div class="col-md-3 " style="margin-top:20px;margin-bottom:20px">

            <div class="card crad-no1 Cards"  >
            <a href="{{ route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title]) }}">
                <img class="card-img-top" src="{{ asset('user_images/images/'.(json_decode($advertisement->images)[0] ?? ""))}}"  alt="Card image cap" style="max-height: 250px;min-height: 250px">

                <div class="card-img d-flex align-items-center">
                    <div>
                        <h5 class="h2 card-title   PriceFor-ADs-exp1" >    ر. س <span class="number"> &nbsp; {{ $advertisement->retail_price }} </span></h5>
                    </div>
                </div>
            </a>

                <div class="card-body">
                    <p  style="font-size: 12px;text-align: right" class="hover-p" data-toggle="popover" title="التفاصيل" data-content="{{  mb_strimwidth($advertisement->description , 0 , 250 , '....') }}">اضغط هنا لمشاهدة التفاصيل</p>
                    <h5 class="card-title" style="text-align: right">{{ $advertisement->title }}</h5>
                        <p class="card-text TwoProp" style="text-align: left">
                            <span class="p-forprice" style="    float: right;">سعر الحصة :  {{ round($advertisement->cost_of_share , 2) }}</span>
                            <span class="p-forcity p-ForP" style="text-align: left" >     مدينة {{ $advertisement->city->title }}  <i class="fas fa-map-marker-alt"></i></span>
                            </p>



                    <div class="card-text">
                        <div class="form-row" style="    margin-top: -3px;">

                            <div class="form-group col-md-12">
                                <p class="p-ForP" style="text-align: right; font-size: 12px">عدد الاعضاء المطلوبين : <span>{{$advertisement->number_of_partners}}</span> </p>

                                <div class="progress"  >
                                    @php
                                        $bar_percentage = ($advertisement->userSubscriptions()->sum('number_of_parts') / $advertisement->number_of_partners) *100 ;
                                    @endphp
                                    <div class="progress-bar progress-bar-striped " role="progressbar" style="width: {{ $bar_percentage == 0 ? 100 : $bar_percentage }}%;background-color: '#6d1c1c' ;background-color:{{ $bar_percentage == 0 ?   "#6d1c1c" : "#28a745" }};"  aria-valuemin="0" aria-valuemax="100">تبقى   {{ $advertisement->number_of_partners - $advertisement->userSubscriptions()->sum('number_of_parts') }} اعضاء</div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <p class="card-text Card-Footer" style="    padding: 1px">
                        <small class="text-muted">
                            <span class="text-muted dataEnd">  باقي على انتهاء الاعلان  {{ Carbon\Carbon::parse($advertisement->end_publish_date)->diffForHumans() }}   </span>
                            <i class="fa fa-clock-o" class="text-muted" aria-hidden="true"></i>
                    </small></p>

                </div>
            </div>
        </div>
    @endforeach





</div>

</div>

@else
<center>
    <div class="alert alert-danger col-8" style="text-align: center">عذرا لا يوجد اعلانات</div>
</center>
@endif
{{ $advertisements->links() }}
{{--
<nav aria-label="Page navigation example">
    <ul class="pagination pg-blue justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item">
            <a class="page-link">Next</a>
        </li>
    </ul>
</nav> --}}


@endsection
@section('js')
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
    $(function () {
  $('.example-popover').popover({
        container: 'body'
    });
    });
</script>
@endsection
