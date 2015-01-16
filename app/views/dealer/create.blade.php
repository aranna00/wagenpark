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
                                All dealers
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
                {{ Form::open(['action'=>['DealerController@store'],'class'=>'form-horizontal']) }}
                <div class="form-body">

                    <div class="form-group @if($errors->first('name')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('name','Name <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::text('name','',['class'=>'form-control']) }}
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                </div>
                <div class="form-actions fluid">
                    {{ Form::submit('Submit',['class'=>'btn blue']) }}
                    <a href="{{ URL::action('DealerController@index') }}" class="btn default">Back</a>
                </div>
                {{ Form::close() }}
            </div>


        </div>
    </div>

@endsection