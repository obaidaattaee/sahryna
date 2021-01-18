@extends('admin.layouts.app')
@section('content')
@if (empty($countries))

@else

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>ادارة  الدول
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                         اسم المدينة
                    </th>
                   <th>
                        الحالة
                   </th>
                    <th>
                         تعديل \ حذف
                    </th>
                </tr>
                </thead>
                    @foreach ($countries as $country)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $country->title }}</td>
                            <td>
                            <a href="{{ route('countries.cahnge.states' , ['country' => $country->id])}}" class="btn btn-{{ $country->active == 1 ? "danger" : "info" }} btn-sm">{{ $country->active == 1 ? "ايقاف" : "تفعيل" }}</a>
                            </td>
                            <td>
                                <a href="{{ route('countries.edit' , ['country' => $country->id])}}" class="btn btn-info btn-sm">تعديل</a>
                                <a href="{{ route('countries.destroy' , ['country' => $country->id])}}" class="btn btn-danger btn-sm">حذف</a>
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
