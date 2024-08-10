@extends('frontend.layouts.app')

@section('title', config('app.name'))

@section('content')

    <div class="ppb_wrapper">
        @include('frontend.home.includes.trending')
    </div>

@endsection


@push('script')
    <script>

    </script>
@endpush
