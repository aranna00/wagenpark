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
                            <a href="{{ URL::action('CarController@index') }}">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <p>
                <a href="{{ URL::action('CarController@create') }}" class="btn btn-default">Create User</a>
            </p>

            <table id="cars" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>license plate</th>
                    <th>brand</th>
                    <th>dealer</th>
                    <th>user</th>
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($cars AS $car)
                        <tr>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->license_plate }}</a></td>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->brand }}</a></td>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->dealer_id }}</a></td>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->user_id }}</a></td>
                            <td>
                                <a href="{{ URL::action('CarController@edit', $car->id) }}">{{ FA::icon('edit') }}</a>
                                <a href="javascript:if(window.confirm('Are you sure?'))
                                                    {
                                                        console.log('{{ $car->id }}');
                                                        $.post('{{ URL::action('CarController@destroy',$car->id) }}',{_method:'method'});
                                                        location.reload();
                                                    }">
                                    {{ FA::icon('remove') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection