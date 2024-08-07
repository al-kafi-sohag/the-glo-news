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
                            <a href="{{route('b.author.index')}}" class="btn btn-info">{{  __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{route('b.author.create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name" placeholder="Enter author name" name="name">

                                        @include('backend.partials.form-error', ['field' => 'name'])
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
