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
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-gray">
                    <h3 class="card-title">{{trans('card.user')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2"
                           class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('table.column.username')}}</th>
                            <th>{{trans('table.column.email')}}</th>
                            <th>{{trans('table.column.status')}}</th>
                            <th>{{trans('table.column.is_baned')}}</th>
                            <th>{{trans('input.label.user_agent')}}</th>
                            <th>{{trans('input.label.user_ip')}}</th>
                            <th>{{trans('table.column.create')}}</th>
                            <th>{{trans('table.column.updated_at')}}</th>
                            <th>{{trans('table.column.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($users as  $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <a href="{{route('admin.user.show', $user->id)}}">{{$user->username}}</a>
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->status)
                                        <span
                                            class="badge badge-success">Онлайн</span>
                                    @else
                                        <span
                                            class="badge badge-danger">Оффлайн</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!$user->is_baned)
                                        <span
                                            class="badge badge-success">Ні</span>
                                    @else
                                        <span
                                            class="badge badge-danger">Так</span>
                                    @endif
                                </td>
                                <td>{{$user->user_agent}}</td>
                                <td>{{$user->user_ip}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td class="user__actions">
                                    <a href="{{route('admin.user.edit',$user->id)}}"><i
                                            class="far fa-edit"></i></a>
                                    <a href="#">
                                        @csrf
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <div class="navigation">
        {{ $users->withQueryString()->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
