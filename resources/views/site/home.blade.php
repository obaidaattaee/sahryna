@extends('site.layouts.app')

@section('content')


<!--A moving bar-->
<div class="container-fluid" style="margin-top: 118px;">
    <div class="row">
        <marquee class="for-marquee" direction="left" width="100%" height="50" bgcolor="#CCC" scrolldelay="80" scrollamount="3" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);">
            <p>اهلا وسهلا في منصتنا </p>
        </marquee>
    </div>
</div>



<!--A static bar-->
<div class="container-fluid Dis-Ds-lab" style="margin-top:0px; background-color:#ecf0f1;">
    <div class="row" style="padding:10px">
        <div class="col-md-1" style="    margin-top: 15px;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    اختر المدينة
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                    <a class="dropdown-item" href="#"> الرياض</a>
                    <a class="dropdown-item" href="#">  الجدة</a>
                    <a class="dropdown-item" href="#"> مكة المكرمة   </a>
                    <a class="dropdown-item" href="#">  الزلفي</a>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>

        <div class="col-md-2">


        </div>
        <div class="col-md-3" style="    margin-top: 15px;">
            <!-- Search form -->
            <div class="input-group mb-3" style="margin-bottom:0px">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>




 {{-- <div class="col-12"  style="text-align: end;margin-top: 20px;">
    <a href="{{ route('main')}}" class="p-forpage" >الصفحة الرئيسية</h5>
</div> --}}
{{-- <hr class="w-100" />
<br /> --}}
<!--img slide-->
<div class=" container-fluid" >
    <div class="row text-center">
        <div id="carouselExampleIndicators" class="carousel slide img-slider" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/img/8240786d-c31f-4036-80e1-033e137f04e6.jpg') }}"  alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/c1b77235-3aec-44d0-8da2-806cfa1af443.jpg')}}"  alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/IL201906281038533186.jpg')}}"  alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="img/#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<br /> <br /> <br /> <br />






<!--content-->

<div class="container-fluid">
   <div class="row Row-Cards">

@foreach ($advertisements as $advertisement)
<div class="col-md-3" style="margin-top:20px;margin-bottom:20px">

    <div class="card crad-no1 Cards"  >
       <a href="{{ route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title]) }}" target="_blank">
            <img class="card-img-top" src="{{ asset('user_images/images/'.json_decode($advertisement->images)[0])}}"  alt="Card image cap" style="max-height: 250px">

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
                        <p class="p-ForP">عدد الاعضاء المطلوبين </p>
                        <div class="progress"  >
                            <div class="progress-bar progress-bar-striped " role="progressbar" style="width: 75%;background-color: #6d1c1c;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">تبقى   3 اعضاء</div>
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
