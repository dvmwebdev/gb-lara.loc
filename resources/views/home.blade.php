@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div
                        class="card-header">{{ trans('card.feedback') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="feedbacks__list p-3">
                            @if ( $feedbacks->count())
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{trans('table.column.content')}}</th>
                                        <th scope="col">
                                            @sortablelink('user.email',trans('table.column.email'))
                                        </th>
                                        <th scope="col">
                                            @sortablelink('user.username',trans('table.column.username'))
                                        </th>
                                        <th scope="col">
                                            @sortablelink('created_at',trans('table.column.create'))
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedbacks as $feedback)
                                        <tr>
                                            <td>{!! $feedback->content !!}</td>
                                            <td>{{ $feedback->user->email }}</td>
                                            <td>{{ $feedback->user->username }}</td>
                                            <td>{{ $feedback->created_at }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="navigation">
                                    {{ $feedbacks->withQueryString()->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            @else
                                <p>Немає жодного відгуку</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
