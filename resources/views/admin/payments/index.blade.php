@extends('layouts.layout')
@section('page-name', 'Payments')
@section('page-content')
    <div class="container">
        <div class="card card-custom">
            <!--begin::Body-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vertical-center dataTable js-exportable"
                        id="payments-table">
                        <thead>
                            <tr class="text-left">
                                <th>Code</th>
                                <th>Date</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Amount Due</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Mode</th>
                                <th>Reference</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>

    <script>
        var paymentsTable = $('#payments-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/payments`,
                type: "GET"

            },
            ordering: false,
            order: [],
            processing: true,
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: "createdate",
                },
                {
                    data: "userid",
                },
                {
                    data: "name",
                },
                {
                    data: "phone",
                },
                {
                    data: "amountDue",
                },
                {
                    data: "amountPaid",
                },
                {
                    data: "balance",
                },
                {
                    data: "paymentMode",
                },
                {
                    data: "reference",
                },

            ],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    text: "Refresh",
                    attr: {
                        class: "ml-2 btn-warning btn btn-sm rounded"
                    },
                    action: function(e, dt, node, config) {
                        dt.ajax.reload(false, null);
                    }
                }
            ]
        });

    </script>
@endsection
