<!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="@if(!empty(Auth::guard('admin')->user()->image)) {{ asset('/images/admin_images/admin_photos/' . Auth::guard('admin')->user()->image) }} @else /images/admin_images/user.png @endif" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ ucwords(Auth::guard('admin')->user()->name) }}</div>
                <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li @if(Session::get('page') == "profile") class="active" @endif><a href="{{ url('/admin/profile') }}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/admin/logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        @if(Auth::guard('admin')->user()->type == 'admin')
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li @if(Session::get('page') == "dashboard") class="active" @endif>
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if(Session::get('page') == "view-admins") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">admin_panel_settings</i>
                            <span>Admins</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-admins") class="active" @endif>
                                <a href="{{ url('/admin/view-admins') }}">Add Admins</a>
                            </li>
                            <li @if(Session::get('page') == "view-admins") class="active" @endif>
                                <a href="{{ url('/admin/view-admins') }}">View Admins</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-admins") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shield</i>
                            <span>Sub-Admins</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-admins") class="active" @endif>
                                <a href="{{ url('/admin/view-admins') }}">Add Sub-Admins</a>
                            </li>
                            <li @if(Session::get('page') == "view-admins") class="active" @endif>
                                <a href="{{ url('/admin/view-admins') }}">View Sub-Admins</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "add-donor" || Session::get('page') == "add-corporate-donor" || Session::get('page') == "view-donors") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Donors</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "add-donor") class="active" @endif>
                                <a href="{{ url('/admin/add-donor') }}">Add Donors</a>
                            </li>
                            <li @if(Session::get('page') == "add-corporate-donor") class="active" @endif>
                                <a href="{{ url('/admin/add-corporate-donor') }}">Add Corporate Donors</a>
                            </li>
                            <li @if(Session::get('page') == "view-donors") class="active" @endif>
                                <a href="{{ url('/admin/view-donors') }}">View Donors</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-users") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">money</i>
                            <span>Donation</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">Add Donation</a>
                            </li>
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">View Donation</a>
                            </li>
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">Analytics</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-devices") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">manage_accounts</i>
                            <span>Groups</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-devices") class="active" @endif>
                                <a href="{{ url('/admin/view-devices') }}">Add Groups</a>
                            </li>
                            <li @if(Session::get('page') == "view-devices") class="active" @endif>
                                <a href="{{ url('/admin/view-devices') }}">View Groups</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-inputs") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">notification_important</i>
                            <span>Reminders</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-inputs") class="active" @endif>
                                <a href="{{ url('/admin/view-inputs') }}">Add Reminder Data</a>
                            </li>
                            <li @if(Session::get('page') == "view-inputs") class="active" @endif>
                                <a href="{{ url('/admin/view-inputs') }}">View Reminder Data</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">format_shapes</i>
                            <span>Marketing / Ads</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                                <a href="{{ url('/admin/view-recipes') }}">Push Ads</a>
                            </li>
                            <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                                <a href="{{ url('/admin/view-recipes') }}">Schedule Ads</a>
                            </li>
                            <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                                <a href="{{ url('/admin/view-recipes') }}">View Ads</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @elseif(Auth::guard('admin')->user()->type == 'sub-admin')
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li @if(Session::get('page') == "dashboard") class="active" @endif>
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if(Session::get('page') == "view-users") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Donors</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">Add Donors</a>
                            </li>
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">View Donors</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-users") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">money</i>
                            <span>Donation</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">Add Donation</a>
                            </li>
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">View Donation</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-inputs") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">notification_important</i>
                            <span>Reminders</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-inputs") class="active" @endif>
                                <a href="{{ url('/admin/view-inputs') }}">Add Reminder Data</a>
                            </li>
                            <li @if(Session::get('page') == "view-inputs") class="active" @endif>
                                <a href="{{ url('/admin/view-inputs') }}">View Reminder Data</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">format_shapes</i>
                            <span>Marketing / Ads</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                                <a href="{{ url('/admin/view-recipes') }}">Push Ads</a>
                            </li>
                            <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                                <a href="{{ url('/admin/view-recipes') }}">Schedule Ads</a>
                            </li>
                            <li @if(Session::get('page') == "view-recipes") class="active" @endif>
                                <a href="{{ url('/admin/view-recipes') }}">View Ads</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
        <!-- #Menu -->

        @include('layouts.admin_layout.admin_footer')

    </aside>
<!-- #END# Left Sidebar -->
