<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <li class="sidebar-toggler-wrapper">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone">
            </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <li class="start @if(Request::is('')||Request::is('home')) {{ 'active' }} @endif ">
            <a href="{{ URL::action('HomeController@index') }}">
                {{ FA::icon('home') }}
                <span class="title">
                    Dashboard
                </span>
            </a>
        </li>
        @if(Sentry::getUser()->inGroup(Cache::get('adminGroup')))
            <li class="start @if(Request::is('users')||Request::is('users/*')){{ 'active' }} @endif ">
                <a href="{{ URL::action('UserController@index') }}">
                    {{ FA::icon('users') }}
                    <span class="title">
                        Users
                    </span>
                </a>
            </li>
        @endif
        @if(Sentry::getUser()->inGroup(Cache::get('dealerGroup'))||Sentry::getUser()->inGroup(Cache::get('adminGroup')))
            <li class="start @if(Request::is('cars')||Request::is('cars/*')) active @endif">
                <a href="{{ URL::action('CarController@index') }}">
                    {{ FA::icon('car') }}
                    <span class="title">
                        Cars
                    </span>
                </a>
            </li>
        @endif
    </ul>
</div>