@extends('layouts.backend_app')

@section('title', 'Currency List')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{ $title }}</h2>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="tableList">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Sl</th>
                                    <th>Country</th>
                                    <th>Short Code (Currency)</th>
                                    <th>Full Code (Currency)</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    $('document').ready(function () 
    {
        // table serverside
        var table = $('#tableList').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            "columnDefs": [
                { "searchable": false, "targets": [0] }
            ],
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('currency-list') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false
                },
                {
                    data: 'country',
                    name: 'country'
                },
                {
                    data: 'short_code',
                    name: 'short_code'
                },
                {
                    data: 'full_code',
                    name: 'full_code'
                }
            ]
        });

    });

</script>
@endpush
