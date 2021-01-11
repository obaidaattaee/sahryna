@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/StyleLogin.css') }} " rel="stylesheet" />

@endsection
@section('content')
<div class="container login-container" style="margin-top:120px;">
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6 login-form-1" style="border-radius: 10px; border: 3px solid #e5e5ca;margin-left: 15px; margin-right: 15px;">
            <h3 class="title-form">استعادة كلمة المرور </h3>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder=" البريد الالكتروني  " value="" style="font-size: 1.1rem;text-align: right" name="email"/>
                            @error('email')
                            <div class="alert alert-danger" style="text-align: right" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btnSubmit">
                                    استعادة كلمة المرور
                                </button>
                        </div>
                    </form>
        </div>

    </div>
</div>
@endsection
