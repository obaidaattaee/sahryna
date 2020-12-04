@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>المستخدمين / ادارة المستخدمين الغير فعالين
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
                         الريد الالكتروني
                    </th>
                    <th>
                        الرقم الوطني
                   </th>
                    <th>
                        فئة المستخدم
                    </th>
                    <th>
                         رقم الهاتف
                    </th>
                    <th>
                         معاينة / تعديل / حذف
                    </th>
                </tr>
                </thead>
               <tbody>
                   @foreach ($users as $user)
                    <tr>
                    <td>{{ $user->first_name . " " . $user->last_name }} </td>
                    <td>{{ $user->email }}</td>
                        <td>{{ $user->person_id }}</td>
                        <td>@foreach ($user->getRoles() as $role)
                            <ul>
                                <li>{{ $role }} </li>
                            </ul>
                        @endforeach</td>
                        <td>{{ $user->phone}}</td>
                        <td>
                            <a href="{{ route('users.show' , ['user' => $user->id])}}" class="btn btn-success btn-sm">معاينة</a>
                            <a href="{{ route('users.edit' , ['user' => $user->id])}}" class="btn btn-info btn-sm">تعديل</a>
                            <a href="{{ route('users.change.delete.status' , ['user' => $user->id])}}" onclick="return confirm('هل انت متاكد من حذف {{ $user->first_name . '' . $user->last_name }}')" class="btn btn-danger btn-sm">حذف</a>
                       </td>
                    </tr>
                    @endforeach
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
