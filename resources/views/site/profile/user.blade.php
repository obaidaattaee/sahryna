@extends('site.layouts.app')
@section('css')
<link href="{{ asset('assets/Css/EditProfile.css')}}" rel="stylesheet" />

@endsection
@section('content')
<br /> <br /><br /> <br />






    <div class="container emp-profile">
        @include('admin.layouts.msg')
        <form method="post">

            <div class="row">


                <div class="col-12" style="text-align: end">
                <a href="{{ route('main') }}" class="Page-Name" >  العودة للصفحة الرئيسية </a>
                    <hr class="w-100" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset('user_images/public/'.$user->person_image)}}" alt="" />
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-6" style="margin-top: 10px;">
                    <div class="profile-head">
                        <h5>
                            {{ $user->first_name . " " . $user->last_name}}
                        </h5>

                        <br />

                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="direction: rtl;">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">حول الحساب</a>
                            </li>
                            {{-- @if (in_array(2 , $user->roles->pluck('id')->toArray())) --}}
                                <li class="nav-item">
                                    <a class="nav-link " id="home-tab"  href="{{ route('user.advertisements' , ['user' => $user->id]) }}">عرض الاعلانات</a>
                                </li>
                            {{-- @endif --}}


                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>

                                <div class="col-md-6">
                                    <label>رقم الحساب</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p> {{ $user->first_name . " " . $user->last_name}}</p>
                                </div>
                                <div class="col-md-6">
                                    <label>اسم المستخدم</label>
                                </div>
                            </div>
                            @if ($user->show_phone_number == 1)

                                @if ($user->email !== null)
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>البريد الاكتروني</label>
                                    </div>
                                </div>
                                @endif
                                @if ($user->phone !== null)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> {{ $user->phone }} </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>رقم الهاتف</label>
                                        </div>
                                    </div>
                                @endif
                                @if ($user->alternative_phone !== null)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> {{ $user->alternative_phone }} </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label> رقم الهاتف البديل</label>
                                        </div>
                                    </div>
                                @endif

                            @endif
                            {{-- @if ($user->person_id !== null)
                                <div class="row">
                                    <div class="col-md-6">
                                        <p> {{ $user->person_id }} </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label> الرقم الوطني  </label>
                                    </div>
                                </div>
                            @endif --}}


                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

