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
                <h2 id="heading">استكمال بياناتك الشخصية</h2>
                <p>املأ كل حقول النموذج للانتقال إلى الخطوة التالية</p>
                <form id="msform" style="direction: rtl;" enctype="multipart/form-data" method="post" action="{{ route('my.profile.update' , ['user' => $user->id])}}">
                    <!-- progressbar -->
                    @csrf
                    @method('POST')
                    <ul id="progressbar">

                        <li class="active"  id="confirm"><strong>إنهاء</strong></li>
                        <li  class="active" id="payment"><strong>صورة</strong></li>
                        <li class="active"  id="payment"><strong>بوابة الدفع اللكتروني</strong></li>
                        <li  class="active" id="personal"><strong>معلومات شخصية</strong></li>


                    </ul>



                    <div class="progress" >
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"  style="background-color: #580707;"></div>
                    </div> <br> <!-- fieldsets -->

                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">معلومات شخصية:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">  1 - 4</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">الاسم الاول </label>
                            <input class="input-section1" type="text" name="first_name" value="{{ old('first_name') ?? $user->first_name ?? '' }} " placeholder="الاسم الاول" />
                            @error('first_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <label class="fieldlabels">  الكنية</label>
                        <input  class="input-section1" type="text" name="last_name" value="{{ old('last_name') ?? $user->last_name ?? "" }}" placeholder="الكنية " />
                        @error('last_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                             <label class="fieldlabels">  رقم الاتصال</label>
                        <input class="input-section1" type="text" name="phone" value="{{ old('phone') ?? $user->phone ?? '' }}" placeholder="رقم الاتصال" />
                        @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                             <label class="fieldlabels"> رقم الاتصال البديل</label>
                        <input class="input-section1"     type="text" name="alternative_phone" value="{{ old('alternative_phone') ?? $user->alternative_phone ?? '' }}" placeholder="رقم الاتصال البديل" />
                        @error('alternative_phone')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                         <input type="button" name="next" class="next action-button" value="التالي" /> <input type="button" name="previous" class="previous action-button-previous" value="السابق" />
                    </fieldset>


                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">بوابة الدفع الاكتروني</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">  2 - 4</h2>
                                </div>
                            </div>

                            <label class="fieldlabels">مالك بطاقة</label>
                             <input class="input-section1" type="text" name="card[owner_card_name]" value="{{ old('owner_card_name') ?? $user->payment_data['owner_card_name'] ?? '' }}" placeholder="اسم مالك البطاقة" />
                             @error('card.owner_card_name')
                             <div class="alert alert-danger">{{$message}}</div>
                             @enderror

                             <label class="fieldlabels"> رقم البطاقة</label>
                        <input  class="input-section1" type="text" name="card[card_number]" value="{{ old('card_number') ?? $user->payment_data['card_number'] ?? '' }}" placeholder=" رقم البطاقة" />
                        @error('card.card_number')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="row">

                            <div class="col-12">
                             <label class="fieldlabels">تاريخ إنتهاء الصلاحية</label>

                            </div></div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="fieldlabels"> الشهر </label>
                                    <input  class="input-section1" type="text" name="card[card_exp_month]" value="{{ old('card_exp_month') ?? $user->payment_data['card_exp_month'] ?? '' }}" placeholder=" الشهر" />
                                    @error('card.card_exp_month')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="fieldlabels"> السنه </label>
                                    <input  class="input-section1" type="text" name="card[card_exp_year]" value="{{ old('card_exp_year') ?? $user->payment_data['card_exp_year'] ?? '' }}" placeholder="السنة" />
                                    @error('card.card_exp_year')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>

                             <label class="fieldlabels">رقم الكود الموجود على بطاقة الاتمان</label>
                             <input  class="input-section1" type="text" name="card[card_code]" value="{{ old('card_code') ?? $user->payment_data['card_code'] ?? '' }}" placeholder=" رقم البطاقة" />
                            </div>
                            @error('card.card_code')
                                <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                         <input type="button" name="next" class="next action-button" value="التالي" /> <input type="button" name="previous" class="previous action-button-previous" value="السابق" />
                    </fieldset>






                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">:تحميل الصورة</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">  3 - 4</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">قم بتحميل صورتك:</label>
                            <input type="file" name="person_image" accept="image/*">
                            @error('person_image')
                                <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                            <label class="fieldlabels">تحميل صورة التوقيع:</label>
                            <input type="file" name="signature_image" accept="image/*">
                            @error('signature_image')
                                <div class="alert alert-danger">{{$message}}</div>
                             @enderror
                        </div> <input type="submit"  class="next action-button" value="انتهاء" /> <input type="button" name="previous" class="previous action-button-previous" value="السابق" />
                    </fieldset>










                    <fieldset>
                        <div class="form-card">
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

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src='{{ asset("assets/Js/PersonalDetailes.js")}}'></script>
@endsection
