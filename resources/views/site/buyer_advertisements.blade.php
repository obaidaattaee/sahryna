@extends('site.layouts.app')

@section('content')

<br>
<!--content -->



<br><br>
<div class="container">
    <div class="row">


    </div>
</div>


<br>
@if(count($advertisements) > 0)
<div class="container-fluid" style="direction: rtl">
    <h1 style="background-color: #580707;color: white;padding: 10px;border-radius: 10px;font-family: cairo;font-size: 28px;text-align: right;padding-right: 35px">  جميع المشاركات</h1>

   <div class="row Row-Cards ml-1">


    @foreach ($advertisements as $advertisement)
        <div class="col-md-3 " style="margin-top:20px;margin-bottom:20px">

            <div class="card crad-no1 Cards"  >
            <a href="{{ route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title]) }}">
                    <img class="card-img-top" src="{{ asset('user_images/images/'.(json_decode($advertisement->images)[0] ?? ""))}}"  alt="Card image cap" style="max-height: 250px;min-height: 250px">

                <div class="card-img-overlay d-flex align-items-center">
                    <div>
                        <h5 class="h2 card-title   PriceFor-ADs-exp1" >    ر. س <span class="number"> &nbsp; {{ $advertisement->wholesale_price }} </span></h5>
                    </div>

                </div>

                <div class="card-body">
                    <a href="Sign-up Page.html"> <h5 class="card-title">{{ $advertisement->title }}</h5></a>
                    <p class="card-text p-ForCards" style="margin-bottom: 2px;margin-top: -8px; ">{{  mb_strimwidth($advertisement->description , 0 , 10 , '....') }}</p>


                        <p class="card-text TwoProp" >
                            <span class="p-forprice" style="    float: right;">سعر الحصة :  {{ round($advertisement->cost_of_share , 2) }}</span>
                            <span class="p-forcity" >     مدينة {{ $advertisement->city->title }}  <i class="fas fa-map-marker-alt"></i></span>
                            </p>



                    <div class="card-text">
                        <div class="form-row" style="    margin-top: -3px;">

                            <div class="form-group col-md-12">
                                <p class="p-ForP">عدد الاعضاء المطلوبين : <span>{{$advertisement->number_of_partners}}</span> </p>

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
            </a>
        </div>
    @endforeach





</div>

</div>

@else
@endif
{{-- @if (count($advertisements) > 0)



<div class="container">
    <div class="row">
        @foreach ($advertisements as $advertisement)
            <div class="col-md-6" >
                <a href="{{route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title])}}">

                <div class="card promoting-card" style="margin-bottom: 20px;">

                    <!-- Card content -->
                    <div class="card-body d-flex flex-row" style="direction: rtl;">

                    <!-- Avatar -->
                    <img src="{{ asset('user_images/public/'.auth()->user()->person_image) }}" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">

                    <!-- Content -->
                    <div>

                        <!-- Title -->
                        <h4 class="card-title font-weight-bold mb-2 ProductDes"> {{ $advertisement->title }}</h4>
                        <!-- Subtitle -->
                        <p class="card-text"><i class="far fa-clock pr-2"></i>   {{ $advertisement->publish_date }}</p>

                    </div>

                    </div>

                    <!-- Card image -->
                    <div class="view overlay">
                    <img class="card-img-top rounded-0" src="{{ asset('user_images/images/' . json_decode($advertisement->images)[0]) }}" alt="Card image cap">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <!-- Card content -->
                    <div class="card-body">

                    <div class="">

                        <!-- Text -->
                        <p class="card-text  ProductDes" id="ProductDes" style="font-weight: 500;font-family: 'Cairo', sans-serif;color: #580707;text-align: end;"> {{ $advertisement->description }}</p>
                        <!-- Button -->

                    </div>

                    </div>

                </div>
            </a>
            </div>
        @endforeach



    </div>
</div>

@else
<center>
    <div class="alert alert-danger col-8" style="text-align: center">عذرا لا يوجد اعلانات</div>
</center>
@endif --}}




















<br /> <br /> <br />
@endsection
