@extends('backend.layouts.app', ['pageSlug' => 'sub-category'])

@section('title', 'Sub-Category')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Sub Category List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('b.sub_category.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Category Title') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Logo') }}</th>
                                            <th>{{ __('Created at') }}</th>
                                            <th>{{ __('Created by') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $key => $category)
                                            <tr>
                                                <td>
                                                    {{ ++$key }}
                                                </td>
                                                <td>{{ $category->category->title }}</td>
                                                <td>
                                                    {{ $category->title }}
                                                </td>
                                                <td>
                                                    <img src="{{ storage_url($category->img) }}" class="tbl-img"
                                                        alt="{{ $category->title }}">
                                                </td>
                                                <td>
                                                    {{ timeFormate($category->created_at) }}
                                                </td>
                                                <td>
                                                    {{ $category->created_user->name ?? 'system' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="javascript:void(0)" class="btn btn-secondary view"
                                                        data-id="{{ $category->id }}" title="View details"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('b.sub_category.update', $category->id) }}"
                                                            class="btn btn-info"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" data-id= "{{ $category->id }}"
                                                            class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
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
     {{-- Sub-Category Details Modal  --}}
     <div class="modal view_modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">{{ __('Sub Category Details') }}</h5>
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

    $(document).ready(function(){
        $('.delete').on('click', function(){
            let url=`{{ route('b.sub_category.delete', ['id'=>'_id']) }}`;
            url=url.replace('_id',$(this).data('id'))
            confirmDelete(url);
        });
    });

</script>


    <script>
        $(document).ready(function() {
            $('.view').on('click', function() {
                let id = $(this).data('id');
                let url = ("{{ route('b.sub_category.details', ['id']) }}");
                let _url = url.replace('id', id);
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
                                        <td>${data.category.title}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">Image</th>
                                        <th>:</th>
                                        <td>
                                            <img src="${data.category.img}" class="tbl-img" alt="${ data.category.title }">

                                     </td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">Created At</th>
                                        <th>:</th>
                                        <td>${data.category.created_time}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">Created By</th>
                                        <th>:</th>
                                        <td>${data.category.created_user.name ?? 'system'}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">Updated At</th>
                                        <th>:</th>
                                        <td>${data.category.updated_time}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap">Updated By</th>
                                        <th>:</th>
                                        <td>${data.category.updated_user ? data.category.updated_user.name : 'null'}</td>
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