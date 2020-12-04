@extends('admin.layouts.app')
@section('content')
@if (empty($roles))

@else

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>ادارة الصلاحيات
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                         الاسم
                    </th>
                    <th>
                         الوصف
                    </th>
                    <th>
                         الصلاحيات
                    </th>
                    <th>
                         تعديل \ حذف
                    </th>
                </tr>
                </thead>
                    @foreach ($roles as $role)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td><ul>
                                @foreach ($role->permissions as $permission)
                                    <li>{{ $permission->display_name }}</li>
                                @endforeach
                            </ul></td>
                            <td>

                                <a href="{{ route('roles.edit' , ['role' => $role->id])}}" class="btn btn-info btn-sm">تعديل</a>
                                <a href="{{ route('roles.destroy' , ['role' => $role->id])}}" class="btn btn-danger btn-sm">حذف</a>
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
