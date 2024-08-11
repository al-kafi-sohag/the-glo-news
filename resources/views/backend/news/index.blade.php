@extends('backend.layouts.app', ['pageSlug' => 'news'])

@section('title', 'News')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('News List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.news.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Author') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created at') }}</th>
                                            <th>{{ __('Created by') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $key=>$n)
                                            <tr>
                                                <td>
                                                    {{ ++$key }}
                                                </td>
                                                <td>
                                                    {{ $n->title }}
                                                </td>
                                                <td>
                                                    {{ $n->author->name }}
                                                </td>
                                                <td>
                                                    {{ $n->status }}
                                                </td>
                                                <td>
                                                    {{ timeFormate($n->created_at) }}
                                                </td>
                                                <td>
                                                    {{ $n->created_user->name ?? 'system' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="javascript:void(0)" data-id="{{ $n->id }}" class="btn btn-secondary view" title="View details"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('b.news.update', $n->id) }}" title="Update item" title="Edit information" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $n->id }}" title="Delete data"><i class="fa-solid fa-trash-can"></i></a>
                                                      </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('backend.partials.datatable', ['columns_to_show' => [0, 1, 2, 3, 4]])

@push('script')
@endpush
