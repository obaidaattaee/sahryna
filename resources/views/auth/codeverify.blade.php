@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/StyleLogin.css') }} " rel="stylesheet" />

@endsection
@section('content')
<br><br><br><br>
<!--content page-->
<div class="container login-container" style="margin-top:120px;">
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6 login-form-1" style="border-radius: 10px; border: 3px solid #e5e5ca;margin-left: 15px; margin-right: 15px;">
            <h3 class="title-form">تاكيد الهوية </h3>

            <form method="POST" action="{{ route('phone.verification') }}" dir="rtl">



                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="ادخل كود التاكيد" value="" style="font-size: 1.1rem;" name="code"/>
                    @error('code')
                    <div class="alert alert-danger" style="text-align: right" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror

                </div>

                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="تاكيد"  />
                </div>

            </form>
            <div class="form-group">
                <a href="{{ route('code.resend') }}" class="ForgetPwd" >ارسال الكود مرة اخرى</a>
            </div>
        </div>

    </div>
</div>
@endsection
