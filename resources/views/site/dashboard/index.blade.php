@extends('site.layouts.app')
@section('css')

<link href="{{  asset('assets/Css/Additions.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/MyDashboard.css')}}" rel="stylesheet" />
@endsection
@section('content')

<br /><br /><br /><br />
{{-- <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: end;">
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
            <a href="{{route('home')}}" class="Page-Name" >  العودة للصفحة الرئيسية </a>
            <hr class="w-100" />
        </div>
    </div>
</div>
<br /><br />

<div class="container">
    <div class="row">
        <div class="col-md-0.5"></div>
        <div class="col-md-8 col-for8" >
            <div class="row">
                <div class="col-md-4 text-center col-4-section1">
                    <h6 class="titlefor-sections">عدد الطلبات الفاشلة</h6>
                    <p class="number-forP"> 0 </p>
                </div>
                <div class="col-md-4 text-center col-4-section2">
                    <h6 class="titlefor-sections">عدد الطلبات الناجحة</h6>
                    <p class="number-forP"> 10 </p>
                </div>
                <div class="col-md-4 text-center col-4-section3">
                    <h6 class="titlefor-sections">عدد الطلبات المتقدم إليها</h6>
                    <p class="number-forP"> 5 </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 About-User">

            <div class="col-md-12 hello_user">
                <p class="UserName-forP">

                    مرحبا بك : <a href="{{ route('my.profile') }}" class="UserName"> ابراهيم مصطفى </a>

                </p>
            </div>
            <div class="col-md-12 editUser">
                <a href="{{ route('my.profile') }}" class="Edit-User" style="text-decoration: none; color: currentcolor;">
                    تعديل الملف الشخصي  <i class="fa fa-sliders"></i>
                </a>
            </div>

        </div>

        <br />

    </div>

    <br />
</div>










<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3 class="Page-title"> الرسائل </h3>
            <div id="accordion">
                @if (isset($to_user))

                <form action="{{ route('site.message.send') }}" method="post" >
                    @csrf
                <div class="card">
                    <div class="card-header" id="heading1">
                        <h5 class="mb-0">
                            <div class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                                إرسال رسالة
                            </div>
                        </h5>
                    </div>

                    <div id="collapse1" class="collapse   {{ isset($to_user) ? "show" : "" }} " aria-labelledby="heading1" data-parent="#accordion">
                        <div class="card-body">


                            <div class="row">
                                <div class="col">
                                    <label class="fieldlabels" for="ProductName">   المرسل اليه </label>

                                    <input type="text"  disabled value="{{ isset($to_user) ? $to_user->user_name : "" }}" class="form-control inputs-AddADS ProductName DefaultForm input-section1" id=" المرسل اليه"  >
                                </div>

                            </div>
                            @error('to')
                                <div class="alert alert-danger text-right">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror



                            <div class="row">
                                <div class="col">
                                    <label class="fieldlabels" for="ProductName"> عنوان الرسالة </label>

                                    <input type="text" name="title" class="form-control inputs-AddADS ProductName DefaultForm input-section1" id="ProductName"  >
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

                                    <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger text-right" >
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                            </div>


                            <div class="row" style="margin-top: 15px;">
                                <div class="col">
                                    @if (isset($to_user))
                                        <input type="hidden" name="to" value="{{$to_user->id}}">
                                    @endif
                                    <button type="submit" class="btn btn-default  btn-Option" onclick="GetSuccessNo1()" data-toggle="collapse" data-target="#collapseNo1" aria-expanded="true" aria-controls="collapseno5">
                                     إرسال الرسالة
                                    </button>


                                </div>
                            </div>



                        </div>
                    </div>















                </div>

            </form>
            @endif



                <div class="card">
                    <div class="card-header" id="heading2">
                        <h5 class="mb-0">
                            <button class="btn btn-link " data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
                                الرسائل الواردة
                            </button>
                        </h5>
                    </div>

                    <div id="collapse2" class="collapse  " aria-labelledby="heading2" data-parent="#accordion">
                        <div class="card-body">

@foreach ($user->getInboxAttribute as $item)
<div class="row">
    <div class="col-md-8 text-right bodyFor">

        {{ $item->fromUser->user_name }}
    </div>
    <div class="col-md-4 bodyFor  text-right bodyFor">
        صاحب الرسالة
     </div>
</div>

<div class="row">
    <div class="col-md-8 bodyFor text-right">
        <p class="P-ForDash">{{$item->message}}</p>
        </div>
 <div class="col-md-4">
    <h6 class="text-right bodyFor">محتوى الرسالة </h6>

 </div>

</div>

<hr class="w-100">
@endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>



<!-- Modal No 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  نجاح  </h5>

            </div>
            <div class="modal-body">
                <p class="Success-progess"> لقد تم إرسال الرسالة بنجاح</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left: 10px;">إغلاق</button>

            </div>
        </div>
    </div>
</div>















<br /><br /><br />

<div class="container">


    <ul class="nav nav-tabs" dir="rtl">
        <li>
            <a class="nav-item nav-link active  key-tabs" id="nav-Notices-tab" data-toggle="tab" href="#nav-Notices" role="tab" aria-controls="nav-Notices" aria-selected="true">الإشعارات</a>
        </li>

        <li>
            <a class="nav-item nav-link  key-tabs" id="nav-Messages-tab" data-toggle="tab" href="#nav-Messages" role="tab" aria-controls="nav-Messages" aria-selected="false">الرسائل</a>
        </li>

        <li>
            <a class="nav-item nav-link  key-tabs" id="nav-Ads-tab" data-toggle="tab" href="#nav-Ads" role="tab" aria-controls="nav-Ads" aria-selected="false">الإعلانات </a>
        </li>

        <li>
            <a class="nav-item nav-link  key-tabs" id="nav-Yourrequests-tab" data-toggle="tab" href="#nav-Yourrequests" role="tab" aria-controls="nav-Yourrequests" aria-selected="false">الطلبات الخاصة بك</a>
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


                    @foreach ($user->notifications as $item)
                        {{ $item->markAsRead() }}
                        <li class="list-item">
                            <a href="#" class="massages">
                                {{ $item->data['message'] }}
                            </a>
                        </li>
                    @endforeach
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

            <div class="row">

                <div class="col-md-6 text-center box-lastmassagesend">
                    <p>اخر الرسائل المرسلة </p>
                    <p class="number-forP"> 10 </p>
                </div>
                <div class="col-md-6 text-center box-lastmassagerecive ">
                    <p> اخر الرسائل الواردة</p>
                    <p class="number-forP"> 10 </p>
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
                                <th  scope="col">اعلان رقم </th>
                                <th  scope="col">اسم الاعلان</th>
                                <th  id="dataStart" scope="col">تاريخ بداية الاعلان </th>
                                <th id="MemberNumberIn" scope="col">   الاعضاء المنضمون  </th>
                                <th id="MemberNumber" scope="col">  عدد الاعضاء المتبقون  </th>
                                <th id="dataEnd" scope="col">تاريخ نهاية الاعلان</th>
                                <th scope="col"> حالة الاعلان</th>
                                <th scope="col">  حذف الاعلان </th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($user) }} --}}
                            @isset($user->advertisemets)


                            @foreach ($user->advertisemets as $advertisement)
                            {{-- {{ dd($advertisement) }} --}}
                            <tr>
                                <th scope="row">{{ $advertisement->id }}</th>
                                <td id="ADS-Name" style="color: #000;">
                                    <a href="#" style="color: #000;">{{ $advertisement->title }}</a>
                                </td>
                                <td id="dataStart">{{ $advertisement->publish_date     }}</td>
                                <td id="MemberNumberIn"><p>-</p></td>
                                <td id="MemberNumber"><p>-</p></td>

                                <td id="dataEnd">{{ $advertisement->end_publish_date     }}</td>
                                <td><button class="btn btn-{{ $advertisement->active ==1 ? "success" : "warning" }}">{{ $advertisement->active ==1 ? "مفعل" : "غير مفعل" }}</button></td>
                                <td><a href="{{ route('site.advertismenets.delete' , ['advertisement' => $advertisement->id , 'user' => $user->id ]) }}" onclick="return alert('هل انت متاكد من حذف الاعلان')" class="btn btn-danger">حذف الاعلان</a></td>

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
                <div class="col-md-12 box-accept">
                    <div class="row">

                        <div class="col-md-5" @*style="    margin-right: -30px;"*@>
                            <div class="row text-center">
                                <div class="col-md-1"></div>
                                <div class="col-md-5 text-center  box-accept-1">
                                    <p class="keyword" style="margin-bottom: 22px;">قيد التنفيذ</p>
                                    <p>0</p>
                                </div>
                                <div class="col-md-5 text-center box-accept-2">
                                    <p class="keyword" style="margin-bottom: 22px;">بإنتظار الموافقة</p>
                                    <p>0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row text-center">
                                <div class="col-md-5 box-accept-3">
                                    <p class="keyword">المستبعدة</p>
                                    <p class="keyword">0</p>
                                </div>
                                <div class="col-md-5 box-accept-4">
                                    <p class="keyword">المكتملة</p>
                                    <p>0</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 text-center" style="padding: 35px;">
                            <h5>عروضي </h5>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <br />
</div>

<br /><br /><br />

@endsection

