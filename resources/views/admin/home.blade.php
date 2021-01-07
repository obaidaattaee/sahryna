@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-briefcase fa-icon-medium"></i>
            </div>

            <div class="details">
                <div class="number">
                     {{ count($advertisement_success_counter) }}
                </div>
                <div class="desc">
                    الاعلانات المكتملة
                </div>
            </div>
            <a class="more" href="{{ route('advertisements.index.success') }}">
            المزيد <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ $advertisement_counter }}
                </div>
                <div class="desc">
                    الاعلانات
                </div>
            </div>
            <a class="more" href="{{ route('advertisements.index') }}">
                المزيد<i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-group fa-icon-medium"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ $user_counter }}
                </div>
                <div class="desc">
                     عدد المستخدمين
                </div>
            </div>
            <a class="more" href="{{ route('users.index') }}">
            المزيد <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-thumb-tack"></i>Overview
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">

                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>
                                        العنوان
                                    </th>
                                    <th>
                                        المعلن
                                    </th>
                                    <th>
                                        سعر الحصة
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisements as $advertisement)
                                    <tr>
                                        <td>
                                            <a href="{{route('site.advertismenets.show' , ['advertisement' => $advertisement->id , 'title' => $advertisement->title])}}">'{{ $advertisement->title  }}</a>
                                        </td>
                                        <td><a href="{{route('users.show' , ['user' => $advertisement->user->id] )}}"></a>
                                            {{ $advertisement->user->user_name }}
                                        </td>
                                        <td>
                                            {{ $advertisement->cost_of_share }}
                                        </td>
                                        <td>
                                            <a href="{{ route('advertisements.accept' , ['advertisement' => $advertisement->id]) }}" class="btn default btn-xs green-stripe">
                                            قبول </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
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
