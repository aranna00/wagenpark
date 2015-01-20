@extends('layouts.master')

@section('content')
    <script type="text/javascript">
        $(window).load(function(){
            $('#date').glDatePicker({
                cssName:        'darkneon',
                selectableDOW:  [1,2,3,4,5],
                dowOffset:      1,
                specialDates:   [
                    @foreach($appointments AS $appointment)
                    {
                        date:       new Date({{date('Y',strtotime($appointment->date)).','.(date('m',strtotime($appointment->date))-1).','.date('d',strtotime($appointment->date)) }}),
                        cssClass:   'noday special-red',
                        data:       { message: 'This date has been reserved by: {{ $appointment->user->email }}' }
                    },
                    @endforeach
                ],
                onClick: function(target, cell, date, data) {
                    if(data == null)
                    {
                        var month = date.getMonth()+1;
                        target.val(date.getFullYear() + '/' +
                        month+ '/' +
                        date.getDate());
                    }
                    else{
                        alert(data.message);
                    }
                },
                selectableDateRange:    [{from:new Date('{{ date('Y,m,d',strtotime('+1 day')) }}'), to:new Date({{time()}}+1e15)}]
            });
        });
    </script>

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
                            <a href="{{ URL::action('AppointmentsController@index') }}">
                                All appointments
                            </a>
                            {{ FA::icon('angle-right') }}
                        </li>
                        <li>
                            <a ="{{ URL::action('AppointmentsController@create') }}">
                            {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="portlet-body form">
                {{ Form::open(['action'=>['AppointmentsController@store'],'class'=>'form-horizontal']) }}
                <div class="form-body">

                    <div class="form-group @if($errors->first('date')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('date','Date <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::text('date','',['class'=>'form-control','id'=>'date']) }}
                            <span class="help-block">{{ $errors->first('date') }}</span>
                        </div>
                    </div>

                    <div class="form-group @if($errors->first('car_id')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('car_id','License plate <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ Form::select('car_id',$cars) }}
                            <span class="help-block">{{ $errors->first('car_id') }}</span>
                        </div>
                    </div>

                    <div class="form-group @if($errors->first('price')!=='') has-error @endif">
                        {{ HTML::decode(Form::label('price','Price <span class="required">*</span>',['class'=>'control-label col-md-3'])) }}
                        <div class="col-md-4">
                            {{ HTML::decode(Form::number('price','',['class'=>'form-control','id'=>'price','step'=>"0.01","min"=>0])) }}
                            <span class="help-block">{{ $errors->first('price') }}</span>
                        </div>
                    </div>


                </div>
                <div class="form-actions fluid">
                    {{ Form::submit('Submit',['class'=>'btn blue']) }}
                    <a href="{{ URL::action('AppointmentsController@index') }}" class="btn default">Back</a>
                </div>
                {{ Form::close() }}
            </div>


        </div>
    </div>

@endsection