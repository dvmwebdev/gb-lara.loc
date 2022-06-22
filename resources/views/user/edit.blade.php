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
                            href="{{route('home.index')}}">{{trans('useredit.breadcrumb.text.home')}}</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{route('user.index')}}">{{trans('useredit.breadcrumb.text.user')}}</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">{{trans('useredit.breadcrumb.text.useredit')}}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{route('user.update',$user->id)}}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row align-items-baseline">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">{{trans('input.label.username')}}</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <label for="username" class="w-100">
                                            <input type="text"
                                                   id="username"
                                                   class="form-control w-100{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username"
                                                   value="{{$user->username}}">
                                            @if ($errors->has('username'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row align-items-baseline">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">{{trans('input.label.homepage')}}</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <label class="w-100">
                                            <input type="text"
                                                   class="form-control w-100"
                                                   name="homepage"
                                                   value="{{$user->homepage}}"
                                                   id=""
                                                   @if(!$user->homepage ) placeholder="Немає даних"@endif>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div
                                        class="d-flex flex-column align-items-center text-center">
                                        <img
                                            src="{{asset($user->image??'images/no_avatar.png')}}"
                                            alt="Admin"
                                            class="rounded-circle" width="150">
                                        <div class="input-group mt-3">
                                            <label class="input-group-text"
                                                   for="image">{{trans('input.label.download')}}</label>
                                            <input type="file"
                                                   class="form-control"
                                                   name="image" id="image">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit"
                                        class="btn btn-primary">{{trans('button.save')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
