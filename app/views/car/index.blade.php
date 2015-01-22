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
                            <a href="{{ URL::action('CarController@index') }}">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @if(!Session::get('userAccess'))
            <p>
                <a href="{{ URL::action('CarController@create') }}" class="btn btn-default">Add car</a>
            </p>
            @endif
            <table id="cars" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>license plate</th>
                    <th>brand</th>
                    <th>dealer</th>
                    <th>user</th>
                    @if(!Session::get('userAccess'))
                        <th>actions</th>
                    @endif
                </thead>
                <tbody>
                    @foreach($cars AS $car)
                        <tr>
                            @if(!Session::get('userAccess'))
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->license_plate }}</a></td>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->brand }}</a></td>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->dealer->name }}</a></td>
                            <td><a href="{{ URL::action('CarController@edit',$car->id) }}">{{ $car->user->email }}</a></td>
                            <td>
                                <a href="{{ URL::action('CarController@edit', $car->id) }}">{{ FA::icon('edit') }}</a>
                                <a href="javascript:if(window.confirm('Are you sure?'))
                                                    {
                                                        console.log('{{ $car->id }}');
                                                        $.post('{{ URL::action('CarController@destroy',$car->id) }}',{_method:'delete'});
                                                        setTimeout(function(){location.reload(true)},1000);
                                                    }">
                                    {{ FA::icon('remove') }}
                                </a>
                            </td>
                            @else
                                <td>{{ $car->license_plate }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->dealer->name }}</td>
                                <td>{{ $car->user->email }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection