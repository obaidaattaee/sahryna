@extends('admin.layouts.app')
@section('css')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

@endsection
@section('content')
{{-- {{ dd($role) }} --}}
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">الاعدادات العامة للموقع<span>
                </div>

            </div>
            {{-- {{ dd(isset($settings) ? 'hello' : 'not hello' , $settings) }} --}}
            <div class="portlet-body form">
                <form role="form" method="post" action="{{ isset($settings) ? route('admin.settings.update' ) : route('admin.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="title" value="{{ old('title') ?? $settings->title ?? '' }}" id="form_control_1" placeholder="اسم الموقع">
                            <label for="form_control_1">اسم الموقع</label>

                        </div>
                        <div class="form-group form-md-line-input">
                        <textarea type="text" class="form-control" name="description" id="form_control_1" placeholder="وصف الموقع">{{ old('description') ?? $settings->description ?? "" }}</textarea>
                            <label for="form_control_1">وصف الموقع </label>
{{-- {{ dd($role->hasPermission('users_perm')) }} --}}
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" name="domain" value="{{ old('domain') ?? $settings->domain ?? '' }}" id="form_control_1" placeholder="دومين الموقع">
                            <label for="form_control_1">دومين الموقع</label>

                        </div>
                        <div>
                        <div class="form-group form-md-line-input">
                            <textarea type="text" class="form-control" name="wellcom_message"  id="form_control_1" placeholder="الرسالة الترحيبية ">{{ old('wellcom_message') ?? $settings->wellcom_message ?? '' }}</textarea>
                            <label for="form_control_1">الرساله الترحيبية </label>

                        </div>
                    </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-2">فكرة الموقع</label>
                            <div class="col-md-10">
                                <textarea name="idea"  rows="10">{{ old('idea') ?? $settings->idea ?? '' }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-2">اهداف الموقع</label>
                            <div class="col-md-10">
                                <textarea name="goals" rows="10">{{ old('goals') ?? $settings->goals ?? '' }}</textarea>
                            </div>
                        </div>
                    <br>
                        <div class="form-group">
                            <label class="control-label col-md-2">تحديد المسؤولية</label>
                            <div class="col-md-10">
                                <textarea name="possible" rows="10">{{ old('possible') ?? $settings->possible ?? '' }}</textarea>
                            </div>
                        </div>
                    <br>
                        <div class="form-group">
                            <label class="control-label col-md-2"> الشروط و الاحكام</label>
                            <div class="col-md-10">
                                <textarea name="polices" rows="10">{{ old('polices') ?? $settings->polices ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="dropzone dz-clickable" id="my-dropzone" >
                            <div id="drop-area">

                                  <p>شعار الموقع </p>
                                  <input type="file" name="logo_image" id="fileElem" accept="image/*">
                                  <label class="button" for="fileElem">قم باختيار صورة شعار الموقع</label>
                                <div id="gallery" /></div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="form_control_1">  الشعار الحالي  </label>
                            <img src="{{ asset('user_images/settings/'. ($settings->logo_image ?? '')) }}" alt="شعار الموقع" style="max-width: 200px">

                        </div>

                    </div>

                </div>

                <br><br><br>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ</button>
                        <a href="{{ route('admin.index') }}" class="btn default">الغاء</a>
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
@section('js')
<script>
    CKEDITOR.replace( 'idea' );
</script>
<script>
    CKEDITOR.replace( 'goals' );
</script>
<script>
    CKEDITOR.replace( 'polices' );
</script>
<script>
    CKEDITOR.replace( 'possible' );
</script>
@endsection
