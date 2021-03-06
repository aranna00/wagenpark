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
                            <a href="{{ URL::action('AppointmentsController@index') }}">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @if(!Session::get('userAccess'))
            <p>
                <a href="{{ URL::action('AppointmentsController@create') }}" class="btn btn-default">Create appointment</a>
            </p>
            @endif
            <table id="appointments" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>date</th>
                    <th>price</th>
                    <th>user email</th>
                    <th>car license plate</th>
                    <th>dealer</th>
                    <th>workshop</th>
                    @if(!Session::get('userAccess'))
                        <th>actions</th>
                    @endif
                </thead>
                <tbody>
                @foreach($appointments AS $appointment)
                    <tr>
                        @if(!Session::get('userAccess'))
                            <td><a href="{{ URL::action('AppointmentsController@edit',$appointment->id) }}">{{ $appointment->date }}</a></td>
                            <td><a href="{{ URL::action('AppointmentsController@edit',$appointment->id) }}">{{ round($appointment->price,2) }}</a></td>
                            <td><a href="{{ URL::action('AppointmentsController@edit',$appointment->id) }}">{{ $appointment->user->email }}</a></td>
                            <td><a href="{{ URL::action('AppointmentsController@edit',$appointment->id) }}">{{ $appointment->car->license_plate }}</a></td>
                            <td><a href="{{ URL::action('AppointmentsController@edit',$appointment->id) }}">{{ $appointment->dealer->name }}</a></td>
                            <td><a href="{{ URL::action('AppointmentsController@edit',$appointment->id) }}">{{ $appointment->workshop }}</a></td>
                            <td>
                                <a href="{{ URL::action('AppointmentsController@edit', $appointment->id) }}">{{ FA::icon('edit') }}</a>
                                <a href="javascript:if(window.confirm('Are you sure?'))
                                                    {
                                                        console.log('{{ $appointment->id }}');
                                                        $.post('{{ URL::action('AppointmentsController@destroy',$appointment->id) }}',{_method:'delete'});
                                                        setTimeout(function(){location.reload(true)},1000);
                                                    }">
                                    {{ FA::icon('remove') }}
                                </a>
                            </td>
                        @else
                            <td>{{ $appointment->date }}</td>
                            <td>{{ round($appointment->price,2) }}</td>
                            <td>{{ $appointment->user->email }}</td>
                            <td>{{ $appointment->car->license_plate }}</td>
                            <td>{{ $appointment->dealer->name }}</td>
                            <td>{{ $appointment->workshop }}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection