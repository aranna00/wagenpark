
<!-- BEGIN TOP NAVIGATION BAR -->
<div class="header-inner">
    <!-- BEGIN LOGO -->
    <a class="navbar-brand" href="#">

    </a>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <img src="{{ URL::asset('template/img/menu-toggler.png') }}" alt="" />
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
                <span class="username">{{ Sentry::getUser()->first_name }}</span>
                {{ FA::icon('angle-down') }}
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::action('UserController@edit',Sentry::getUser()->id) }}">{{ FA::icon('user') }} My Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="javascript:if(window.confirm('Are you sure?'))
                                                    {
                                                        $.post('{{ URL::action('LoginController@destroy') }}',{_method:'delete'});
                                                        setTimeout(function(){location.reload(true)},1000);
                                                    }">
                    {{ FA::icon('key') }} Log out
                </a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
