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
                                            <th>{{ __('Type') }}</th>
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
                                                <td>{{$author->type()}}</td>
                                                <td><span class="{{$author->statusBg()}}">{{$author->statusTitle()}}</span></td>
                                                <td>
                                                    {{ timeFormate($author->created_at) }}
                                                </td>
                                                <td>
                                                    {{ $author->created_user ? $author->created_user->name : 'system' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="javascript:void(0)" data-id="{{ $author->id }}" class="btn btn-secondary view" title="View details"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{route('b.author.update',$author->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $author->id }}"><i class="fa-solid fa-trash-can"></i></a>
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
     {{-- Author Details Modal  --}}
     <div class="modal view_modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">{{ __('Author Details') }}</h5>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body modal_data">
             </div>
         </div>
     </div>
 </div>
@endsection

@include('backend.partials.datatable', ['columns_to_show' => [0, 1, 2, 3, 4]])

@push('script')
<script>
    const details = {'url':`{{ route('b.author.delete', ['id'=>'_id']) }}`}
</script>
<script>
    $(document).ready(function() {
        $('.view').on('click', function() {
            let id = $(this).data('id');
            let url = "{{ route('b.author.details', ':id') }}";
            let _url = url.replace(':id', id);
            $.ajax({
                url: _url,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var result = `
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-nowrap">Name</th>
                                    <th>:</th>
                                    <td>${data.author.name}</td>
                                </tr>
                                 <tr>
                                    <th class="text-nowrap">Type</th>
                                    <th>:</th>
                                    <td>${data.author.reporterType}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Status</th>
                                    <th>:</th>
                                    <td><span class="${data.author.statusBg}">${data.author.statusTitle}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Created At</th>
                                    <th>:</th>
                                    <td>${data.author.created_time}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Created By</th>
                                    <th>:</th>
                                    <td>${data.author.created_user? data.author.created_user.name : 'system'}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Updated At</th>
                                    <th>:</th>
                                    <td>${data.author.updated_time}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Updated By</th>
                                    <th>:</th>
                                    <td>${data.author.updated_user ? data.author.updated_user.name : 'null'}</td>
                                </tr>
                            </table>
                            `;
                    $('.modal_data').html(result);
                    $('.view_modal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching admin data:', error);
                }
            });
        });
    });
</script>
@endpush
