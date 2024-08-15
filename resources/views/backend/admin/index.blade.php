@extends('backend.layouts.app', ['pageSlug' => 'admin'])

@section('title', 'Admin')

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
                            <a href="{{ route('b.admin.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created at') }}</th>
                                            <th>{{ __('Created by') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $key=>$admin)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td><span class="{{$admin->statusBg()}}">{{$admin->statusTitle()}}</span></td>
                                                <td>
                                                    {{ timeFormate($admin->created_at) }}
                                                </td>
                                                <td>
                                                    {{ $admin->created_user ? $admin->created_user->name : 'system' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="javascript:void(0)" data-id="{{ $admin->id }}" class="btn btn-secondary view" title="View details"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{route('b.admin.update',$admin->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $admin->id }}"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="{{route('b.admin.status.update',$admin->id)}}" class="btn {{$admin->statusIcon()}}"><i class="fa-solid fa-power-off"></i></a>
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
     <div class="modal view_modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="adminModalLabel">{{ __('Admin Details') }}</h5>
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
    const details = {'url':`{{ route('b.admin.delete', ['id'=>'_id']) }}`}
</script>
<script>
    $(document).ready(function() {
        $('.view').on('click', function() {
            let id = $(this).data('id');
            let url = "{{ route('b.admin.details', ':id') }}";
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
                                    <td>${data.admin.name}</td>
                                </tr>
                                 <tr>
                                    <th class="text-nowrap">Email</th>
                                    <th>:</th>
                                    <td>${data.admin.email}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Status</th>
                                    <th>:</th>
                                    <td><span class="${data.admin.statusBg}">${data.admin.statusTitle}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Created At</th>
                                    <th>:</th>
                                    <td>${data.admin.created_time}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Created By</th>
                                    <th>:</th>
                                    <td>${data.admin.created_user? data.admin.created_user.name : 'system'}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Updated At</th>
                                    <th>:</th>
                                    <td>${data.admin.updated_time}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap">Updated By</th>
                                    <th>:</th>
                                    <td>${data.admin.updated_user ? data.admin.updated_user.name : 'null'}</td>
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
