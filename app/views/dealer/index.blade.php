@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="container white_bg">

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
                            <a href="{{ URL::action('DealerController@index') }}">
                                {{ $title }}
                            </a>
                        </li>
                    </ul>
                </div>

                <p>
                    <a href="{{ URL::action('DealerController@create') }}" class="btn btn-default">Add new dealer</a>
                </p>

                <table id="dealers" class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($dealers AS $dealer)
                            <tr>
                                <td><a href="{{ URL::action('DealerController@edit',$dealer->id) }}">{{ $dealer->id }}</a> </td>
                                <td><a href="{{ URL::action('DealerController@edit',$dealer->id) }}">{{ $dealer->name }}</a> </td>
                                <td>
                                    <a href="{{ URL::action('DealerController@edit', $dealer->id) }}">{{ FA::icon('edit') }}</a>
                                    <a href="javascript:if(window.confirm('Are you sure?'))
                                                    {
                                                        console.log('{{ $dealer->id }}');
                                                        $.post('{{ URL::action('DealerController@destroy',$dealer->id) }}',{_method:'delete'});
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
    </div>

@endsection