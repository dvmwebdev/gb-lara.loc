@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('danger') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Редагувати відгук</div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('feedback.update', $feedback->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror"
                                           name="username"
                                           value="{{ $user->username }}"
                                           disabled>


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ $user->email }}"
                                           autocomplete="email" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="homepage"
                                       class="col-md-4 col-form-label text-md-end">{{ __('homepage') }}</label>

                                <div class="col-md-6">
                                    <input id="homepage" type="text"
                                           class="form-control @error('homepage') is-invalid @enderror"
                                           name="homepage"
                                           value="{{$user->homepage}}" disabled>

                                    @error('homepage')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-end">image</label>

                                <div class="col-md-6">
                                    <img
                                        src="{{ asset($feedback->image??'images/no_image.png') }}"
                                        alt="asdads">
                                    <input id="image" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                    <textarea
                                        class="form-control @error('content') is-invalid @enderror"
                                        name="content"
                                        id="content">{{$feedback->content}}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-4">
                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block"
                                              style="color: #dc3545;">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                            class="btn btn-primary">
                                        update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush
