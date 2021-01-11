@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/StyleLogin.css') }} " rel="stylesheet" />

@endsection
@section('content')
<div class="container login-container" style="margin-top:120px;">
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6 login-form-1" style="border-radius: 10px; border: 3px solid #e5e5ca;margin-left: 15px; margin-right: 15px;">
            <h3 class="title-form">كلمة المرور الجديدة </h3>


                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" placeholder="البريد الالكتروني" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" style="font-size: 1.1rem;text-align: right" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" placeholder="كلمة المرور الجديدة" type="password" style="font-size: 1.1rem;text-align: right" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="تاكيد كلمة المرور" type="password" style="font-size: 1.1rem;text-align: right" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btnSubmit">
                                    اعادة تعيين كلمة المرور
                                </button>
                            </div>
                        </div>
                    </form>

        </div>
    </div>
</div>
@endsection
