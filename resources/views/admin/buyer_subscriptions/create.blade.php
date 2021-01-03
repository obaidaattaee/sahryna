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
                    <span class="caption-subject bold uppercase">الاشتراكات / تعديل  بيانات الاشتراك<span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" method="post" action="{{ route('subscriptions.store') }}">
                    @csrf
                    @method('POST')
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="title" value="{{ old('title') ?? $subscription->title ?? '' }}" id="form_control_1" placeholder="عنوان الاشتراك ">
                            <label for="form_control_1">العنوان</label>

                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="description" value="{{ old('description') ?? $subscription->description ?? '' }}" id="form_control_1" placeholder="وصف الاشتراك">
                            <label for="form_control_1">الوصف</label>

                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="time_day" value="{{ old('time_day') ?? $subscription->time_day ?? '' }}" id="form_control_1" placeholder="مدة الاشتراك ">
                            <label for="form_control_1">مدة الاشتراك بالايام </label>

                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="price" value="{{ old('price') ?? $subscription->price ?? '' }}" id="form_control_1" placeholder="سعر الاشتراك ">
                            <label for="form_control_1">سعر الاشتراك  </label>

                        </div>

                    <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1"> الحالة </label>
                        <div class="col-md-10">
                            <div class="md-checkbox-list">


                                    <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox1" class="md-check" name="active"  {{ old('active')  ? "checked" : ""}}>
                                        <label for="checkbox1">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        اختار للتفعيل </label>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ</button>
                        <a href="{{ route('subscriptions.index') }}" class="btn default">الغاء</a>
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
