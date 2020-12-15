@extends('admin.layouts.app')
@section('content')
@if (empty($categories))

@else

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>ادارة تصنيفات المنتجات
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                         العنوان
                    </th>
                    <th>
                         الوصف
                    </th>
                    <th>
                        الحالة
                   </th>
                    <th>
                         تعديل \ حذف
                    </th>
                </tr>
                </thead>
                    @foreach ($categories as $category)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                            <a href="{{ route('categories.cahnge.states' , ['category' => $category->id])}}" class="btn btn-{{ $category->active == 1 ? "danger" : "info" }} btn-sm">{{ $category->active == 1 ? "ايقاف" : "تفعيل" }}</a>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit' , ['category' => $category->id])}}" class="btn btn-info btn-sm">تعديل</a>
                                <a href="{{ route('categoies.destroy' , ['category' => $category->id])}}" class="btn btn-danger btn-sm">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->

    </div>
</div>
@endif


@endsection
@section('js')

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@endsection
