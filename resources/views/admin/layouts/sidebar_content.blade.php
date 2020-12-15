<li class="start @if (substr(Route::current()->getName() , 0 ,5 ) == "users" )
active
@endif">

    <a href="javascript:;">
        <i class="icon-home"></i>
    <span class="title">ادارة المستخدمين</span>
    <span class="arrow "></span>

    </a>
    <ul class="sub-menu">
        <li >
        <a href="{{ route('users.index') }} ">
            <i class="icon-bar-chart"></i>
            عرض المستخدمين</a>
        </li>
        <li>
            <a href="{{ route('users.inactive') }}">
            <i class="icon-bulb"></i>
             الغبر مفعلين</a>
        </li>
        <li>
            <a href="{{ route('users.deleted') }}">
            <i class="icon-bulb"></i>
              المحذوفين</a>
        </li>
        <li>
        <a href="{{ route('users.create') }}">
            <i class="icon-graph"></i>
            اضافه مستخدم</a>
        </li>
    </ul>
</li>

<li class="start @if (substr(Route::current()->getName() , 0 ,6 ) == "cities" )
    active
    @endif">

        <a href="javascript:;">
            <i class="icon-home"></i>
        <span class="title">ادارة  الاعلانات</span>
        <span class="arrow "></span>

        </a>
        <ul class="sub-menu">
            <li >
            <a href="{{ route('advertisements.index') }} ">
                <i class="icon-bar-chart"></i>
                عرض الاعلانات</a>
            </li>
            <li >
                <a href="{{ route('advertisements.create') }} ">
                    <i class="icon-bar-chart"></i>
                    اضافة جديد </a>
                </li>
        </ul>
    </li>
<li class="start @if (substr(Route::current()->getName() , 0 ,10 ) == "categories" )
    active
    @endif">

        <a href="javascript:;">
            <i class="icon-home"></i>
        <span class="title">ادارة تصنيفات الاعلانات</span>
        <span class="arrow "></span>

        </a>
        <ul class="sub-menu">
            <li >
            <a href="{{ route('categories.index') }} ">
                <i class="icon-bar-chart"></i>
                عرض التصنيفات</a>
            </li>
            <li >
                <a href="{{ route('categories.create') }} ">
                    <i class="icon-bar-chart"></i>
                    اضافة جديد </a>
                </li>
        </ul>
    </li>

<li class="start @if (substr(Route::current()->getName() , 0 ,6 ) == "cities" )
active
@endif">

    <a href="javascript:;">
        <i class="icon-home"></i>
    <span class="title">ادارة  المدن</span>
    <span class="arrow "></span>

    </a>
    <ul class="sub-menu">
        <li >
        <a href="{{ route('cities.index') }} ">
            <i class="icon-bar-chart"></i>
            عرض المدن</a>
        </li>
        <li >
            <a href="{{ route('cities.create') }} ">
                <i class="icon-bar-chart"></i>
                اضافة جديد </a>
            </li>
    </ul>
</li>
<li class="start @if (substr(Route::current()->getName() , 0 ,13 ) == "subscriptions" )
    active
    @endif">

        <a href="javascript:;">
            <i class="icon-home"></i>
        <span class="title">ادارة   الاشتراكات</span>
        <span class="arrow "></span>

        </a>
        <ul class="sub-menu">
            <li >
            <a href="{{ route('subscriptions.index') }} ">
                <i class="icon-bar-chart"></i>
                عرض الاشتراكات </a>
            </li>
            <li >
                <a href="{{ route('subscriptions.create') }} ">
                    <i class="icon-bar-chart"></i>
                    اضافة جديد </a>
                </li>
        </ul>
    </li>
    <li class="start @if (substr(Route::current()->getName() , 0 ,19 ) == "advertisement_types" )
        active
        @endif">

            <a href="javascript:;">
                <i class="icon-home"></i>
            <span class="title">ادارة  انواع المنتجات</span>
            <span class="arrow "></span>

            </a>
            <ul class="sub-menu">
                <li >
                <a href="{{ route('advertisement_types.index') }} ">
                    <i class="icon-bar-chart"></i>
                    عرض انواع المنتجات </a>
                </li>
                <li >
                    <a href="{{ route('advertisement_types.create') }} ">
                        <i class="icon-bar-chart"></i>
                        اضافة جديد </a>
                    </li>
            </ul>
        </li>
    <li class="start @if (substr(Route::current()->getName() , 0 ,14 ) == "delivery_times" )
        active
        @endif">

            <a href="javascript:;">
                <i class="icon-home"></i>
            <span class="title">ادارة   وقت تسليم المنتجات</span>
            <span class="arrow "></span>

            </a>
            <ul class="sub-menu">
                <li >
                <a href="{{ route('delivery_times.index') }} ">
                    <i class="icon-bar-chart"></i>
                    عرض وقت تسليم المنتجات </a>
                </li>
                <li >
                    <a href="{{ route('delivery_times.create') }} ">
                        <i class="icon-bar-chart"></i>
                        اضافة جديد </a>
                    </li>
            </ul>
        </li>

<li class="start @if (substr(Route::current()->getName() , 0 ,14 ) == "admin.settings" )
    active
    @endif">

        <a href="javascript:;">
            <i class="icon-home"></i>
        <span class="title">اعدادات الموقع</span>
        <span class="arrow "></span>

        </a>
        <ul class="sub-menu">
            <li >
            <a href="{{ route('admin.settings') }} ">
                <i class="icon-bar-chart"></i>
                الاعدادات </a>
            </li>
            <li >
                <a href="{{ route('admin.settings.images') }} ">
                    <i class="icon-bar-chart"></i>
                    الصور الترحيبية </a>
            </li>
            <li >
                <a href="{{ route('admin.settings.social') }} ">
                    <i class="icon-bar-chart"></i>
                    التواصل الاجتماعي  </a>
            </li>
        </ul>
    </li>
<li class="last @if (substr(Route::current()->getName() , 0 ,5 ) == "roles")
active
@endif"">
    <a href="javascript:;">
    <i class="icon-pointer"></i>
    <span class="title">ادارة الصلاحيات</span>
    <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{ route('roles.index')}}">
            عرض الصلاحيات</a>
        </li>
        <li>
            <a href="{{ route('roles.create')}}">
                اضافة صلاحية جديدة
            </a>
        </li>
    </ul>
</li>
