@extends('site.layouts.app')

@section('css')
<link href="{{ asset('assets/Css/Add-ADS.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/HomePage.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/ExpiredADS.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/ReceiveProduct.css')}}" rel="stylesheet" />
@endsection
@section('content')
<br /> <br /><br /> <br />
<center>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="Security" >
        <div class="Header-Page">

            <h3 class="Page-title">  تفاصيل استلام المنتج    </h3>
           </div>
          <div class="row">
              <div class="col-md-6 text-right">

               <p class="text-PageSection">{{ $contribute->user->user_name}} </p>
               <p class="text-PageSection">{{ $contribute->advertisement->id }} </p>
               <p class="text-PageSection">{{ $contribute->advertisement->title }} </p>
               <p class="text-PageSection">{{ $contribute->advertisement->description }} </p>
               <p class="text-PageSection"> {{ $contribute->advertisement->address }}  </p>
               <p class="text-PageSection">{{ $contribute->advertisement->cost_of_share }}</p>
               <p class="text-PageSection">{{ $contribute->number_of_parts }}</p>
               <p class="text-PageSection">{{ $contribute->number_of_parts * $contribute->advertisement->cost_of_share }}</p>
              </div>
              <div class="col-md-6 text-right">

               <p class="text-PageSection">  اسم المشارك  </p>
               <p class="text-PageSection">  رقم الاعلان   </p>
               <p class="text-PageSection">  عنوان الاعلان   </p>
               <p class="text-PageSection">  وصف الاعلان   </p>
               <p class="text-PageSection"> مكان التسليم </p>
               <p class="text-PageSection">   سعر الحصة   </p>
               <p class="text-PageSection">عدد الحصص المطلوبة   </p>
               <p class="text-PageSection">اجمالي الحصص  </p>

              </div>
          </div>
          @if (in_array($contribute->status , [0 , 2])  )
          @else
            <div class="form-group">
                <form action="{{route('contribute.complete.verify')}}" method="POST">
                    <input type="hidden" name="id" value="{{$contribute->id}}">
                    @csrf
                    <button type="submit" class="btn btn-default" style="color: #fff; font-weight: 500;background-color: #580707;">تاكيد الاستلام </button>
                </form>

            </div>
          @endif









       </div>

        </div>


        <div class="col-md-2"></div>
    </div>
</div>

</center>
@endsection
