@push('css')
    <style>
        .datatable {
            width: 100% !important;
        }
    </style>
@endpush
@push('link_css')
    <link rel="stylesheet" href="{{ asset('backend/datatable/datatables.min.css') }}">
@endpush

@push('link_script')
    <script src="{{ asset('backend/datatable/datatables.min.js') }}"></script>
@endpush


@push('script')
    <script>
        $(document).ready(function() {
            var main_class = {!! json_encode($mainClass ?? 'dataTable') !!};
            $('.' + main_class).css('width', '100%');
            $('.' + main_class).each(function() {
                var columnsToShow = {!! json_encode($columns_to_show ?? []) !!};
                var order = {!! json_encode($order ?? 'asc') !!};
                var length = {!! json_encode($length ?? 10) !!};
                $(this).DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    iDisplayLength: length,
                    order: [
                        [0, order]
                    ],
                    buttons: [{
                            extend: 'pdfHtml5',
                            download: 'open',
                            orientation: 'potrait',
                            pagesize: 'A4',
                            exportOptions: {
                                columns: columnsToShow,
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: columnsToShow,
                            }
                        }, 'excel', 'csv', 'pageLength',
                    ]
                });
            });
        });
    </script>
@endpush
