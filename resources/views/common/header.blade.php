<div class="page-title-area">
    {{--    <div class="row">--}}
    {{--        <div class="col-sm-3">--}}
    {{--            <div class="nav-btn pull-left">--}}
    {{--                <span></span>--}}
    {{--                <span></span>--}}
    {{--                <span></span>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@yield('title')</h4>
                {{--                <ul class="breadcrumbs pull-left">--}}
                {{--                    <li><a href="{{ (currentUser()->role == 1) ? route('admin.admin-dashboard') : route('attendee.attendee-dashboard') }}">Home</a></li>--}}
                {{--                    <li><span>Dashboard</span></li>--}}
                {{--                </ul>--}}
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ currentUser()->image ? (asset('storage/') . '/' . currentUser()->image) : asset('assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ userName() }}<i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ (currentUser()->role == 1) ? route('admin.profile.edit', userId()) : route('attendee.profile.edit', userId()) }}">
                        <i class="fa-solid fa-user-pen" style="opacity: 75%;"></i>&nbsp;&nbsp;Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket" style="opacity: 75%;"></i>&nbsp;&nbsp;Log Out
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
