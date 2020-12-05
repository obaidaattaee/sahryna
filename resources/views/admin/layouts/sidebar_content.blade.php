<li class="start @if (substr(Route::current()->getName() , 0 ,5 ) == "users" )
active
@endif">

    <a href="javascript:;">
        <i class="icon-home"></i>
    <span class="title">المستخدمين</span>
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


<li class="last @if (substr(Route::current()->getName() , 0 ,5 ) == "roles")
active
@endif"">
    <a href="javascript:;">
    <i class="icon-pointer"></i>
    <span class="title">الصلاحيات</span>
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
