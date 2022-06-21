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
                    <div class="card-header">Редагувати користувача</div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.user.update', $user->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label for="is_baned"
                                       class="col-md-4 col-form-label text-md-end">is_baned</label>

                                <div class="col-md-6">
                                    <select class="form-control"
                                            name="is_baned" id="is_baned">
                                        <option
                                            value="0" {{ $user->is_baned?'selected':'' }}>
                                            Активний
                                        </option>
                                        <option
                                            value="1" {{ $user->is_baned?'selected':'' }}>
                                            Забанений
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn bg-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
