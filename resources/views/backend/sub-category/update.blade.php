@extends('backend.layouts.app', ['pageSlug' => 'sub - category'])

@section('title', 'Sub - category')

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
                            <h4>{{ __('Update sub category') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.sub_category.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('b.sub_category.update', $subcategories->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf


                                    <div class="form-group">
                                        <label  class="mt-3" for="category">{{ __('Category') }}</label>
                                        <select name="category" id="category" class="form-control">
                                            @foreach ($categories as $category )
                                                <option value="{{ $category->id }}" {{ $category->id==old('category', $category->c_id) ? 'selected': '' }}>{{ $category->title}}</option>
                                            @endforeach
                                        </select>
                                        @include('backend.partials.form-error', ['field' => 'category'])
                                    </div>

                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter category name" name="title" value="{{ old('title') ?? $subcategories->title }}">

                                        @include('backend.partials.form-error', ['field' => 'title'])
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span class="text-muted">({{ __('optional') }})</span></label>
                                        <br>
                                        <div>
                                            <img src="{{ storage_url($subcategories->img) }}" alt="{{ $subcategories->name }}" class="display-image">
                                        </div>
                                        <input type="file" id="image" name="image" class="image-upload"  data-file="{{ $subcategories->img ? storage_url($subcategories->img) : null }}">

                                        @include('backend.partials.form-error', ['field' => 'image'])
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success w-100 submitBtn">
                                            {{ __('Update') }}
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
