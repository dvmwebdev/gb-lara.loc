@extends('layouts.app')

@section('content')
    <div class="section__profile">
        <div class="container">
            {{--            @if(session('register'))--}}
            <div
                class="toast-container position-fixed top-5 end-0 p-3 bg-gradient-success">
                <div id="liveToast" class="toast show" role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Повідомлення</strong>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="toast"
                                aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{session('register')}}sdfsdsdsdsdf
                    </div>
                </div>
            </div>
            {{--            @endif--}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div
                            class="card-header">{{ trans('login.card.header.text') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end">{{ trans('login.input.label.email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') }}"
                                               autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end">{{ trans('login.input.label.password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label"
                                                   for="remember">
                                                {{ trans('login.input.label.checkbox') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit"
                                                class="btn btn-primary">
                                            {{ trans('login.button.text') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link"
                                               href="{{ route('password.request') }}">
                                                {{ trans('login.link.forgot.password') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
