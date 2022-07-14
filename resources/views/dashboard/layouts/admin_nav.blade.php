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
            <li class="active open"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i><span>Dashboard </span></a></li>
            <li class="{{request()->segment(2) == 'student' || request()->segment(2) == 'enrollment' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>Students </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('student')}}">Show Students</a></li>
                    <li><a href="{{adminUrl('enrollment')}}">Show Enrollment Requests</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'corporate' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-compass"></i><span>Corporates </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('corporate')}}">Corporates</a></li>
                    <li><a href="{{adminUrl('corporate/create')}}">New Corporate</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'instructor' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-graduation-cap"></i><span>Instructors </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('instructor')}}">Instructors</a></li>
                    <li><a href="{{adminUrl('instructor/create')}}">New Instructor</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'course' || request()->segment(2) == 'course-calendar' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Course</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('course')}}">Show Courses</a></li>
                    <li><a href="{{adminUrl('course/create')}}"> New Course </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'round' || request()->segment(2) == 'round-calendar' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-videocam"></i><span>Round</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('round')}}">Show Rounds</a></li>
                    <li><a href="{{adminUrl('round/create')}}">  New Round </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'exam' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-format-list-bulleted"></i><span>Exams</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('exam')}}">Exams</a></li>
                    <li><a href="{{adminUrl('exam/create')}}">  New Exam </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'room' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-laptop-chromebook"></i><span>Labs</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('room')}}">Labs</a></li>
                    <li><a href="{{adminUrl('room/create')}}">  New Lab </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'calendar' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar"></i><span>Calendar</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('calendar')}}">Show Calendar</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'category' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-list"></i><span>Category</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('category')}}">Show Categories</a></li>
                    <li><a href="{{adminUrl('category/create')}}"> New Category </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'page' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Pages</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('page')}}">Show Pages</a></li>
                    <li><a href="{{adminUrl('page/create')}}"> New Page </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'partner' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-compass"></i><span>Partner</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('partner')}}">Show Partners</a></li>
                    <li><a href="{{adminUrl('partner/create')}}"> New Partner </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'admin' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>Admins </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('admin')}}"> Show Admins </a></li>
                    <li><a href="{{adminUrl('admin/create')}}">New Admin</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
