@extends('admin.layouts.app')
@section('content')
@if (empty($times))

@else

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>ادارة  مدة التوصيل للزبائن
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                         مدة التوصيل بالايام
                    </th>
                   <th>
                        الحالة
                   </th>
                    <th>
                         تعديل \ حذف
                    </th>
                </tr>
                </thead>
                    @foreach ($times as $time)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $time->time_day }}</td>
                            <td>
                            <a href="{{ route('delivery_times.cahnge.states' , ['delivery_time' => $time->id])}}" class="btn btn-{{ $time->active == 1 ? "danger" : "info" }} btn-sm">{{ $time->active == 1 ? "ايقاف" : "تفعيل" }}</a>
                            </td>
                            <td>
                                <a href="{{ route('delivery_times.edit' , ['delivery_time' => $time->id])}}" class="btn btn-info btn-sm">تعديل</a>
                                <a href="{{ route('delivery_times.destroy' , ['delivery_time' => $time->id])}}" class="btn btn-danger btn-sm">حذف</a>
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
