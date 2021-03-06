@extends('site.layouts.app')

@section('content')
<br><br>
{{-- {{ dd($user->advertisements )}} --}}
<br><br>
<div class="container">
    <div class="row">

      <div class="col-md-12" >
        <div class="media border p-3" style=" background-color: #c4c4a3; margin-top: 10px;margin-bottom: 40px; border: 1px solid #580707;">
            <div class="media-body">
              <h4 class="Text-Card">{{ $user->user_name }} <small> <i>    </i></small></h4>

            </div>
            <img src="{{ asset('user_images/public/'.$user->person_image)}}" alt="John Doe" class="ml-3 mt-3 rounded-circle" style="width:60px; height: 60px;">
          </div>
      </div>
    </div>
</div>




<hr class="w-100">

<br>




<div class="container">
  <div class="row">
    @foreach ($user->advertisements as $advertisement)
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
            <img class="card-img-top rounded-0" style="max-height: 300px" src="{{ asset('user_images/images/' . json_decode($advertisement->images)[0]) }}" alt="Card image cap">
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




@endsection
