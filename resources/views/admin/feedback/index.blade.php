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
                            <th>content</th>
                            <th>image</th>
                            <th>moderate</th>
                            <th>username</th>
                            <th>email</th>
                            <th>create</th>
                            <th>update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($feedbacks as  $feedback)
                            <tr>
                                <td>{{$feedback->id}}</td>
                                <td>{{$feedback->content}}</td>
                                <td>{{$feedback->image}}</td>
                                <td>
                                    @if($feedback->moderate)
                                        <span class="badge badge-success">Перевірено</span>
                                    @else
                                        <span class="badge badge-danger">Не перевірено</span>
                                    @endif
                                </td>
                                <td>{{$feedback->user->username}}</td>
                                <td>{{$feedback->user->email}}</td>
                                <td>{{$feedback->created_at}}</td>
                                <td>{{$feedback->updated_at}}</td>
                                <td class="feedback__actions">
                                    <a href="{{route('admin.feedback.edit',$feedback->id)}}"><i
                                            class="far fa-edit"></i></a>
                                    <a href="{{route('feedback.delete',$feedback->id)}}">
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
        {{ $feedbacks->withQueryString()->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
