@extends('backend.layouts.app', ['pageSlug' => 'author'])

@section('title', 'Author')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Update new author') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{route('b.author.index')}}" class="btn btn-info">{{  __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{route('b.author.update',$author->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" value="{{$author->name}}" id="name" placeholder="Enter author name" name="name">

                                        @include('backend.partials.form-error', ['field' => 'name'])
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-6">
                                            <label for="type">{{ __('Reporter Type') }} <span
                                                class="text-danger">*</span></label>
                                                <select name="type" class="form-control" id="type">
                                                    <option value="1" {{ $author->type == 1 ? 'selected' : '' }} >Staff Reporter</option>
                                                    <option value="2" {{ $author->type == 2 ? 'selected' : '' }} >Senior Reporter</option>
                                                    <option value="3" {{ $author->type == 3 ? 'selected' : '' }} >Junior Staff Reporter</option>
                                                    <option value="4" {{ $author->type == 4 ? 'selected' : '' }}>Correspondent</option>
                                                    <option value="5" {{ $author->type == 5 ? 'selected' : '' }}>Investigative Reporter</option>
                                                    <option value="6" {{ $author->type == 6 ? 'selected' : '' }}>Political Reporter</option>
                                                    <option value="7" {{ $author->type == 7 ? 'selected' : '' }}>Crime Reporter</option>
                                                    <option value="8" {{ $author->type == 8 ? 'selected' : '' }}>Entertainment Reporter</option>
                                                    <option value="9" {{ $author->type == 9 ? 'selected' : '' }}>Sports Reporter</option>
                                                    <option value="10" {{ $author->type == 10 ? 'selected' : '' }}>Technology Reporter</option>
                                                    <option value="11" {{ $author->type == 11 ? 'selected' : '' }}>Health Reporter</option>
                                                    <option value="12" {{ $author->type == 12 ? 'selected' : '' }}>Business Reporter</option>
                                                    <option value="13" {{ $author->type == 13 ? 'selected' : '' }}>Feature Writer/Reporter</option>
                                                    <option value="14" {{ $author->type == 14 ? 'selected' : '' }}>Photojournalist</option>
                                                    <option value="15" {{ $author->type == 15 ? 'selected' : '' }}>Video Journalist (VJ)</option>
                                                </select>
                                            @include('backend.partials.form-error', [
                                                'field' => 'reporter_type',
                                            ])
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="status">{{ __('Status') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group align-items-center">
                                                <input type="radio" class="btn-check" name="status" value="1"
                                                    id="status-yes" autocomplete="off"  {{ $author->status == 1 ? 'checked' : '' }} >
                                                <label class="btn btn-outline-success w-50 m-0" for="status-yes">Active</label>

                                                <input type="radio" class="btn-check" name="status" value="0"
                                                    id="status-no" autocomplete="off" {{ $author->status == 0 ? 'checked' : '' }}>
                                                <label class="btn btn-outline-danger w-50 m-0" for="status-no">Deactive</label>
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
