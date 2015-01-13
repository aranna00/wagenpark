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
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <p>
                <a href="{{ URL::action('UserController@create') }}" class="btn btn-default">Create User</a>
            </p>

            <table id="users" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Email</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Last login</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($users AS $user)
                        <tr>
                            <td><a href="{{ URL::action('UserController@edit', $user->id) }}">{{ $user->email }}</a></td>
                            <td><a href="{{ URL::action('UserController@edit', $user->id) }}">{{ $user->first_name }}</a></td>
                            <td><a href="{{ URL::action('UserController@edit', $user->id) }}">{{ $user->last_name }}</a></td>
                            <td><a href="{{ URL::action('UserController@edit', $user->id) }}">{{ $user->last_login }}</a></td>
                            <td>
                                <a href="{{ URL::action('UserController@edit', $user->id) }}">{{ FA::icon('edit') }}</a>
                                <a href="javascript:if(window.confirm('Are you sure?'))
                                                    {
                                                        console.log('{{ $user->id }}');
                                                        $.post('{{ URL::action('UserController@destroy',$user->id) }}',{_method:'method'});
                                                        setTimeout(function(){location.reload(true)},1000);
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