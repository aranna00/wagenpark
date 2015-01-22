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
                                home
                            </a>
                            {{ FA::icon('angle-right') }}
                        </li>
                        <li>
                            <a href="{{ URL::action('UserController@index') }}">
                                All cars
                            </a>
                            {{ FA::icon('angle-right') }}
                        </li>
                        <li>
                            <a ="{{ URL::action('UserController@create') }}">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="portlet-body form">
                {{ Form::open(['action'=>['CarController@store'],'class'=>'form-horizontal']) }}
                <div class="form-body">

                    <div class="form-group @if($errors->first('license_plate')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('license_plate','License plate <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::text('license_plate','',['class'=>'form-control','maxlength'=>8]) }}
                            <span class="help-block">{{ $errors->first('license_plate') }}</span>
                        </div>
                    </div>

                    <div class="form-group @if($errors->first('brand')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('brand','Brand <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::text('brand','',['class'=>'form-control']) }}
                            <span class="help-block">{{ $errors->first('brand') }}</span>
                        </div>
                    </div>

                    <div class="form-group @if($errors->first('dealer_id')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('dealer_id','Dealer <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::select('dealer_id',$dealers,'',['class'=>'form-control']) }}
                            <span class="help-block">{{ $errors->first('dealer_id') }}</span>
                        </div>
                    </div>

                    <div class="form-group @if($errors->first('user_id')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('user_id','User <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::select('user_id',$users,'',['class'=>'form-control']) }}
                            <span class="help-block">{{ $errors->first('user_id') }}</span>
                        </div>
                    </div>

                </div>
                <div class="form-actions fluid">
                    {{ Form::submit('Submit',['class'=>'btn blue']) }}
                    <a href="{{ URL::action('CarController@index') }}" class="btn default">Back</a>
                </div>
                {{ Form::close() }}
            </div>


        </div>
    </div>

@endsection