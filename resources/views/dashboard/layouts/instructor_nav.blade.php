<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{adminUrl('/')}}">{{--<img src="{{asset('dashboard/assets/images/LRC-logo-white.png')}}" width="80" alt="Aero">--}}<span class="m-l-10"> {{config('app.name')}} Dashboard</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="{{adminUrl('admin/' . auth()->guard('admin')->user()->id . '/edit')}}"><img src="{{asset('dashboard/assets/images/user.png')}}" alt="User"></a>
                    <div class="detail">
                        <h4> {{auth()->guard('admin')->user()->name}} </h4>
                        <small>Admin</small>
                    </div>
                </div>
            </li>
            <li class="{{request()->segment(2) == 'course' || request()->segment(2) == 'course-calendar' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Course</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('course')}}">Show Courses</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'round' || request()->segment(2) == 'round-calendar' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-videocam"></i><span>Round</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('round')}}">Show Rounds</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'exam' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-format-list-bulleted"></i><span>Exams</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('exam')}}">Exams</a></li>
                    <li><a href="{{adminUrl('exam/create')}}">  New Exam </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'calendar' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar"></i><span>Calendar</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('calendar')}}">Show Calendar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
