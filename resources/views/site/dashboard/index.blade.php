@extends('site.layouts.app')
@section('css')

    <link href="{{ asset('assets/Css/Additions.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/MyDashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/ChatRoom.css') }}" rel="stylesheet" />
@endsection
@section('content')

    <br /><br /><br /><br />
    {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert"
        style="text-align: end;">
        لقد تم إرسال الرسالة بنجاح
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: end;">
        لقد تم حذف الرسالة بنجاح
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> --}}




    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align: end">
                <a href="{{ route('home') }}" class="Page-Name"> العودة للصفحة الرئيسية </a>
                <hr class="w-100" />
            </div>
        </div>
    </div>
    <br /><br />

    <div class="container">
        <div class="row">
            <div class="col-md-0.5"></div>
            <div class="col-md-8 col-for8">
                <div class="row">
                    <div class="col-md-3 text-center col-4-section1">
                        <h6 class="titlefor-sections">عدد الطلبات الفاشلة</h6>
                        <p class="number-forP"> {{ $user->users_advertisements()->where('active', 3)->count() }} </p>
                    </div>
                    <div class="col-md-3 text-center col-4-section2">
                        <h6 class="titlefor-sections">عدد الطلبات الناجحة</h6>
                        <p class="number-forP"> {{ $user->users_advertisements()->where('active', 2)->count() }} </p>
                    </div>
                    <div class="col-md-3 text-center col-4-section3">
                        <h6 class="titlefor-sections">عدد الطلبات المتقدم إليها</h6>
                        <p class="number-forP"> {{ $user->contributes()->count() }} </p>
                    </div>
                    <div class="col-md-3 text-center col-4-section3">
                        <h6 class="titlefor-sections">عدد الحصص المتقدم إليها</h6>
                        <p class="number-forP"> {{ $user->contributes()->sum('number_of_parts') }} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 About-User">

                <div class="col-md-12 hello_user">
                    <p class="UserName-forP">

                        مرحبا بك : <a href="{{ route('my.profile') }}" class="UserName">{{ $user->user_name }} </a>

                    </p>
                </div>
                <div class="col-md-12 editUser">
                    <a href="{{ route('my.profile') }}" class="Edit-User"
                        style="text-decoration: none; color: currentcolor;">
                        تعديل الملف الشخصي <i class="fa fa-sliders"></i>
                    </a>
                </div>

            </div>

            <br />

        </div>

        <br />
    </div>
    @if (isset($to_user))
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3 class="Page-title"> الرسائل </h3>
                    <div id="accordion">
                        <form action="{{ route('site.message.send') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h5 class="mb-0">
                                        <div class="btn btn-link" data-toggle="collapse" data-target="#collapse1"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            إرسال رسالة
                                        </div>
                                    </h5>
                                </div>
                                <div id="collapse1" class="collapse   {{ isset($to_user) ? 'show' : '' }} "
                                    aria-labelledby="heading1" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="fieldlabels" for="ProductName"> المرسل اليه </label>
                                                <input type="text" disabled
                                                    value="{{ isset($to_user) ? $to_user->user_name : '' }}"
                                                    class="form-control inputs-AddADS ProductName DefaultForm input-section1"
                                                    id=" المرسل اليه">
                                            </div>
                                        </div>
                                        @error('to')
                                            <div class="alert alert-danger text-right">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        <div class="row">
                                            <div class="col">
                                                <label class="fieldlabels" for="ProductName"> عنوان الرسالة </label>
                                                <input type="text" name="title"
                                                    class="form-control inputs-AddADS ProductName DefaultForm input-section1"
                                                    id="ProductName">
                                                @error('title')
                                                    <div class="alert alert-danger text-right">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="fieldlabels" for="ProductName"> محتوى الرسالة </label>

                                                <textarea class="form-control" name="message"
                                                    aria-label="With textarea"></textarea>
                                                @error('message')
                                                    <div class="alert alert-danger text-right">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 15px;">
                                            <div class="col">
                                                @if (isset($to_user))
                                                    <input type="hidden" name="to" value="{{ $to_user->id }}">
                                                @endif
                                                <button type="submit" class="btn btn-default  btn-Option"
                                                    onclick="GetSuccessNo1()" data-toggle="collapse"
                                                    data-target="#collapseNo1" aria-expanded="true"
                                                    aria-controls="collapseno5">
                                                    إرسال الرسالة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    @endif


    <!-- Modal No 1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> نجاح </h5>

                </div>
                <div class="modal-body">
                    <p class="Success-progess"> لقد تم إرسال الرسالة بنجاح</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="margin-left: 10px;">إغلاق</button>

                </div>
            </div>
        </div>
    </div>



