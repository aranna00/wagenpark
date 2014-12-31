<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <li class="sidebar-toggler-wrapper">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone">
            </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <li class="start @if(Request::is('admin')) {{ 'active' }} @endif ">
            <a href="{{ URL::action('admin\HomeController@index') }}">
                {{ FA::icon('home') }}
                <span class="title">
                    Dashboard
                </span>
                <span class="@if(Request::is('admin')) {{ 'selected' }} @endif ">
                </span>
            </a>
        </li>
    </ul>
</div>