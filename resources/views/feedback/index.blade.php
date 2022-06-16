@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div
                        class="card-header">{{ trans('feedback.card.header.text') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="feedbacks__list p-3">
                            <a href="{{route('feedback.create')}}"
                               class="btn btn-primary mb-3">{{trans('feedback.button.add.new')}}</a>
                            @if ( $feedbacks->count())
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('feedback.table.colum.content')}}</th>
                                        <th scope="col">{{trans('feedback.table.colum.moderate')}}</th>
                                        <th scope="col">{{trans('feedback.table.colum.image')}}</th>
                                        <th scope="col">{{trans('feedback.table.colum.create')}}</th>
                                        <th>{{trans('feedback.table.colum.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedbacks as $feedback)
                                        <tr>
                                            <td>{{ $feedback->id }}</td>
                                            <td>{!! $feedback->content !!}</td>
                                            <td>
                                                @if($feedback->moderate)
                                                    <span
                                                        class="badge bg-success">{{trans('feedback.badge.success.text')}}</span>
                                                @else
                                                    <span
                                                        class="badge bg-danger">{{trans('feedback.badge.danger.text')}}</span>
                                                @endif
                                            </td>
                                            <td style="width: 150px;">@if($feedback->image)
                                                    <img class="w-100"
                                                         src="{{ $feedback->image }}"
                                                         alt="">
                                                @else
                                                    <span>{{trans('feedback.image.text')}}</span>
                                                @endif
                                            </td>
                                            <td>{{ $feedback->created_at }}</td>
                                            <td class="feedback__actions">
                                                <a href="{{route('feedback.edit',$feedback->id)}}"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a href="{{route('feedback.delete',$feedback->id)}}">
                                                    @csrf
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="navigation">
                                    {{ $feedbacks->withQueryString()->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            @else
                                <p>{{trans('feedback.text.not.feedback')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

