@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>اعدادات عامة \ الصور الترحيبية في الموقع
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                        الصورة
                    </th>
                    <th>
                         حذف
                    </th>
                </tr>
                </thead>
               <tbody>
                @isset($settings->slider_images)
                   @foreach (json_decode($settings->slider_images) as $key => $image)
                    <tr>
                        <td><img src="{{ asset('user_images/settings/' . $image )}}" alt="" style="max-height: 200px"></td>
                        <td>
                            <a href="{{ route('admin.settings.image.delete' , ['key' => $key])}}" onclick="return confirm('هل انت متاكد من حذف الصورة" class="btn btn-danger btn-sm">حذف</a>
                       </td>
                    </tr>
                    @endforeach
                    @endisset
                    <tr>
                        <form action="{{ route('admin.settings.image.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <td>                                <p>يجب ان تكون ابعاد الصورة اكبر من 1000 * 700</p>

                                 اضافة صورة جديدة :<input type="file" name="logo_image" id="fileElem" accept="image/*">
                            </td>
                            <td>

                                <input type="submit" class="btn btn-success" value="اضافة">
                            </td>
                        </form>

                    </tr>

               </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->

    </div>
</div>
@endsection
@section('js')

<script>
    $(document).ready(function() {
    $('#example').DataTable( {
    buttons: [
        {
            extend: 'pdf',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ],
} );
} );
</script>
@endsection
