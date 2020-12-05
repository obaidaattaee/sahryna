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
                    <span class="caption-subject bold uppercase">المستخدمين / اضافة مستخدم جديد</span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" enctype="multipart/form-data" action="{{ route('users.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" required name="first_name" value="{{ old('first_name') ?? $user->first_name ?? '' }}" id="form_control_1" placeholder="الاسم الاول">
                                    <label for="form_control_1">الاسم الاول</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" required name="last_name" value="{{ old('last_name') ?? $user->last_name ?? '' }}" id="form_control_1" placeholder="الاسم الاخير ">
                                    <label for="form_control_1">الاسم الاخير</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="email" class="form-control" name="email" value="{{ old('email') ?? $user->email ?? '' }}" id="form_control_1" placeholder="البريد الالكتروني ">
                            <label for="form_control_1">البريد الالكتروني</label>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone ?? '' }}" id="form_control_1" placeholder="رقم الهاتف">
                                    <label for="form_control_1">رقم الهاتف</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" name="alternative_phone" value="{{ old('alternative_phone') ?? $user->alternative_phone ?? '' }}" id="form_control_1" placeholder="رقم الهاتف البديل">
                                    <label for="form_control_1">رقم الهاتف البديل</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" name="person_id" value="{{ old('person_id') ?? $user->person_id ?? '' }}" id="form_control_1" placeholder="الرقم الوطني">
                                    <label for="form_control_1">الرقم الوطني</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="password" class="form-control" name="password"  id="form_control_1" placeholder="كلمة المرور ">
                                    <label for="form_control_1"> كلمة المرور الجديدة </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="password" class="form-control" name="password_confirmation"  id="form_control_1" placeholder="تاكيد كلمة المرور الجديدة ">
                                    <label for="form_control_1">تاكيد كلمة المرور الجديدة </label>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1"> الصلاحيات  </label>
                        <div class="col-md-10">
                            <div class="md-checkbox-list">
                                @foreach ($roles as $index => $role)

                                    <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox{{ $index }}" class="md-check" name="roles[]" value="{{$role->id}}" >
                                        <label for="checkbox{{ $index }}">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        {{ $role->display_name }} </label>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="dropzone dz-clickable" id="my-dropzone" >
                        <div id="drop-area">

                              <p>صورة المستخدم</p>
                              <input type="file" name="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                              <label class="button" for="fileElem">Select some files</label>
                            <progress id="progress-bar" max=100 value=0></progress>
                            <div id="gallery" /></div>
                          </div>
                        </div>
                    </div>
                    <div class="dropzone dz-clickable" id="my-dropzone" >
                        <div id="signature_image_file">

                              <p>صورة توقيع المستخدم</p>
                              <input type="file" name="signature_image_file" id="signature_image_file" multiple accept="image/*" onchange="handleFiles(this.files)">
                              <label class="button" for="signature_image_file">Select some files</label>
                            <progress id="signature_image_file" max=100 value=0></progress>
                            <div id="gallery" /></div>
                          </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ </button>
                        <a href="{{ route('users.index') }}"  class="btn default">الغاء</a>
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
