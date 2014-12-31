
<!-- BEGIN TOP NAVIGATION BAR -->
<div class="header-inner">
    <!-- BEGIN LOGO -->
    <a class="navbar-brand" href="#">

    </a>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <img src="{{ URL::asset('assets/template/img/menu-toggler.png') }}" alt="" />
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        <!-- END NOTIFICATION DROPDOWN -->
        <!-- BEGIN INBOX DROPDOWN -->
        <!-- END INBOX DROPDOWN -->
        <!-- BEGIN TODO DROPDOWN -->
        <!-- END TODO DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="username">Demo</span>
                {{ FA::icon('angle-down') }}
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::action('admin\UserController@show',Sentry::getUser()->id) }}">{{ FA::icon('user') }} My Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ URL::action('LoginController@destroy') }}">{{ FA::icon('key') }} Log Out</a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
