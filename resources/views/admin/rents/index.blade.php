@extends('layouts.layout')
@section('page-name', 'Rents')
@section('page-content')
    <div class="container">
        @if ($message = Session::get('wallet'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_apps_projects_view_tab_2">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Chat-check.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Rents</span>
                            </a>
                        </li>
                        @if (Auth::user()->role !== 'tenant')
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_5">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Devices/Display1.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Wallets</span>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_50">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Devices/Display1.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Wallet History</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="tab-content">
                    <!--begin::Tab Content-->

                    <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                        <div class="row mb-2 @if (Auth::user()->role == 'tenant') d-none @endif">
                            <div class="col-4">
                                <label for="">Tenant</label>
                                <select id="tenant-id" class="form-control select2">
                                    <option value="all">All Tenants</option>
                                    @foreach ($tenants as $tenant)
                                        <option value="{{ $tenant->userid }}">{{ $tenant->userid }} &bullet;
                                            {{ $tenant->fname }} {{ $tenant->mname }} {{ $tenant->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Property</label>
                                <select id="property-id" class="form-control select2">
                                    <option value="all">All Properties</option>
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->transid }}">{{ $property->transid }} &bullet;
                                            {{ $property->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-light-primary font-weight-bold" id="filter1"
                                    style="margin-top:26px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vertical-center dataTable js-exportable" id="rent-table">
                                <thead>
                                    <tr class="text-left">
                                        <th style="width: 5px">No.</th>
                                        <th class="pr-0">Property ID</th>
                                        <th class="pr-0">Title</th>
                                        <th class="pr-0">Location</th>
                                        <th class="pr-0">Tenant ID</th>
                                        <th class="pr-0">Tenant Name</th>
                                        <th class="pr-0">Date Occupied</th>
                                        <th class="pr-0">Date Vacacted</th>
                                        <th class="pr-0">Status</th>
                                        <th class="pr-0">Price/Day</th>
                                        <th class="pr-0">Cummulated Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if (Auth::user()->role !== 'user')
                        <div class="tab-pane" id="kt_apps_projects_view_tab_5" role="tabpanel">
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="">Tenant</label>
                                    <select id="tenant1-id" class="form-control select2">
                                        <option value="all">All Tenants</option>
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->userid }}">{{ $tenant->userid }} &bullet;
                                                {{ $tenant->fname }} {{ $tenant->mname }} {{ $tenant->lname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vertical-center dataTable js-exportable" id="wallet-table">
                                    <thead>
                                        <tr class="text-left">
                                            <th style="width: 5px">No.</th>
                                            <th class="pl-0">Tenant ID</th>
                                            <th class="pl-0">Tenant Name</th>
                                            <th class="pr-0">Wallet ID</th>
                                            <th class="pr-0">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <div class="tab-pane" id="kt_apps_projects_view_tab_50" role="tabpanel">
                        <div class="row mb-2">
                            <div class="col @if (Auth::user()->role === 'tenant') d-none @endif">
                                <label for="">Tenant</label>
                                <select id="tenant2-id" class="form-control select2">
                                    <option value="all">All Tenants</option>
                                    @foreach ($tenants as $tenant)
                                        <option  {{ Auth::user()->userid == $tenant->userid ? 'selected' : '' }} value="{{ $tenant->userid }}">{{ $tenant->userid }} &bullet;
                                            {{ $tenant->fname }} {{ $tenant->mname }} {{ $tenant->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">From</label>
                                <input type="date" value="{{ date('Y-01-01') }}" id="start-date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">To</label>
                                <input type="date" value="{{ date('Y-12-d') }}" id="end-date" class="form-control">
                            </div>
                            <div class="col">
                                <button class="btn btn-light-primary font-weight-bold" id="filter-history"
                                    style="margin-top:26px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vertical-center dataTable js-exportable" id="wallet-history-table">
                                <thead>
                                    <tr class="text-left">
                                        <th style="width: 5px">No.</th>
                                        <th class="pl-0">Tenant ID</th>
                                        <th class="pl-0">Tenant Name</th>
                                        <th class="pr-0">Wallet ID</th>
                                        <th class="pr-0">Amount</th>
                                        <th class="pr-0">Currency</th>
                                        <th class="pr-0">Channel</th>
                                        <th class="pr-0">Transaction Type</th>
                                        <th class="pr-0">IFO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    @include('admin.rents.modals.load-wallet')

    <script>
        // var tenantsTable = $('#tenants-table').DataTable({
        //     dom: "Bfrtip",
        //     ajax: {
        //         url: `${APP_URL}/api/tenants`,
        //         type: "GET"

        //     },
        //     ordering: false,
        //     order: [],
        //     processing: true,
        //     columns: [{
        //             data: null,
        //             render: function(data, type, row, meta) {
        //                 return meta.row + meta.settings._iDisplayStart + 1;
        //             }
        //         },
        //         {
        //             data: "userid",
        //             'render': function(data, type, full, meta) {
        //                 return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
        //             },
        //         },
        //         {
        //             data: "name",
        //             'render': function(data, type, full, meta) {
        //                 return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
        //             },
        //         },
        //         {
        //             data: "phoneNumber",
        //         },
        //         {
        //             data: "email",
        //         },

        //     ],
        //     responsive: true,
        //     buttons: [{
        //             extend: 'print',
        //             attr: {
        //                 class: "btn btn-sm btn-info"
        //             },
        //             exportOptions: {
        //                 columns: [0, 1, 2, 3, 4]
        //             }
        //         },
        //         {
        //             extend: 'copy',
        //             attr: {
        //                 class: "btn btn-sm btn-info"
        //             },
        //             exportOptions: {
        //                 columns: [0, 1, 2, 3, 4]
        //             }
        //         },
        //         {
        //             extend: 'excel',
        //             attr: {
        //                 class: "btn btn-sm btn-info rounded-right"
        //             },
        //             exportOptions: {
        //                 columns: [0, 1, 2, 3, 4]
        //             }
        //         },
        //         {
        //             extend: 'pdf',
        //             attr: {
        //                 class: "btn btn-sm btn-info rounded-right"
        //             },
        //             exportOptions: {
        //                 columns: [0, 1, 2, 3, 4]
        //             }
        //         },
        //         {
        //             text: "Refresh",
        //             attr: {
        //                 class: "ml-2 btn-warning btn btn-sm rounded"
        //             },
        //             action: function(e, dt, node, config) {
        //                 dt.ajax.reload(false, null);
        //             }
        //         },
        //     ]
        // });

        var tenantID = document.getElementById('tenant1-id').value;

        var walletsTable = $('#wallet-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/rent/wallets`,
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
                    data: "tenantID",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    },
                },
                {
                    data: "tenantName",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    },
                },
                {
                    data: "walletID",
                },
                {
                    data: "balance",
                },

            ],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
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
                },
            ]
        });

        // // FILTER 
        // $('#filter1').click(function() {
        //     var tenantID = document.getElementById('tenant-id').value;

        //     propertyTenantTable.ajax.url(
        //             `${APP_URL}/api/tenants/properties/${tenantID}`
        //         )
        //         .load();
        // })

        let role = "{!! Auth::user()->role !!}";
        var showAdminColumns = role == 'admin' ? true : false;

        var dateFrom = document.getElementById('start-date').value;
        var dateTo = document.getElementById('end-date').value;
        var tenantID = document.getElementById('tenant2-id').value;

        var walletHistoryTable = $('#wallet-history-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/rent/wallets/history/${tenantID}/${dateFrom}/${dateTo}`,
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
                    data: "tenantID",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    },
                    visible: showAdminColumns,
                },
                {
                    data: "tenantName",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    },
                    visible: showAdminColumns,
                },
                {
                    data: "walletID",
                },
                {
                    data: "amount",
                },
                {
                    data: "currency",
                },
                {
                    data: "channel",
                },
                {
                    data: "type",
                },
                {
                    data: "ifo",
                },

            ],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
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
                },
                {
                    text: "Load Wallet",
                    attr: {
                        class: "ml-2 btn-success btn btn-sm rounded"
                    },
                    action: function(e, dt, node, config) {
                        $("#add-modal").modal("show")
                    }
                },
            ]
        });

        // FILTER 
        $('#filter-history').click(function() {
            var tenantID = document.getElementById('tenant2-id').value;
            var dateFrom = document.getElementById('start-date').value;
            var dateTo = document.getElementById('end-date').value;

            walletHistoryTable.ajax.url(
                    `${APP_URL}/api/rent/wallets/history/${tenantID}/${dateFrom}/${dateTo}`
                )
                .load();
        })
    </script>
@endsection
