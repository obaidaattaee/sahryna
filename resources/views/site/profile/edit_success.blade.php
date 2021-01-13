@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/personalDetailes.css')}}" rel="stylesheet">

@endsection
@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border: 0px;">
                <h2 id="heading">استكمال بياناتك الشخصية</h2>
                <fieldset>

                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                            </div>
                            <div class="col-5">
                                <h2 class="steps">  4 - 4</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">

                            </div>
                            <div class="col-5">

                            </div>
                        </div> <br><br>
                        <h2 class="purple-text text-center"><strong>تم الانتهاء بنجاح شكرا لك </strong></h2> <br>
                        <div class="row justify-content-center">
                            <div class="col-3"></div>
                        </div> <br><br>
                        <div class="row justify-content-center">
                            <div class="col-7 text-center">
                                <h5 class="purple-text text-center"> تم النجاح في استكمال بياناتك  </h5>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection
