@extends('site.layouts.app')
@section('css')

<link href="{{ asset('assets/Css/bootstrap-select.css')}}" rel="stylesheet" />


<link href="{{ asset('assets/Css/Add-ADS.css')}}" rel="stylesheet" />

    <link href="{{ asset('assets/Css/StyleLogin.css') }} " rel="stylesheet" />

@endsection
@section('content')


    <!--content page-->
    <div class="container login-container" style="margin-top:120px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 login-form-1"
                style="border-radius: 10px; border: 3px solid #e5e5ca;margin-left: 15px; margin-right: 15px;">
                <h3 class="title-form">تسجيل اشتراك</h3>

                <form dir="rtl" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="الاسم كامل"
                            value="{{ old('first_name') ?? '' }}" style="    font-size: 1.1rem;" />
                    </div>
                    @error('first_name')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    {{-- <div class="form-group">
                        <input type="text" name="last_name" class="form-control" placeholder="الاسم الاخير"
                            value="{{ old('last_name') ?? '' }}" style="    font-size: 1.1rem;" />
                    </div>
                    @error('last_name')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror --}}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني"
                            value="{{ old('email') ?? '' }}" style="    font-size: 1.1rem;" />
                    </div>
                    @error('email')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="form-group" >
                        <input type="text" name="phone" class="form-control" placeholder="966XXXXXXXXX"
                            value="{{ old('phone') ?? '' }}" style="    font-size: 1.1rem;" />
                    </div>
                    @error('phone')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    {{-- <div class="form-group">
                        <input type="text" name="person_id" class="form-control" placeholder="الرقم الوطني (9 ارقام)"
                            value="{{ old('person_id') ?? '' }}" style="    font-size: 1.1rem;" />
                    </div>
                    @error('person_id')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror --}}
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder=" كلمة المرور " value=""
                            style="   font-size:  1.1rem;" />
                    </div>
                    @error('password')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder=" تاكيد كلمة المرور " value="" style="   font-size:  1.1rem;" />
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger" style="text-align: right" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="row" style="margin-right: -50px;">
                        <div class="col">
                            <ol class="list-unstyled ol-List-Item">
                                <li class="ol-list">
                                    <label class="form-check-label label-checkbox1">العضويات </label>

                                </li>
                                @foreach ($roles as $role)
                                    <li class="ol-list" style="margin-right: 12px;">
                                        <input class="form-check-input " value="{{ $role->id }}" type="radio" name="role" id="gridRadios0"
                                            value="1" checked="">

                                        <label class="form-check-label label-checkbox2" for="gridRadios0">
                                            {{ $role->display_name }}
                                        </label>

                                    </li>
                                @endforeach
                            </ol>
                        </div>




                    </div>


                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="تسجيل"
                            style="width: 100%; margin-top: 10px; font-size:12px; padding:10px;   background-color: #6d1c1c !important;font-family: 'Cairo', sans-serif;" />
                    </div>

                </form>
            </div>

        </div>
    </div>
    <br /><br /><br />

@endsection
@section('js')
<script src='{{ asset("assets/Js/PersonalDetailes.js")}}'></script>
@endsection
