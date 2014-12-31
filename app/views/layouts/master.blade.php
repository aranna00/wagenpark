<HTML lang="nl" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.layouts.includes')
    @yield('title')
</head>
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
@if(!Request::is('login'))
    <div class="header navbar navbar-inverse navbar-fixed-top">
        @include('admin.layouts.header')
    </div>
    @endif
            <!-- END HEADER -->
    <div class="clearfix"></div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        @if(!Request::is('login'))
            <div class="page-sidebar-wrapper">
                @include('admin.layouts.sidebar')
            </div>
            @endif
                    <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @if($errors->any())
                        <div class="errors clearfix">
                            <ul>
                                {{ implode('',$errors->all('<li>:message</li>')) }}
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
            <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">
            Created by Aran Kieskamp.
        </div>
        <div class="footer-tools">
                <span class="go-top">
                    {{ FA::icon('angle-up') }}
                </span>
        </div>
    </div>
    <!-- END FOOTER -->
    {{ HTML::script('template/plugins/respond.min.js') }}
    {{ HTML::script('template/plugins/excanvas.min.js') }}

    {{ HTML::script('template/plugins/jquery-migrate-1.2.1.min.js') }}
    {{ HTML::script('template/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
    {{ HTML::script('template/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
    {{ HTML::script('template/plugins/jquery.blockui.min.js') }}
    {{ HTML::script('template/plugins/jquery.cokie.min.js') }}
    {{ HTML::script('template/plugins/uniform/jquery.uniform.min.js') }}
    {{ HTML::script('assets/javascript/jquery-ui.min.js') }}
    {{ HTML::script('template/plugins/data-tables/DT_bootstrap.js') }}
    {{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('template/scripts/core/app.js') }}



    <script>
        jQuery(document).ready(function() {
            App.init();
            jQuery('.dataTables_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
            jQuery('.dataTables_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
        });
    </script>
</body>
</html>
