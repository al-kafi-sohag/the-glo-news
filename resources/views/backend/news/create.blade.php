@extends('backend.layouts.app', ['pageSlug' => 'news'])

@section('title', 'News')

@push('link_css')
    <link href="{{ asset('backend/css/filepond/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/filepond/filepond-plugin-image-preview.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/filepond/ckeditor5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new news') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.news.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('b.news.create') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="image">{{ __('Thumbnail Image') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="image" id="image"
                                                        class="image-upload" data-aspectRatio="3:2" data-width="800">
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'image',
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="title">{{ __('Title') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                        value="{{ old('title') }}" placeholder="Enter news title">
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'title',
                                                    ])
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="category">{{ __('Category') }} <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category[]" id="category" class="form-control select"
                                                        multiple>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $category->id == old('category') ? 'selected' : '' }}>
                                                                {{ $category->title }}({{ $category->activeSubCategories->count() }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'category',
                                                    ])
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'category.*',
                                                    ])
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sub_category">{{ __('Sub Category') }} <span
                                                            class="text-muted">(optional)</span></label>
                                                    <select name="sub_category[]" id="sub_category"
                                                        class="form-control select" multiple>
                                                    </select>
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'sub_category',
                                                    ])
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'sub_category.*',
                                                    ])
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="post_date">{{ __('Post Date') }} <span
                                                        class="text-danger">*</span></label>
                                                            <input type="date" id="post_date" name="post_date" class="form-control" value="">
                                                    @include('backend.partials.form-error', [
                                                        'field' => 'sub_category',
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="pl-0">{{ __('News Description') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" rows="10" class="editor">
                                            {!! old('description') !!}
                                        </textarea>
                                        @include('backend.partials.form-error', ['field' => 'description'])
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="keyword">{{ __('Keyword') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="keywords[]" id="keyword" class="form-control select-tag"
                                                multiple>

                                            </select>
                                            <small>{{ __('Keyword is used for SEO purposes') }}</small>
                                            @include('backend.partials.form-error', [
                                                'field' => 'keywords',
                                            ])
                                            @include('backend.partials.form-error', [
                                                'field' => 'keywords.*',
                                            ])
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tag">{{ __('Tag') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="tags[]" id="tag" class="form-control select-tag" multiple>

                                            </select>
                                            <small>{{ __('Tag is used for searching purposes') }}</small>
                                            @include('backend.partials.form-error', ['field' => 'tags'])
                                            @include('backend.partials.form-error', ['field' => 'tags.*'])
                                        </div>
                                        <div class="col-md-4">
                                            <label for="references">{{ __('Reference') }}</label>
                                            <select name="references[]" id="reference" class="form-control select-tag" multiple>

                                            </select>
                                            @include('backend.partials.form-error', ['field' => 'references'])
                                            @include('backend.partials.form-error', ['field' => 'references.*'])
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="author">{{ __('Author') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="author" id="author" class="form-control select">
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}"
                                                        {{ $author->id == old('author') ? 'selected' : '' }}>
                                                        {{ $author->name . ' (' . $author->type() . ')' }} </option>
                                                @endforeach
                                            </select>
                                            @include('backend.partials.form-error', ['field' => 'author'])
                                        </div>
                                        <div class="col-md-2">
                                            <label for="main">{{ __('Main News') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group align-items-center">
                                                <input type="radio" class="btn-check" name="main" id="main-yes"
                                                    autocomplete="off" value="1" checked>
                                                <label class="btn btn-outline-success w-50" for="main-yes">Yes</label>

                                                <input type="radio" class="btn-check" name="main" id="main-no"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger w-50" for="main-no">No</label>
                                            </div>
                                            <small>{{ __('The previous news will be removed from main') }}</small>
                                            @include('backend.partials.form-error', ['field' => 'main'])
                                        </div>
                                        <div class="col-md-2">
                                            <label for="featured">{{ __('Featured News') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group align-items-center">
                                                <input type="radio" class="btn-check" name="featured"
                                                    id="featured-yes" autocomplete="off" checked value="1">
                                                <label class="btn btn-outline-success w-50" for="featured-yes">Yes</label>

                                                <input type="radio" class="btn-check" name="featured" id="featured-no"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger w-50" for="featured-no">No</label>
                                            </div>
                                            @include('backend.partials.form-error', [
                                                'field' => 'featured',
                                            ])
                                        </div>
                                        <div class="col-md-2">
                                            <label for="trending">{{ __('Trending News') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group align-items-center">
                                                <input type="radio" class="btn-check" name="trending"
                                                    id="trending-yes" autocomplete="off" value="1" checked>
                                                <label class="btn btn-outline-success w-50" for="trending-yes">Yes</label>

                                                <input type="radio" class="btn-check" name="trending" id="trending-no"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger w-50" for="trending-no">No</label>
                                            </div>
                                            @include('backend.partials.form-error', [
                                                'field' => 'trending',
                                            ])
                                        </div>
                                        <div class="col-md-2">
                                            <label for="status">{{ __('Status') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group align-items-center">
                                                <input type="radio" class="btn-check" name="status" id="status-yes"
                                                    autocomplete="off" value="1" checked>
                                                <label class="btn btn-outline-success w-50"
                                                    for="status-yes">Active</label>

                                                <input type="radio" class="btn-check" name="status" id="status-no"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger w-50"
                                                    for="status-no">Deactive</label>
                                            </div>
                                            @include('backend.partials.form-error', ['field' => 'status'])
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order">Select Order Number (1-100)</label>
                                            <select class="form-control @error('order') is-invalid @enderror select" id="order" name="order">
                                                <option value="">-- Select Order Number --</option>
                                                @foreach($availableOrders as $order)
                                                    <option value="{{ $order }}"
                                                        class="select" @if(in_array($order, $takenOrderNumbers)) data-taken=true @endif
                                                        @if(old('order') == $order) selected @endif
                                                    >
                                                        {{ $order }}
                                                        @if(in_array($order, $takenOrderNumbers)) (Taken) @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @include('backend.partials.form-error', ['field' => 'order'])
                                            <small class="form-text text-muted">Selecting a taken order will move the previous news to the end of the order.</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div></div>
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success w-100 submitBtn">
                                            {{ __('Create') }}
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
    <script src="{{ asset('backend/js/filepond/select2.min.js') }}"></script>
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

@push('script')
    <script>
        $(document).ready(function() {
            $('.select').select2();

            $(".select-tag").select2({
                tags: true
            });

            $('#category').on('change', function() {
                let categoryIds = $(this).val();

                $.ajax({
                    url: '{{ route('b.ajax.subcategories', 'id') }}',
                    type: 'POST',
                    data: {
                        categories: categoryIds
                    },
                    success: function(response) {
                        console.log(response);

                        $('#sub_category').empty();
                        $.each(response.data, function(key, subcategory) {
                            console.log(subcategory);

                            $('#sub_category').append(
                                `<option value="${subcategory.id}">${subcategory.title}</option>`
                                );
                        });
                    }
                });
            });
        });
    </script>
@endpush
