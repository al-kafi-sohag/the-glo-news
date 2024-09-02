@extends('backend.layouts.app', ['pageSlug' => 'category'])

@section('title', 'Category')

@push('link_css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new category') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.category.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('b.category.create') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter category name" name="title">

                                        @include('backend.partials.form-error', ['field' => 'title'])
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-muted">({{ __('optional') }})</span></label>
                                        <br>
                                        <input type="file" id="image" name="image" class="image-upload"  data-aspectRatio="1:1" data-width="300">

                                        @include('backend.partials.form-error', ['field' => 'image'])
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="input-group">
                                                <label for="featured">{{ __('Featured') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group align-items-center">
                                                    <input type="radio" class="btn-check" name="featured" value="1"
                                                        id="featured-yes" autocomplete="off" checked>
                                                    <label class="btn btn-outline-success w-50" for="featured-yes">Yes</label>

                                                    <input type="radio" class="btn-check" name="featured" value="0"
                                                        id="featured-no" autocomplete="off">
                                                    <label class="btn btn-outline-danger w-50" for="featured-no">No</label>
                                                </div>
                                            </div>
                                            @include('backend.partials.form-error', ['field' => 'featured'])
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="input-group">
                                                <label for="latest">{{ __('Latest') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group align-items-center">
                                                    <input type="radio" class="btn-check" name="latest" value="1"
                                                        id="latest-yes" autocomplete="off" checked>
                                                    <label class="btn btn-outline-success w-50" for="latest-yes">Yes</label>

                                                    <input type="radio" class="btn-check" name="latest" value="0"
                                                        id="latest-no" autocomplete="off">
                                                    <label class="btn btn-outline-danger w-50" for="latest-no">No</label>
                                                </div>
                                            </div>
                                            @include('backend.partials.form-error', ['field' => 'latest'])
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="input-group">
                                                <label for="header">{{ __('Header') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group align-items-center">
                                                    <input type="radio" class="btn-check" name="header" value="1"
                                                        id="header-yes" autocomplete="off" checked>
                                                    <label class="btn btn-outline-success w-50" for="header-yes">Yes</label>

                                                    <input type="radio" class="btn-check" name="header" value="0"
                                                        id="header-no" autocomplete="off">
                                                    <label class="btn btn-outline-danger w-50" for="header-no">No</label>
                                                </div>
                                            </div>
                                            @include('backend.partials.form-error', ['field' => 'header'])
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="input-group">
                                                <label for="status">{{ __('Status') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group align-items-center">
                                                    <input type="radio" class="btn-check" name="status" value="1"
                                                        id="status-yes" autocomplete="off" checked>
                                                    <label class="btn btn-outline-success w-50" for="status-yes">Active</label>

                                                    <input type="radio" class="btn-check" name="status" value="0"
                                                        id="status-no" autocomplete="off">
                                                    <label class="btn btn-outline-danger w-50" for="status-no">Deactive</label>
                                                </div>
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

@push('link_script')
<script src="{{ asset('backend/js/filepond/file-validation-type.js') }}"></script>
<script src="{{ asset('backend/js/filepond/image-preview.js') }}"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="{{ asset('backend/js/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('backend/js/filepond/filepond.jquery.js') }}"></script>
<script src="{{ asset('backend/js/filepond.js') }}"></script>
@endpush
