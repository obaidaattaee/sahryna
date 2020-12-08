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
                    <span class="caption-subject bold uppercase">التصنيفات / اضافة صنف جديد<span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" method="post" action="{{ route('categories.store') }}">
                    @csrf
                    @method('post')
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="title" value="{{ old('title') ?? $category->title ?? '' }}" id="form_control_1" placeholder="عنوان التصنيف ">
                            <label for="form_control_1">العنوان</label>

                        </div>
                        <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="description" value="{{ old('description') ?? $category->description ?? "" }}" id="form_control_1" placeholder="وصف الصلاحية">
                            <label for="form_control_1">وصف التصنيف </label>
{{-- {{ dd($role->hasPermission('users_perm')) }} --}}
                        </div>

                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1"> الحالة </label>
                        <div class="col-md-10">
                            <div class="md-checkbox-list">


                                    <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox1" class="md-check" name="active"  {{ old('active') ? "checked" : ""}}>
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
