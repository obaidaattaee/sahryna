@extends('admin.layouts.app')
@section('content')
@if (empty($advertisements))

@else

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>ادارة الاعلانات
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
                        المعلن
                    </th>
                    <th>
                         تعديل \ حذف \ معاينة
                    </th>
                </tr>
                </thead>
                    @foreach ($advertisements as $advertisement)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $advertisement->title }}</td>
                            <td>{{ $advertisement->description }}</td>
                            <td>
                            <a href="{{ route('advertisements.cahnge.states' , ['advertisement' => $advertisement->id])}}" class="btn btn-{{ $advertisement->active == 1 ? "danger" : "info" }} btn-sm">{{ $advertisement->active == 1 ? "ايقاف" : "تفعيل" }}</a>
                            </td>
                            <td><a href="{{ route('users.show' , ['user' =>$advertisement->user->id ]) }}">{{ $advertisement->user->user_name }}</a></td>
                            <td>
                                <a href="{{ route('advertisements.show' , ['advertisement' => $advertisement->id])}}" class="btn btn-primary btn-sm">معاينة</a>
                                <a href="{{ route('advertisements.destroy' , ['advertisement' => $advertisement->id])}}" class="btn btn-danger btn-sm">حذف</a>
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
