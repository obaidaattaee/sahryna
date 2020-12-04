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
                    <span class="caption-subject bold uppercase">الصلاحيات / التعديل على الصلاحية</span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" method="post" action="{{ route('roles.update' , ['role' => $role->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="display_name" value="{{ old('display_name') ?? $role->display_name ?? '' }}" id="form_control_1" placeholder="اسم الصلاحية">
                            <label for="form_control_1">الاسم</label>

                        </div>
                        <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="description" value="{{ old('description') ?? $role->description ?? "" }}" id="form_control_1" placeholder="وصف الصلاحية">
                            <label for="form_control_1">وصف الصلاحية </label>
{{-- {{ dd($role->hasPermission('users_perm')) }} --}}
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">امكانية الوصول </label>
                            <div class="col-md-10">
                                <div class="md-checkbox-list">
                                    @foreach ($permissions as $index => $permission)

                                        <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox{{ $index }}" class="md-check" name="permission[]" value="{{$permission->id}}" {{$role->hasPermission($permission->name) ? "checked" : ""}}>
                                            <label for="checkbox{{ $index }}">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            {{ $permission->display_name }} </label>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ</button>
                        <a href="{{ route('roles.index') }}" class="btn default">الغاء</a>
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
