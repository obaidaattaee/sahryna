@extends('admin.layouts.app')

@section('content')
@if (empty($errors_messages))

@else
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>رسائل النظام
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                <tr>
                    <th>
                         الرسالة
                    </th>

                </tr>
                </thead>
                    @foreach ($errors_messages as $message)
                    {{-- {{ dd($role['permissions']) }} --}}
                        <tr>
                            <td>{{ $message->message }}</td>

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
