@extends('admin.layouts.app')
@section('css')
<link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/layout/css/profile-rtl.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/layout/css/tasks-rtl.css')}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('assets/global/css/components-rtl.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/css/plugins-rtl.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/layout/css/layout-rtl.css')}}" rel="stylesheet" type="text/css"/>
<link id="style_color" href="{{ asset('assets/admin/layout/css/themes/darkblue-rtl.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/layout/css/custom-rtl.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="row margin-top-20">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{ asset('user_images/public/'.$user->person_image)}}" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                         {{ $user->first_name . " " . $user->last_name }}
                    </div>
                    <div class="profile-usertitle-job">
                         @foreach ($user->getRoles() as $role)
                            {{ $role  }} ,
                         @endforeach
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                <a href="{{route('users.edit' , ['user' => $user->id]) }}" class="btn btn-circle green-haze btn-sm">تعديل</a>
                @if ($user->active == 1)
                <a  href="{{ route('users.change.status' , ['user' => $user->id]) }}" onclick="return confirm('هل انت متاكد من الغاء تفعيل {{ $user->first_name . '' . $user->last_name }}')" class="btn btn-circle btn-danger btn-sm">الغاء التفعيل</a>

                @else
                <a  href="{{ route('users.change.status' , ['user' => $user->id]) }}" onclick="return confirm('هل انت متاكد من تفعيل {{ $user->first_name . '' . $user->last_name }}')" class="btn btn-circle btn-info btn-sm"> تفعيل</a>

                @endif
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="extra_profile.html">
                            <i class="icon-home "></i>
                            المشاركات </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                             37
                        </div>
                        <div class="uppercase profile-stat-text">
                             Projects
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                             51
                        </div>
                        <div class="uppercase profile-stat-text">
                             Tasks
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                             61
                        </div>
                        <div class="uppercase profile-stat-text">
                             Uploads
                        </div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title">البيانات الشخصية</h4>
                    <div class="margin-top-20 profile-desc-link">
                        <span >اسم المستخدم : </span> {{ $user->first_name . " " . $user->last_name}}
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <span >البريد الالكتروني  : </span> {{ $user->email}}
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <span >رقم الهاتف  : </span> {{ $user->phone}}
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <span >الرقم الوطني   : </span> {{ $user->person_id}}
                    </div>

                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">المشاركات</a>
                                </li>

                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- GENERAL QUESTION TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <div id="accordion1" class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                                                1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                </h4>
                                            </div>
                                            <div id="accordion1_1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                     Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- END TERMS OF USE TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/profile.js')}}" type="text/javascript"></script>
@endsection
