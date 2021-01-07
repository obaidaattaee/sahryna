<!DOCTYPE html>
<html>
<head>
    @php
        $settings = \App\Models\Settings::first()
    @endphp
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->title ?? "موقع اشترينا" }}</title>
     <script src="https://kit.fontawesome.com/99d5e885f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700&family=Tajawal:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=dubai-bold" />






<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&display=swap" rel="stylesheet">
<style>
    .fa-stack[data-count]:after{
  position:absolute;
  right:0%;
  top:1%;
  content: attr(data-count);
  font-size:50%;
  padding:.6em;
  border-radius:999px;
  line-height:.75em;
  color: white;
  background:rgba(255,0,0,.85);
  text-align:center;
  min-width:2em;
  font-weight:bold;
}
</style>
<link href="{{ asset('css/app.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/Css/HomePage.css')}}" rel="stylesheet" />
@yield('css')
</head>
<body>
    @auth
@php
    $message_count = auth()->user()->inbox->where('readed' , 0)->count() ;
@endphp
@endauth
          <!--navbar-->
          <nav class="navbar navbar-expand-md fixed-top navbar-org">
            <div class="container">
                <a href="{{ route('main')}}" class="navbar-brand">
                    <img src="{{ asset('user_images/settings/'.($settings->logo_image ?? "اشترينا001.jpg"))}}"   >
                </a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
@auth

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav" style="direction: rtl">
                        <div class="nav-item dropdown " style="direction: rtl">
                            <a class="nav-link dropdown-toggle a-navbar li-navbar" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa-stack fa cursor" data-count="{{ count(auth()->user()->unreadnotifications) + $message_count }}">
                                    <i class="fa fa-circle fa-stack-2x" style="color: #580707"></i>
                                    <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                                @if (count(auth()->user()->unreadnotifications) == 0)
                                    <a class="dropdown-item" href="#">لا يوجد اشعارات جديدة حتى الان</a>
                                @if($message_count > 0)
                                <a class="dropdown-item" href="{{ route('site.dashboard') }}"> يوجد لديك <span style="border-radius: 10px; background-color: rgb(240, 69, 69) ; padding: 5px "> {{auth()->user()->inbox->count()}}</span> رساله واردة جديدة</a>

                                @endif
                                    @else
                                    @foreach (auth()->user()->unreadnotifications->take(10) as $item)
                                    <a class="dropdown-item" href="{{ route('site.dashboard') }}">{{ $item->data['title'] }}</a>

                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
@endauth
                    <div class="navbar-nav">
                        @guest
                @if (Route::current()->getName() == 'login')
                <a href="{{ route('register')}}" class="nav-item nav-link a-navbar li-navbar">   تسجيل اشتراك  <i class="fas fa-user-plus"></i> </a>

                @else
                <a href="{{ route('login')}}" class="nav-item nav-link a-navbar li-navbar">   تسجيل دخول  <i class="fas fa-user-plus"></i> </a>

                @endif
                @endguest
                        @auth

                        <ul class="navbar-nav">

                            <li class="nav-item active">
                                <a class="nav-link a-navbar li-navbar" href="{{ route('site.dashboard') }}" target="_blanck">    لوحة التحكم   <i class="fas fa-chart-pie"></i></a>
                            </li>




                            <li class="nav-item active">
                                <a class="nav-link a-navbar add-ads li-navbar" href="{{ route('advertismenets.create') }}"  > اضف اعلانك <i class="fas fa-tag"></i> </a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link a-navbar add-ads li-navbar" href="{{ route('buyers.advertisements') }}" > اعلانات التجار <i class="fas fa-th-list"></i> </a>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle a-navbar li-navbar" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="cursor" style="cursor: pointer;"> {{ auth()->user()->first_name }} <i class="fa fa-user" style="cursor: pointer;"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                                    <a class="dropdown-item" href="{{ route('my.profile')}}">حسابي</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('تسجيل الخروج') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                </div>
                            </li>
                        </ul>

                    <div class="collapse navbar-collapse justify-content-between" id="#">
                        <ul class="navbar-nav">

                        </ul>


                    </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        {{-- @include('admin.layouts.msg') --}}

@yield('content')

    <br /> <br /> <br /> <br />




    <!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-right">

      <!-- Grid row -->
      <div class="row">







        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4 Title-Head" >عن المنصة</h5>

            <ul class="list-unstyled list-Link">
              <li>
                <a href="{{ route('site.about') }}">فكرة منصة اشترينا</a>
              </li>
              <li>
                <a href="{{ route('site.polices') }}"> الشروط والاحكام</a>
              </li>


            </ul>

          </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->

        <div class="col-md-2 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4 Title-Head">روابط مهمة</h5>

            <ul class="list-unstyled list-Link">
              <li>
                <a href="{{ route('register') }}">تسجيل الاشتراك</a>
              </li>
              <li>
                <a href="{{ route('login') }}">تسجيل الدخول</a>
              </li>
              <li>
                <a href="{{ route('home') }}">صفحة الاعلانات</a>
              </li>

            </ul>

          </div>
        <!-- Grid column -->


             <!-- Grid column -->
             <div class="col-md-4 mx-auto">

                <!-- Content -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4 Title-Head" >{{ $settings->title ?? "موقع اشترينا" }}</h5>
                <p class="TextForFooter">
                    {{$settings->description ?? ".موقع يهدف الى  إتاحة خيار الشراكة في شراء سلع بالجملة ثم تفريقها بين الشركاء" }}
                </p>

              </div>
              <!-- Grid column -->
      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->








    <!-- Social buttons -->
    @if(json_decode($settings->social) !== null)

    <ul class="list-unstyled list-inline text-center" style="margin-top:15px">
        @foreach (json_decode($settings->social) as $key => $social)
      <li class="list-inline-item">
        <a  href="{{ $social->url }}">
          <img src="{{ asset('user_images/settings/'.($social->image ?? '')) }}" style="max-width: 50px; max-height: 50px  color: #fff;border-radius: 12px;font-size: 25px;    padding: 7px;">
        </a>
      </li>
      @endforeach
    </ul>
    @endif

    <!-- Social buttons -->
    <hr>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <a href="{{ route('main') }}" style="color: #6d1c1c;  font-weight: 900;">{{ $settings->domain ?? "Aishtarayna.com" }}</a>

       <span style="color: #6d1c1c;"  > © {{ date("Y") }} Copyright: </span>


    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  @include('sweetalert::alert')

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @yield('js')


</body>
    </html>



