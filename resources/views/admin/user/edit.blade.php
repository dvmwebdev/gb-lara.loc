@extends('layouts.admin')

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
                              action="{{ route('admin.feedback.update', $feedback->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label for="moderate"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control"
                                            name="moderate">
                                        <option
                                            value="0" {{ $feedback->moderate?'selected':'' }}>
                                            Заборонити
                                        </option>
                                        <option
                                            value="1" {{ $feedback->moderate?'selected':'' }}>
                                            Підтвердити
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                    <textarea
                                        class="form-control @error('content') is-invalid @enderror"
                                        name="content"
                                        id="content">{{ $feedback->content }}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
