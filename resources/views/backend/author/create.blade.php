@extends('backend.layouts.app', ['pageSlug' => 'author'])

@section('title', 'Author')
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
                            <a href="{{ route('b.author.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('b.author.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name"
                                            placeholder="Enter Author Name" name="name">

                                        @include('backend.partials.form-error', ['field' => 'name'])
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-6">
                                            <label for="type">{{ __('Reporter Type') }} <span
                                                class="text-danger">*</span></label>
                                                <select name="type" class="form-control" id="type">
                                                    <option value=" " selected hidden>{{ __('Select Reporter Type') }}</option>
                                                    <option value="1" {{ old('type') == 1 ? 'selected' : '' }} >{{ __('Staff Reporter') }}</option>
                                                    <option value="2" {{ old('type') == 2 ? 'selected' : '' }} >{{ __('Senior Reporter') }}</option>
                                                    <option value="3" {{ old('type') == 3 ? 'selected' : '' }} >{{ __('Junior Staff Reporter') }}</option>
                                                    <option value="4" {{ old('type') == 4 ? 'selected' : '' }}>{{ __('Correspondent') }}</option>
                                                    <option value="5" {{ old('type') == 5 ? 'selected' : '' }}>{{ __('Investigative Reporter') }}</option>
                                                    <option value="6" {{ old('type') == 6 ? 'selected' : '' }}>{{ __('Political Reporter') }}</option>
                                                    <option value="7" {{ old('type') == 7 ? 'selected' : '' }}>{{ __('Crime Reporter') }}</option>
                                                    <option value="8" {{ old('type') == 8 ? 'selected' : '' }}>{{ __('Entertainment Reporter') }}</option>
                                                    <option value="9" {{ old('type') == 9 ? 'selected' : '' }}>{{ __('Sports Reporter') }}</option>
                                                    <option value="10" {{ old('type') == 10 ? 'selected' : '' }}>{{ __('Technology Reporter') }}</option>
                                                    <option value="11" {{ old('type') == 11 ? 'selected' : '' }}>{{ __('Health Reporter') }}</option>
                                                    <option value="12" {{ old('type') == 12 ? 'selected' : '' }}>{{ __('Business Reporter') }}</option>
                                                    <option value="13" {{ old('type') == 13 ? 'selected' : '' }}>{{ __('Feature Writer/Reporter') }}</option>
                                                    <option value="14" {{ old('type') == 14 ? 'selected' : '' }}>{{ __('Photojournalist') }}</option>
                                                    <option value="15" {{ old('type') == 15 ? 'selected' : '' }}>{{ __('Video Journalist (VJ)') }}</option>
                                                </select>
                                            @include('backend.partials.form-error', [
                                                'field' => 'type',
                                            ])
                                        </div>
                                        <div class="form-group col-6">
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
