@extends('layouts.app')

@section('title')
    | {{trans('title.profile.text')}}
@endsection
@section('content')
    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{route('home.index')}}">{{trans('breadcrumbs.home')}}</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">{{trans('breadcrumbs.user')}}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex flex-column align-items-center text-center">
                                <img
                                    src="{{asset($user->image??'images/no_avatar.png')}}"
                                    alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <button class="btn btn-warning">
                                        {{trans('button.moderate')}}
                                        <span
                                            class="badge bg-danger">{{$user->countFeedbacksModerate()}}</span>
                                    </button>
                                    <button type="button"
                                            class="btn btn-primary">
                                        {{trans('button.all')}}
                                        <span
                                            class="badge bg-secondary">{{$user->countFeedbacksAll()}}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{trans('table.column.username')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->username}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{trans('table.column.email')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{trans('table.column.homepage')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->homepage??'-'}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info "
                                       href="{{route('user.edit',$user->id)}}">{{trans('button.edit')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
