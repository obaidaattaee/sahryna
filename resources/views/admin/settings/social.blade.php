@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>اعدادات عامة \ روابط التواصل الاجتماعي
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                        عنوان وسيلة التواصل
                    </th>
                    <th>
                        رابط الوسيلة
                    </th>
                    <th>
                        صورة
                    </th>
                    <th>
                         حذف
                    </th>
                </tr>
                </thead>
               <tbody>
                @isset($settings->social)
                {{-- {{ dd(json_decode($settings->social)) }} --}}
                   @foreach (json_decode($settings->social) as $key => $social)
                    <tr>
                        {{-- {{ dd($social->url) }} --}}
                        <td><input type="text" name="title" value="{{  $social->title }}" disabled></td>
                        <td><input type="text" name="url" value="{{  $social->url }}" disabled></td>
                        <td><img src="{{  asset('user_images/settings/'.$social->image) }}" alt="" style="max-height: 200px; max-width: 200px"></td>
                        <td>
                            <a href="{{ route('admin.settings.social.delete' , ['key' => $key])}}" onclick="return confirm('هل انت متاكد من حذف الصورة" class="btn btn-danger btn-sm">حذف</a>
                       </td>
                    </tr>
                    @endforeach
                    @endisset
                    <tr>
                        <form action="{{ route('admin.settings.social.insert') }}" method="post" enctype="multipart/form-data" class="form-group form-md-line-input">
                            @csrf
                            <td><input class="form-control" type="text" name="title"></td>
                            <td><input class="form-control" type="text" name="url"></td>
                            <td> اضافة صورة جديدة :<input type="file" name="social" id="fileElem" accept="image/*">
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
