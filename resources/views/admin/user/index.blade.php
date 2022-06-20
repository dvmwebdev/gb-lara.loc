@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with minimal features &
                        hover style</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2"
                           class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>username</th>
                            <th>email</th>
                            <th>status</th>
                            <th>baned</th>
                            <th>user browser</th>
                            <th>user ip</th>
                            <th>create</th>
                            <th>update</th>
                            <th>actions</th>
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
