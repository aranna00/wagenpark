@extends('layouts.master')

@section('content')

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
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    {{ FA::icon('car') }}
                </div>
                <div class="details">
                    <div class="number">
                        {{ count($cars) }}
                    </div>
                    <div class="desc">
                        Total amount of cars
                    </div>
                </div>
                <a class="more" href="{{ URL::action('CarController@index') }}">
                    Show all <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    {{ FA::icon('users') }}
                </div>
                <div class="details">
                    <div class="number">
                        {{ count($users) }}
                    </div>
                    <div class="desc">
                        Total amount of users
                    </div>
                </div>
                <a class="more" href="{{ URL::action('UserController@index') }}">
                    Show all <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    {{ FA::icon('certificate') }}
                </div>
                <div class="details">
                    <div class="number">
                        {{ count($dealers) }}
                    </div>
                    <div class="desc">
                        Total amount of dealers
                    </div>
                </div>
                <a class="more" href="{{ URL::action('DealerController@index') }}">
                    Show all <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    {{ FA::icon('calendar') }}
                </div>
                <div class="details">
                    <div class="number">
                        {{ count($appointments) }}
                    </div>
                    <div class="desc">
                        Total amount of appointments
                    </div>
                </div>
                <a class="more" href="{{ URL::action('AppointmentsController@index') }}">
                    Show all <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow">
                <div class="visual">
                    {{ FA::icon('eur') }}
                </div>
                <div class="details">
                    <div class="number">
                        {{ round($amount,2) }}
                    </div>
                    <div class="desc">
                        Total amount paid
                    </div>
                </div>
                <a class="more" href="{{ URL::action('AppointmentsController@index') }}">
                    Show all <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    {{ FA::icon('eur') }}
                </div>
                <div class="details">
                    <div class="number">
                        {{ round($amount/count($appointments),2) }}
                    </div>
                    <div class="desc">
                        Avarage payment per appointment
                    </div>
                </div>
                <a class="more" href="{{ URL::action('AppointmentsController@index') }}">
                    Show all <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>

@endsection