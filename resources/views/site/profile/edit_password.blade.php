@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/personalDetailes.css')}}" rel="stylesheet">

@endsection

@section('content')


<br><br><br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border: 0px;">
                <h2 id="heading">تعديل كلمة المرور </h2>
                <form id="msform" style="direction: rtl !important;" enctype="multipart/form-data" method="post" action="{{ route('my.profile.update.password' , ['user' => $user->id])}}">
                    <!-- progressbar -->
                    @csrf
                    @method('POST')

                    <fieldset>
                        <div class="form-card">
                            <label class="fieldlabels">كلمة المرور الحالية </label>
                            <input class="input-section1" type="password" name="current_password" required value="{{ old('current_password') ?? '' }}" placeholder="كلمة المرور الحالية" />
                            @error('current_password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <label class="fieldlabels">  كلمة المرور الجديدة</label>
                            <input  class="input-section1" type="password" name="password" required value="{{ old('password')  ?? "" }}" placeholder="كلمة المرور الجديدة " />
                            @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <label class="fieldlabels"> كلمة المرور الجديدة الجديدة </label>
                            <input class="input-section1" type="password" name="password_confirmation" required value="{{ old('password_confirmation') ?? '' }}" placeholder="كلمة المرور الجديدة الجديدة" />
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="submit" class=" action-button"  value="تعديل" />
                    </fieldset>




                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src='{{ asset("assets/Js/PersonalDetailes.js")}}'></script>
@endsection
