@extends('admin.layouts.app')
@section('content')
{{-- {{ dd($role) }} --}}
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">اعدادات بوابة الرسائل sms<span>
                </div>

            </div>
            {{-- {{ dd(isset($sms)) }} --}}
            <div class="portlet-body form">
                <form role="form" method="post" action="{{ isset($sms) ? route('admin.settings.sms.update' ) : route('admin.settings.sms.store') }}">
                    @csrf
                    @method('POST')
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="user_name" value="{{ old('user_name') ?? $sms->user_name ?? '' }}" id="form_control_1" placeholder="اسم المستخدم  ">
                                <label for="form_control_1">اسم المستخدم</label>

                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="password" value="{{ old('password') ?? $sms->password ?? '' }}" id="form_control_1" placeholder="كلمة السر  ">
                                <label for="form_control_1">كلمة السر</label>

                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="message" value="{{ old('message') ?? $sms->message ?? '' }}" id="form_control_1" placeholder="نص الرسالة">
                                <label for="form_control_1">نص الرسالة </label>

                            </div>
                        </div>
                        @if (isset($sms))
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <a href="{{ route('admin.settings.sms.change.status') }}" class="btn btn-{{ $sms->active == 1 ? "danger" : "success" }} ">{{  $sms->active == 1 ? "ايقاف" : "تفعيل" }}</a>
                            </div>
                        </div>
                        @else
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1"> الحالة  </label>
                            <div class="col-md-10">
                                <div class="md-checkbox-list">

                                        <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox" class="md-check" name="active" >
                                            <label for="checkbox">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            اختار للتفعيل </label>
                                        </div>



                                </div>
                            </div>
                        </div>
                        @endif

                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ</button>
                        <a href="{{ route('admin.settings.sms') }}" class="btn default">الغاء</a>
                    </div>

                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection
