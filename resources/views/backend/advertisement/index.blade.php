@extends('backend.layouts.app', ['pageSlug' => 'advertisement'])

@section('title', 'Advertisement')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Advertisement List') }}</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Page name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advertisements as $key=>$ad)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ad->title}}</td>
                                                <td><span class="{{$ad->statusBg()}}">{{$ad->statusTitle()}}</span></td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Action buttons">
                                                        <a href="{{route('b.ads.update',$ad->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{route('b.ads.status.update',$ad->id)}}" class="btn {{$ad->statusIcon()}}"><i class="fa-solid fa-power-off"></i></a>
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

@include('backend.partials.datatable', ['columns_to_show' => [0, 1, 2]])