@php
    $complete_advertisement = $user->advertisements->where('active' , 2) ;
    // dd($complete_advertisement);
@endphp

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="Page-title"> الاعلانات المكتملة</h3>
                <div id="accordion">
                    @foreach ($complete_advertisement as $advertisement)
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$advertisement->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $advertisement->title }}
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse{{ $advertisement->id }}" class="collapse" aria-labelledby="heading1" data-parent="#accordion" style="">
                                <div class="card-body">
                                    {{-- <div class="row">
                                        <div class="col">
                                            <label class="Label-AddADS Productsection" for="Productsection">  اختر حالة المنتج  </label>
                                            <div class="dropdown bootstrap-select form-control inputs-AddADS Productsection"><select id="ProductDesc2" name="Section" class="form-control selectpicker inputs-AddADS Productsection" title="    حالة المنتج " tabindex="-98"><option class="bs-title-option" value=""></option>
                                                <option>بإنتظار الشراء</option>
                                                <option>تم الشراء</option>
                                                <option>تم التسليم </option>
                                                <option>  في مرحلة التسليم </option>
                                                <option> لا جديد </option>
                                            </select><button type="button" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" data-id="ProductDesc2" title="حالة المنتج"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">    حالة المنتج </div></div> </div></button><div class="dropdown-menu" style="max-height: 1094.2px; overflow: hidden; min-height: 125px; position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start"><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1" style="max-height: 1076.2px; overflow-y: auto; min-height: 107px;"><ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;"><li><a role="option" class="dropdown-item" id="bs-select-1-0" tabindex="0"><span class="text">بإنتظار الشراء</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0"><span class="text">تم الشراء</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0"><span class="text">تم التسليم </span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0"><span class="text">  في مرحلة التسليم </span></a></li><li><a role="option" class="dropdown-item" id="bs-select-1-4" tabindex="0"><span class="text"> لا جديد </span></a></li></ul></div></div></div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 15px;">
                                        <div class="col">
                                            <button type="button" class="btn btn-default  btn-Option" onclick="GetSuccessNo1()" data-toggle="collapse" data-target="#collapseNo1" aria-expanded="true" aria-controls="collapseno5">
                                            تأكيد
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="Label-AddADS Productsection" for="Productsection"> تأجيل استلام المنتج المدة </label>
                                            <div class="dropdown bootstrap-select form-control inputs-AddADS Productsection"><select id="ProductDesc2" name="Section" class="form-control selectpicker inputs-AddADS Productsection" title=" اختر  المدة   " tabindex="-98"><option class="bs-title-option" value=""></option>
                                                <option>  ثلاثة ايام </option>
                                                <option>   خمسة ايام </option>
                                            </select><button type="button" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="ProductDesc2" title="اختر  المدة"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner"> اختر  المدة   </div></div> </div></button><div class="dropdown-menu" style="max-height: 969.2px; overflow: hidden; min-height: 0px; position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start"><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1" style="max-height: 951.2px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;"><li><a role="option" class="dropdown-item" id="bs-select-2-0" tabindex="0"><span class="text">  ثلاثة ايام </span></a></li><li><a role="option" class="dropdown-item" id="bs-select-2-1" tabindex="0"><span class="text">   خمسة ايام </span></a></li></ul></div></div></div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 15px;">
                                        <div class="col">
                                            <button type="button" class="btn btn-default  btn-Option" onclick="GetSuccessNo1()" data-toggle="collapse" data-target="#collapseNo1" aria-expanded="true" aria-controls="collapseno5">
                                            تأكيد
                                            </button>
                                        </div>
                                    </div> --}}

                                    <table class="table" dir="rtl">
                                        <label class="Label-AddADS Productsection" style="text-align: right" for="Productsection">  الشركاء    </label>

                                        <thead class="thead-light">
                                            <th>الاسم </th>
                                            <th>عدد الحصص </th>
                                            <th>تاريخ الطلب </th>
                                            <th>اجمالي الحصص  </th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($advertisement->contributes as $item)
                                            <tr>
                                                <td>{{ $item->user->user_name }}</td>
                                                <td>{{ $item->number_of_parts }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td>{{ $item->advertisement()->first()->cost_of_share * $item->number_of_parts }}</td>
                                                <td><a href="{{route('contribute.code.verify')}}" class="btn btn-success">تحقق من الكود </a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>








    <br /><br /><br />

    <div class="container">


        <ul class="nav nav-tabs" dir="rtl">
            <li>
                <a class="nav-item nav-link active  key-tabs" id="nav-Notices-tab" data-toggle="tab" href="#nav-Notices"
                    role="tab" aria-controls="nav-Notices" aria-selected="true">الإشعارات</a>
            </li>

            <li>
                <a class="nav-item nav-link  key-tabs" id="nav-Messages-tab" data-toggle="tab" href="#nav-Messages"
                    role="tab" aria-controls="nav-Messages" aria-selected="false">الرسائل</a>
            </li>

            <li>
                <a class="nav-item nav-link  key-tabs" id="nav-Ads-tab" data-toggle="tab" href="#nav-Ads" role="tab"
                    aria-controls="nav-Ads" aria-selected="false">الإعلانات </a>
            </li>

            <li>
                <a class="nav-item nav-link  key-tabs" id="nav-Yourrequests-tab" data-toggle="tab" href="#nav-Yourrequests"
                    role="tab" aria-controls="nav-Yourrequests" aria-selected="false">الطلبات الخاصة بك</a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade show active" id="nav-Notices" role="tabpanel" aria-labelledby="nav-Notices-tab">
                <br /><br />
                <div class="col-md-12 Box-Notices">
                    <div class="col-md-12 for-title-boxNotices">
                        <h5 class="title-boxNotices">الإشعارات</h5>
                    </div>
                    <ul class="listOfMassage text-right" dir="rtl">
                        @isset($user->notifications)
                            @php
                            $notifications = $user->notifications()->paginate(15);
                            @endphp
                            @foreach ($notifications as $item)
                                {{ $item->markAsRead() }}
                                <li class="list-item">
                                    <div class="massages">
                                        {{ $item->data['message'] }}
                                    </div>
                                </li>
                            @endforeach
                            {{ $notifications->links() }}
                        @endisset
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-Messages" role="tabpanel" aria-labelledby="nav-Messages-tab">
                <br />
                <div class="row">
                    <div class="col-md-12 Box-massage">
                        <div class="row">
                            <div class="col-md-12 title-boxmassage">
                                <h5>الرسائل</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-body">


                            <div class="row for-Rowborder">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-12"
                                            style="text-align: end; padding-right: 30px; max-height: 350px;  overflow-y: scroll;">
                                            <!--Replay-->
                                            @foreach ($user_messages as $key => $messages)
                                                @php
                                                $message_user = $messages->first()->fromUser->id == auth()->id() ?
                                                $messages->first()->toUser : $messages->first()->fromUser ;

                                                $messages_users = [] ;
                                                @endphp
                                                @foreach ($messages as $message)
                                                    @php
                                                    $message->update([
                                                    'readed' => 1
                                                    ]);
                                                    @endphp
                                                    <div class="row for-Rowborder-chat d-none messages message{{ $message_user->id }}"
                                                        id="chatSide{{ $message_user->id }}">
                                                        <div class="col-12 col-Date">
                                                            <p class="Date" id="chatSide-img"> </p>
                                                        </div>
                                                        <div class="col-10" style="text-align: end;">
                                                            <p class="Member-Name-text"> {{ $message->fromUser->user_name }}
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-3 text-left">
                                                                    <img src="https://ardhwatalab.com.sa/double-check.png">
                                                                    <p class="Data-Read">
                                                                        {{ $message->created_at->diffForHumans() }} </p>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3"
                                                                        style="margin-bottom: 10px;margin-top: -15px;font-size: 22px">
                                                                        <strong>{{ $message->title }}</strong>
                                                                    </div>
                                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3 Massege-inside-text"
                                                                        style="margin-bottom: 10px;margin-top: -15px;">
                                                                        {{ $message->message }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 for-img">
                                                            <img src="{{ asset('user_images/public/' . $message->fromUser->person_image) }}"
                                                                alt="Avatar" style="max-width: 100px"
                                                                class="md-avatar rounded-circle">
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>

                                <div class="col-md-3" style="  max-height: 350px;  overflow-y: scroll;">
                                    @foreach ($user_messages as $key => $messages)
                                        {{-- @php
                                        if(in_array( $message_user->id , $messages_users )){
                                        continue ;
                                        }
                                        $messages_users = array_merge($messages_users , [$message_user->id]);
                                        @endphp --}}
                                        @php
                                        $message_user = $messages->first()->fromUser->id == auth()->id() ?
                                        $messages->first()->toUser : $messages->first()->fromUser ;

                                        $messages_users = [] ;
                                        @endphp
                                        <div class="row">
                                            <!--Contact People-->
                                            <div class="col-md-10" style="border-bottom: 0px solid #580707;">
                                                <div class="row"
                                                    onclick="event.preventDefault(); showMessages({{ $message_user->id }} , {{ $messages->first()->fromUser->id == auth()->id() ? $messages->first()->toUser->id : $messages->first()->fromUser->id }})"
                                                    onmouseover="" style="cursor: pointer;">
                                                    <div class="col-md-8 text-right">
                                                        <a href="#chatSide">
                                                            <p class="Name-Contact Status"
                                                                style=" font-family: 'Cairo', sans-serif;"> </p>
                                                        </a>

                                                        <p class="Status"> {{ $message_user->user_name }} </p>
                                                    </div>
                                                    <div class="col-md-2 for-img">
                                                        <img src="{{ asset('user_images/public/' . $message_user->person_image) }}"
                                                            style="max-width: 100px ;max-height: 80px" alt="Avatar"
                                                            class="md-avatar-small rounded-circle">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                            <form action="{{ route('site.message.send') }}" method="post" class="form-group d-none"
                                id="send-form">
                                @csrf
                                <div class="row">

                                    <div class="col-md-9" style="margin-top: 19px; margin-bottom: -10px">
                                        <div class="form-group green-border-focus">
                                            <input type="text" class="form-control" value="{{ old('title') ?? '' }}"
                                                name="title" dir="rtl" placeholder="العنوان">
                                            @error('title')
                                                <div class="alert alert-danger text-right">
                                                    <span>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group green-border-focus">
                                            <textarea class="form-control" name="message" rows="2" dir="rtl"
                                                placeholder="نص الرسالة">{{ old('message') ?? '' }}</textarea>
                                            @error('message')
                                                <div class="alert alert-danger text-right">
                                                    <span>{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="to" id="to-user">
                                    <div class="col-md-3 text-center" style="padding: 40px;">
                                        <button type="submit" class="btn btn-default btn-lg btn-submition">
                                            إرسال
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-Ads" role="tabpanel" aria-labelledby="nav-Ads-tab">

                <br />
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12 title-ofADS">
                            <h5 class="">الإعلانات التي قمت بإنشائها</h5>
                        </div>
                        <table class="table" dir="rtl">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">اعلان رقم </th>
                                    <th scope="col">اسم الاعلان</th>
                                    <th id="dataStart" scope="col">تاريخ بداية الاعلان </th>
                                    <th id="MemberNumberIn" scope="col"> الاعضاء المنضمون </th>
                                    <th id="MemberNumber" scope="col"> عدد الاعضاء المتبقون </th>
                                    <th id="MemberNumber" scope="col"> سعر الحصة   </th>
                                    <th id="dataEnd" scope="col">تاريخ نهاية الاعلان</th>
                                    <th scope="col"> حالة الاعلان</th>
                                    <th scope="col"> حذف الاعلان </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($user->advertisements) }}
                                --}}

                                @isset($user->advertisements)


                                    @foreach ($user->advertisements as $advertisement)


                                        <tr>
                                            <th scope="row">{{ $advertisement->id }}</th>
                                            <td id="ADS-Name" style="color: #000;">
                                                <a href="#" style="color: #000;">{{ $advertisement->title }}</a>
                                            </td>
                                            <td id="dataStart">{{ $advertisement->publish_date }}</td>
                                            <td id="MemberNumberIn">
                                                <p>{{ $advertisement->userSubscriptions()->sum('number_of_parts') }}</p>
                                            </td>
                                            <td id="MemberNumber">
                                                <p>{{ $advertisement->number_of_partners - $advertisement->userSubscriptions()->sum('number_of_parts') }}
                                                </p>
                                            </td>

                                            <td id="dataEnd">{{ $advertisement->cost_of_share }}</td>
                                            <td id="dataEnd">{{ $advertisement->end_publish_date }}</td>
                                            <td><button
                                                    class="btn @switch( $advertisement->status)
                                                    @case(0)
                                                        {{"btn-warning"}}
                                                        @break
                                                    @case(1)
                                                        {{"btn-success"}}
                                                        @break
                                                    @case(2)
                                                        {{"btn-info"}}
                                                        @break
                                                    @default

                                                @endswitch">@switch( $advertisement->status)
                                                @case(0)
                                                    {{"غير مفعل"}}
                                                    @break
                                                @case(1)
                                                    {{"مفعل"}}
                                                    @break
                                                @case(2)
                                                    {{"مكتمل الشراكة"}}
                                                    @break
                                                @default

                                            @endswitch</button>
                                            </td>
                                            <td><a href="{{ route('site.advertismenets.delete', ['advertisement' => $advertisement->id, 'user' => $user->id]) }}"
                                                    onclick="return alert('هل انت متاكد من حذف الاعلان')"
                                                    class="btn btn-danger">حذف الاعلان</a></td>
                                            <td><a href="{{ route('advertismenets.edit', ['advertisement' => $advertisement->id]) }}"
                                                    class="btn btn-info">تعديل </a></td>
                                        </tr>
                                    @endforeach
                                @endisset


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-Yourrequests" role="tabpanel" aria-labelledby="nav-Yourrequests-tab">
                <br />
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12 title-ofADS">
                            <h5 class="">طلبات المشاركة</h5>
                        </div>
                        <table class="table" dir="rtl">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">اعلان رقم </th>
                                    <th scope="col">اسم الاعلان</th>
                                    <th scope="col">تاريخ طلب المشاركة</th>
                                    <th scope="col">عدد الحصص المطلوبة </th>
                                    <th scope="col">الحصصص المتبيقية للاعلان </th>
                                    <th scope="col">سعر الحصة الواحدة </th>
                                    <th scope="col">اجمالي الحصص </th>
                                    <th scope="col">كود التحقق  </th>
                                    <th scope="col">الحالة </th>
                                    <th scope="col"> </th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($user->advertisements) }}
                                --}}
                                @php
                                    $contributes = $user->contributes()->with('advertisement')->get();
                                    // dd($contributes);
                                @endphp
                                @isset($contributes)


                                    @foreach ($contributes as $contribute)
                                        {{-- {{ dd($contribute) }}
                                        --}}
                                        {{--
                                        {{ dd($contribute->advertisement()->first()->reminnig_contributes) }}
                                        --}}
                                        @php
                                            if (!isset( $contribute->advertisement()->first()->id)) {
                                                continue ;
                                            }
                                        @endphp
                                        <tr>
                                            <td scope="row">{{ $contribute->advertisement()->first()->id }}</td>
                                            <td id="ADS-Name" style="color: #000;">
                                                <a href="#"
                                                    style="color: #000;">{{ $contribute->advertisement()->first()->title }}</a>
                                            </td>
                                            <td id="dataStart">{{ $contribute->created_at }}</td>
                                            <td id="MemberNumberIn">
                                                <p>{{ $contribute->number_of_parts }}</p>
                                            </td>
                                            <td id="MemberNumber">
                                                <p>{{ $contribute->advertisement()->first()->reminnig_contributes }}
                                                </p>
                                            </td>
                                            <td id="MemberNumber">
                                                <p>{{ $contribute->advertisement()->first()->cost_of_share }}
                                                </p>
                                            </td>
                                            <td id="MemberNumber">
                                                <p>{{ $contribute->advertisement()->first()->cost_of_share * $contribute->number_of_parts }}
                                                </p>
                                            </td>
                                            <td id="MemberNumber">
                                                <p>{{ $contribute->code }}
                                                </p>
                                            </td>
                                            <td style="overflow:hidden; text-overflow:ellipsis;"><button
                                                class="btn @switch( $contribute->status)
                                                @case(0)
                                                    {{"btn-warning"}}
                                                    @break
                                                @case(1)
                                                    {{"btn-success"}}
                                                    @break
                                                @case(2)
                                                    {{"btn-info"}}
                                                    @break
                                                @default

                                            @endswitch">@switch( $contribute->status)
                                            @case(0)
                                                {{"لم تكتمل الشراكة"}}
                                                @break
                                            @case(1)
                                                {{"اكتمل عدد الشركاء"}}
                                                @break
                                            @case(2)
                                                {{"مستلمة"}}
                                                @break
                                            @default

                                        @endswitch</button>
                                        </td>
                                            <td><a href="{{ route('advertismenets.delete.subscription', ['advertisement' =>  $contribute->advertisement()->first()->id, 'user' => $user->id , 'subscription' => $contribute->id]) }}"
                                                    onclick="return alert('هل انت متاكد من  الانسحاب من الشراكة')"
                                                    class="btn btn-danger">انسحاب من الشراكة </a></td>
                                        </tr>
                                    @endforeach
                                @endisset


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <br />
    </div>

    <br /><br /><br />

@endsection
@section('js')

    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/js/pagination.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#tab").pagination({
                items: 3,
                contents: 'contents',
                previous: 'Previous',
                next: 'Next',
                position: 'bottom',
            });
        });

    </script>
    <script>
        function blockMessages() {
            var messages = document.getElementsByClassName('messages');
            for (var i = 0; i < messages.length; i++) {
                if (messages[i].classList.contains('d-none') !== true) {
                    messages[i].classList.add('d-none');
                }
            }
        }

        function showSendForm() {
            var form = document.getElementById('send-form');
            if (form.classList.contains('d-none')) {
                form.classList.remove('d-none');
            }
        }

        function showMessages(key, id) {
            var user_messages = document.getElementsByClassName('message' + key);
            blockMessages();
            for (var i = 0; i < user_messages.length; i++) {
                user_messages[i].classList.remove('d-none');
            }
            showSendForm();
            console.log(id);
            document.getElementById('to-user').value = id;
            console.log('hello');
        }

    </script>

@endsection
