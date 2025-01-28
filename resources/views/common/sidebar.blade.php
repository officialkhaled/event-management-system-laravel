<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="#"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ (currentUser()->role == 1) ? route('admin.admin-dashboard') : route('attendee.attendee-dashboard') }}">
                            <i class="fa-solid fa-house-chimney"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/events*') ? 'active' : '' }}">
                        <a href="{{ (currentUser()->role == 1) ? route('admin.events.index') : route('attendee.events.index') }}">
                            <i class="fa fa-table"> </i> <span>Events</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/attendees*') ? 'active' : '' }}">
                        <a href="{{ route('admin.attendees.index') }}">
                            <i class="fa-solid fa-user-group"></i> <span>Attendees</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
