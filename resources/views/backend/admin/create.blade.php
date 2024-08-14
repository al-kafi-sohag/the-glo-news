@extends('backend.layouts.app', ['pageSlug' => 'admin'])

@section('title', 'Admin')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new author') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.admin.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('b.admin.create') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name"
                                            placeholder="Enter Author Name" name="name" value="{{ old('name') }}">

                                        @include('backend.partials.form-error', ['field' => 'name'])
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="email">{{ __('Email') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="Enter Your Email">

                                        @include('backend.partials.form-error', ['field' => 'email'])
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            class="form-control" placeholder="Enter Your Password">

                                            @include('backend.partials.form-error', ['field' => 'password'])
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3"
                                            for="password_confirmation">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}" class="form-control"
                                            placeholder="Enter Your Password Again">

                                            @include('backend.partials.form-error', ['field' => 'password_confirmation'])
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group align-items-center">
                                            <input type="radio" class="btn-check" name="status" value="1"
                                                id="status-yes" autocomplete="off" checked >
                                            <label class="btn btn-outline-success w-50 m-0" for="status-yes">{{ __('Active') }}</label>

                                            <input type="radio" class="btn-check" name="status" value="0"
                                                id="status-no" autocomplete="off">
                                            <label class="btn btn-outline-danger w-50 m-0" for="status-no">{{ __('Deactive') }}</label>
                                        </div>
                                        @include('backend.partials.form-error', ['field' => 'status'])
                                    </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success w-100 submitBtn">
                                    {{ __('Submit') }}
                                </button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
