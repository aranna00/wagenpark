<HTML lang="en" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.includes')
    <title>{{ $title }}</title>
</head>
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
@if(!Request::is('login'))
    <div class="header navbar navbar-inverse navbar-fixed-top">
        @if(Sentry::check())
            @include('layouts.header')
        @endif
    </div>
    @endif
            <!-- END HEADER -->
    <div class="clearfix"></div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        @if(!Request::is('login'))
            <div class="page-sidebar-wrapper">
                @include('layouts.sidebar')
            </div>
            @endif
                    <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @if($errors->first('notice')!=='')
                        {{ $errors->first('notice') }}
                    @endif

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="page-title">
                                    Dashboard
                                </h3>
                                <ul class="page-breadcrumb breadcrumb">
                                    <li>
                                        {{ FA::icon('home') }}
                                        <a href="{{ URL::action('HomeController@index') }}">
                                            Home
                                        </a>
                                        {{ FA::icon('angle-right') }}
                                    </li>
                                    <li>
                                        <a href="{{ URL::action('HomeController@index') }}">
                                            404 not found
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 page-404">
                                <div class="number">
                                    404
                                </div>
                                <div class="details">
                                    <h3>Oops! You're lost.</h3>
                                    <p>
                                        We can not find the page you're looking for.<br/>
                                        <a href="{{ URL::action('HomeController@index') }}">
                                            Return home
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
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
    {{ HTML::script('assets/javascript/custom.js') }}



    <script>
        jQuery(document).ready(function() {
            App.init();
            jQuery('.dataTables_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
            jQuery('.dataTables_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
        });
    </script>
</body>
</html>
