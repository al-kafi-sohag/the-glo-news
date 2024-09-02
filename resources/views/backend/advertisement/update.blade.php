@extends('backend.layouts.app', ['pageSlug' => 'advertisement'])

@section('title', 'Advertisement')

@push('link_css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

@section('content')
@switch($advertisement->key)
    @case('header')
        @php $aspectRatio = '8:1'; $width = 728; $height = 90 @endphp
    @break
    @case('homepage')
        @php $aspectRatio = '1:1'; $width = 300; $height = 300 @endphp
    @break
    @case('multiple_news_page')
        @php $aspectRatio = '8:1'; $width = 728; $height = 90 @endphp
    @break
    @case('single_news_page')
        @php $aspectRatio = '1:1'; $width = 300; $height = 300 @endphp
    @break
    @case('author_news_page')
        @php $aspectRatio = '8:1'; $width = 728; $height = 90 @endphp
    @break


    @default
        @php $aspectRatio = '1:1'; $width = 300; $height = 300 @endphp

@endswitch
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Update Advertisement') }} - <small>{{ $advertisement->title }}</small></h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.ads.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('b.ads.update', $advertisement->id) }}" method="POST">
                                    @csrf


                                    @if (!empty($advertisement->details))
                                        @foreach ( json_decode($advertisement->details) as $key => $details)
                                            <div class="form-group">
                                                <label for="{{ slug($details->name).$key }}">{{ $details->name }} <span class="text-danger">*</span></label>

                                                @if(isset($details->img) && !empty($details->img))
                                                    <div class="mt-3 mb-3">
                                                        <img src="{{ storage_url($details->img) }}" alt="{{ $details->name }}">
                                                    </div>
                                                @endif

                                                <input type="file" id="{{ slug($details->name).$key }}" name="{{ slug($details->name) }}[{{ $key }}][img]" class="image-upload"
                                                data-aspectRatio="{{ $details->aspect_ratio }}" data-width="{{ $details->width }}" data-height="{{ $details->height }}">

                                                <small class="mt-1 mb-1">
                                                    {{ __('Image should be relative aspect ratio of '.$details->aspect_ratio. ' and should be relatively '.$details->width.'x'.$details->height. 'px') }}
                                                </small>
                                            </div>

                                            <div class="form-group">
                                                <label for="link{{ $key }}">{{ __('Advertisement Link') }} <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="link{{ $key }}" name="{{ slug($details->name) }}[{{ $key }}][link]"
                                                    placeholder="Enter {{ $details->name }} link" value="{{ $details->link }}" required>
                                            </div>
                                        @endforeach

                                    @endif

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
