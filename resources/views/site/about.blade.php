@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/style3.css')}}" rel="stylesheet" />

<link href="{{ asset('assets/Css/Policy.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/AboutWebsite.css')}}" rel="stylesheet" />


<link href="{{ asset('assets/Css/StyleSignup.css')}}" rel="stylesheet" />





@endsection
@section('content')
    <!--content page-->
    <div class="container login-container" style="margin-top:120px;">
        <div class="row">

            <div class="col-md-12 text-right" style="direction: rtl;">
                <h3 class="title-form-Terms">      فكرة منصة اشترينا </h3>



                            {!! $settings->idea ?? "" !!}

<br><br>

                <div class="row">

                    <div class="col-md-6">
                        <h3 class="title-form-AboutWeb"> أهداف المنصة  </h3>


                    </div>
                    <div class="col-md-6"></div>

                </div>

                         {!! $settings->goals ?? "" !!}



            </div>
        </div>
    </div>
    <br /><br /><br />


@endsection
