@extends('backend.layouts.app', ['pageSlug' => 'author'])

@section('title', 'Author')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Author List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{route('b.author.create')}}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created at') }}</th>
                                            <th>{{ __('Created by') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authors as $key=>$author)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$author->name}}</td>
                                                <td><span class="{{$author->statusBg()}}">{{$author->statusTitle()}}</span></td>
                                                <td>
                                                    {{ timeFormate($author->created_at) }}
                                                </td>
                                                <td>
                                                    {{ $author->created_user->name ?? 'system' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="javascript:void(0)" class="btn btn-secondary" title="View details"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{route('b.author.update',$author->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="{{route('b.author.status.update',$author->id)}}" class="btn {{$author->statusIcon()}}"><i class="fa-solid fa-power-off"></i></a>
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
    <script></script>
@endpush