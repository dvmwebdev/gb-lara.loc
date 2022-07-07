@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Користувач</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Дашборд</a>
                        </li>
                        <li class="breadcrumb-item active">Користувач</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>{{trans('table.column.username')}}</th>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <th>{{trans('table.column.email')}}</th>
                    <td>{{$user->email}}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{trans('table.column.content')}}</th>
            <th scope="col">{{trans('table.column.moderate')}}</th>
            <th scope="col">{{trans('table.column.create')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->feedbacks as $feedback)
            <tr>
                <th scope="row">{{$feedback->id}}</th>
                <td>{{$feedback->content}}</td>
                <td>{{$feedback->moderate}}</td>
                <td>{{$feedback->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
