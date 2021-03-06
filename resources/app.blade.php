

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="{{ asset('assets/Css/StyleLogin.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=dubai-bold" />
    <script src="https://kit.fontawesome.com/99d5e885f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=bokra" />
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=boutros-ads" />
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=mehrajan" />
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=mehrajan" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Xanh+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital@1&display=swap" rel="stylesheet">



<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">


</head>
<body>

 <!--navbar-->
 <nav class="navbar navbar-expand-md fixed-top navbar-org">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('assets/img/اشترينا001.jpg')}}"   >
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">

            </div>

            <div class="navbar-nav">
                @guest
                <a href="{{ route('register')}}" class="nav-item nav-link a-navbar li-navbar">   تسجيل اشتراك  <i class="fas fa-user-plus"></i> </a>
                @endguest
                @auth

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <a class="nav-link a-navbar add-ads li-navbar" href="#"> اضف اعلانك <i class="fas fa-tag"></i> </a>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="#">
                <ul class="navbar-nav">

                </ul>

                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a class="nav-link a-navbar li-navbar" href="DashboardCustomer.html" target="_blanck">    لوحة التحكم   <i class="fas fa-chart-pie"></i></a>
                    </li>



                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle a-navbar li-navbar" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="cursor" style="cursor: pointer;">

                                <i class="far fa-bell" style="cursor: pointer;"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" href="#">لا يوجد اشعارات جديدة حتى الان</a>
                            <a class="dropdown-item" href="#">لقد تم تغيير كلمة مرور الخاصة بحسابك </a>
                        </div>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link a-navbar add-ads li-navbar" href="AddAdvertisement.html"  > اضف اعلانك <i class="fas fa-tag"></i> </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link a-navbar li-navbar" href="#" > الاقسام <i class="fas fa-th-list"></i> </a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle a-navbar li-navbar" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="cursor" style="cursor: pointer;"> ابراهيم مصطفى   <i class="fa fa-user" style="cursor: pointer;"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" href="#">حسابي</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </li>
                </ul>
            </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

@yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>



