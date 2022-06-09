@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>id</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>username</th>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <th>email</th>
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
            <th scope="col">content</th>
            <th scope="col">moderate</th>
            <th scope="col">create</th>
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
