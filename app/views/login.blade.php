<head>
    @include('layouts.includes')
    {{ HTML::style('template/plugins/uniform/css/uniform.default.css') }}
    {{ HTML::style('template/plugins/select2/select2.css') }}
    {{ HTML::style('template/plugins/select2/select2-metronic.css') }}
    {{ HTML::style('template/css/style-metronic.css') }}
    {{ HTML::style('template/css/pages/login.css') }}
</head>
<body class="login">
<div class="logo">
</div>
<div class="content">
    {{ Form::open(['action'=>'LoginController@store','class'=>'login-form']) }}
    <h3 class="form-title">Log in je account</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
                <span>
                    Voer email en wachtwoord in
                </span>
    </div>
    <div class="form-group @if($errors->first('email')!=='') has-error @endif">
        {{ Form::label('email','Mail addres: ',['class'=>"control-label visible-ie8 visible-ie9"]) }}
        <div class="input-icon">
            {{ FA::icon('user') }}
            {{ Form::email('email',"",["class"=>"form-control placeholder-no-fix",'placeholder'=>'Email','autocomplete'=>'off']) }}
            <span class="help-block">{{ $errors->first('email') }}</span>
        </div>
    </div>
    <div class="form-group @if($errors->first('password')!=='') has-error @endif">
        {{ Form::label('password','Password: ',['class'=>"control-label visible-ie8 visible-ie9"]) }}
        <div class="input-icon">
            {{ FA::icon('lock') }}
            {{ Form::password('password',['class'=>'form-control placeholder-no-fix','placeholder'=>'password','autocomplete'=>'off']) }}
            <span class="help-block">{{ $errors->first('password')}}</span>
        </div>
    </div>
    <div class="form-actions">
        {{ Form::label('remember', 'Onthoud mij' ,['class'=>'checkbox']) }}
        {{ Form::checkbox('remember') }}
        {{ Form::submit('login',['class'=>'btn green pull-right']) }}
    </div>
    <div class="login-options"></div>
    <div class="forget-password">
        <h4>Wachtwoord vergeten?</h4>
        <p>
            Klik <a href="{{ URL::action('UserController@forgotten') }}">hier</a> om je wachtwoord te resetten
        </p>

    </div>
    {{ Form::close() }}
</div>
{{ HTML::script('template/plugins/respond.min.js') }}
{{ HTML::script('template/plugins/excanvas.min.js') }}

{{ HTML::script('template/plugins/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('template/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{ HTML::script('template/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('template/plugins/jquery.blockui.min.js') }}
{{ HTML::script('template/plugins/jquery.cokie.min.js') }}
{{ HTML::script('template/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('template/plugins/uniform/jquery.uniform.min.js') }}
{{ HTML::script('assets/javascript/jquery-ui.min.js') }}

{{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
{{ HTML::script('template/scripts/core/app.js') }}
<script>
    jQuery(document).ready(function() {
        App.init();
        Login.init();
    });
</script>
<div class="copyright">
    Created by Aran Kieskamp
</div>
</body>
