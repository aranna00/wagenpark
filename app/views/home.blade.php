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
                    {{ FA::icon('birthday-cake') }}
                </div>
                <div class="details">
                    <div class="number">
                        5
                    </div>
                    <div class="desc">
                        voorbeeld stats
                    </div>
                </div>
                <a class="more" href="">
                    Bekijk alle <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

@endsection