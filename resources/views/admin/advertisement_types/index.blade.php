@extends('admin.layouts.app')
@section('content')
@if (empty($advertisement_types))

@else

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>ادارة انواع المنتجات
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
                    @foreach ($advertisement_types as $advertisement_type)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $advertisement_type->title }}</td>
                            <td>{{ $advertisement_type->description }}</td>
                            <td>
                            <a href="{{ route('advertisement_types.cahnge.states' , ['advertisement_type' => $advertisement_type->id])}}" class="btn btn-{{ $advertisement_type->active == 1 ? "danger" : "info" }} btn-sm">{{ $advertisement_type->active == 1 ? "ايقاف" : "تفعيل" }}</a>
                            </td>
                            <td>
                                <a href="{{ route('advertisement_types.edit' , ['advertisement_type' => $advertisement_type->id])}}" class="btn btn-info btn-sm">تعديل</a>
                                <a href="{{ route('advertisement_types.destroy' , ['advertisement_type' => $advertisement_type->id])}}" class="btn btn-danger btn-sm">حذف</a>
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
