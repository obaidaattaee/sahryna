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


@if (count($advertisements) > 0)



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
                        <div class="col col-forText">

                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>


                        </div>
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
@endif




















<br /> <br /> <br />
@endsection
