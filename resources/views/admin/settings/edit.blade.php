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
                    <span class="caption-subject bold uppercase">اعدادات عامة للموقع<span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" method="post" action="{{ route('settings.create') }}">
                    @csrf
                    @method('POST')
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="title" value="{{ old('title') ?? $category->title ?? '' }}" id="form_control_1" placeholder="عنوان التصنيف ">
                            <label for="form_control_1">العنوان</label>

                        </div>
                       
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ</button>
                        <a href="{{ route('categories.index') }}" class="btn default">الغاء</a>
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
