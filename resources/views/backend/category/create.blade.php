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
                            <a href="{{ route('b.category.index') }}" class="btn btn-info">{{  __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('b.category.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="title" placeholder="Enter category name" name="title">

                                        @include('backend.partials.form-error', ['field' => 'title'])
                                    </div>
                                    <div class="form-group">
                                        <label for="featured">{{ __('Featured') }} <span class="text-danger">*</span></label><br>
                                        <input type="checkbox" name="featured" value="1" checked data-toggle="toggle" data-on="True" data-off="False" data-on-color="badge-success" data-off-color="badge-danger">

                                        @include('backend.partials.form-error', ['field' => 'featured'])
                                    </div>
                                    <div class="form-group">
                                        <label for="latest">{{ __('Latest') }} <span class="text-danger">*</span></label><br>
                                        <input type="checkbox" name="latest" value="1" checked data-toggle="toggle" data-on="True" data-off="False" data-on-color="badge-success" data-off-color="badge-danger">

                                        @include('backend.partials.form-error', ['field' => 'latest'])
                                    </div>
                                    <div class="form-group">
                                        <label for="header">{{ __('Header') }} <span class="text-danger">*</span></label><br>
                                        <input type="checkbox" name="header" value="1" checked data-toggle="toggle" data-on="True" data-off="False" data-on-color="badge-success" data-off-color="badge-danger">

                                        @include('backend.partials.form-error', ['field' => 'header'])
                                    </div>

                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span class="text-muted">({{ __('optional') }})</span></label>
                                        <br>
                                        <input type="file" id="image" name="image" class="image-upload">

                                        @include('backend.partials.form-error', ['field' => 'image'])
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
    <script src="{{ asset('backend/js/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('backend/js/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('backend/js/filepond.js') }}"></script>
@endpush

@push('script')
   <script>
        $(document).ready(function() {
            $('input[name="featured"]').bootstrapToggle();
            $('input[name="latest"]').bootstrapToggle();
            $('input[name="header"]').bootstrapToggle();
        });
   </script>

@endpush
