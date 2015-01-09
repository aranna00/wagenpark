@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="container white-bg">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">
                        {{ $title }}
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
                            <a href="{{ URL::action('UserController@index') }}">
                                Users
                            </a>
                            {{ FA::icon('angle-right') }}
                        </li>
                        <li>
                            <a href="{{ URL::action('UserController@edit', $user->id) }}">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="portlet-body form">
                {{ Form::open(['action'=>['UserController@update',$user->id],'method'=>'put','class'=>'form-horizontal']) }}
                    <div class="form-body">

                        <div class="form-group @if($errors->first('email')!=='') has-error @endif">
                            {{ HTML::decode(Form::label('email','Email <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                            <div class="col-md-4">
                                {{ Form::email('email',$user->email,['class'=>'form-control']) }}
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="form-group @if($errors->first('password')!=='') has-error @endif">
                            {{ HTML::decode(Form::label('password','Password',['class'=>'control-label col-md-3'])) }}
                            <div class="col-md-4">
                                {{ Form::password('password',['class'=>'form-control']) }}
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            </div>
                        </div>

                        <div class="form-group @if($errors->first('password_confirmation')!=='') has-error @endif">
                            {{ HTML::decode(Form::label('password_confirmation','Confirm password',['class'=>'control-label col-md-3'])) }}
                            <div class="col-md-4">
                                {{ Form::password('password_confirmation',['class'=>'form-control']) }}
                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>

                        <div class="form-group @if($errors->first('first_name')!=='') has-error @endif">
                            {{ HTML::decode(Form::label('fist_name','First name<span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                            <div class="col-md-4">
                                {{ Form::text('first_name',$user->first_name,['class'=>'form-control']) }}
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                            </div>
                        </div>

                        <div class="form-group @if($errors->first('last_name')!=='') has-error @endif">
                                {{ HTML::decode(Form::label('last_name','Last name<span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                                <div class="col-md-4">
                                    {{ Form::text('last_name',$user->last_name,['class'=>'form-control']) }}
                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions fluid">
                            {{ Form::submit('Submit',['class'=>'btn blue']) }}
                            <a href="{{ URL::action('UserController@index') }}" class="btn default">Back</a>
                        </div>

                    </div>

            </div>

        </div>
    </div>

@endsection