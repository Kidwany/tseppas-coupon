@if(isAdmin())
    @include('dashboard.layouts.admin_nav')
@endif

@if(isInstructor())
    @include('dashboard.layouts.instructor_nav')
@endif
