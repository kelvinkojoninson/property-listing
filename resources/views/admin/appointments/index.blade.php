@extends('layouts.layout')
@section('page-name', 'Appointments')
@section('page-content')
    <div class="container">
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
                                <span class="nav-text font-weight-bold">Appointments</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_3">
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
                                <span class="nav-text font-weight-bold">Trash</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="tab-content pt-5">
                    <!--begin::Tab Content-->
                    <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                        <div class="row mt-2 p-3">
                            <div class="col @if (Auth::user()->role !== 'admin') d-none @endif">
                                <label for="">User</label>
                                <select id="user-id" class="form-control select2">
                                    <option value="all">All</option>
                                    @foreach ($users as $user)
                                        <option {{ Auth::user()->userid == $user->userid ? 'selected' : '' }}
                                            value="{{ $user->userid }}">{{ $user->userid }} &bullet;
                                            {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Start Date</label>
                                <input type="date" value="{{ date('Y-01-01') }}" id="start-date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">End Date</label>
                                <input type="date" value="{{ date('Y-12-d') }}" id="end-date" class="form-control">
                            </div>
                            <div class="col">
                                <button class="btn btn-light-primary font-weight-bold" id="filter-appointments"
                                    style="margin-top:26px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vertical-center dataTable js-exportable" id="appointments-table">
                                <thead>
                                    <tr class="text-left">
                                        <th style="width: 5px">No.</th>
                                        <th class="pr-0">User</th>
                                        <th class="pr-0">Meeting With</th>
                                        <th class="pr-0">Title</th>
                                        <th class="pr-0">Description</th>
                                        <th class="pr-0">Date</th>
                                        <th class="pr-0">Venue</th>
                                        <th class="pr-0">Status</th>
                                        <th class="pr-0 text-right" style="min-width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
                        <div class="row mt-2 p-3">
                            <div class="col @if (Auth::user()->role !== 'admin') d-none @endif">
                                <label for="">Users</label>
                                <select id="trash-user-id" class="form-control select2">
                                    <option value="all">All</option>
                                    @foreach ($users as $user)
                                        <option {{ Auth::user()->userid == $user->userid ? 'selected' : '' }}
                                            value="{{ $user->userid }}">{{ $user->userid }} &bullet;
                                            {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Start Date</label>
                                <input type="date" value="{{ date('Y-01-01') }}" id="trash-start-date"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="">End Date</label>
                                <input type="date" value="{{ date('Y-12-d') }}" id="trash-end-date" class="form-control">
                            </div>
                            <div class="col">
                                <button class="btn btn-light-primary font-weight-bold" id="trash-filter-appointments"
                                    style="margin-top:26px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vertical-center dataTable js-exportable" id="trash-table">
                                <thead>
                                    <tr class="text-left">
                                        <th style="width: 5px">No.</th>
                                        <th class="pr-0">User</th>
                                        <th class="pr-0">Meeting With</th>
                                        <th class="pr-0">Title</th>
                                        <th class="pr-0">Description</th>
                                        <th class="pr-0">Date</th>
                                        <th class="pr-0">Venue</th>
                                        <th class="pr-0">Status</th>
                                        <th class="pr-0 text-right" style="min-width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
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
    @include('admin.appointments.modals.add')
    @include('admin.appointments.modals.edit')

    <script>
        let role = "{!! Auth::user()->role !!}";
        var showAdminColumns = role == 'admin' ? true : false;

        var agentID = document.getElementById('user-id').value;
        var upcomingDateFrom = document.getElementById('start-date').value;
        var upcomingDateTo = document.getElementById('end-date').value;

        var appointmentsTable = $('#appointments-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/appointments/${agentID}/${upcomingDateFrom}/${upcomingDateTo}`,
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
                    data: "createuser",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    },
                    visible: showAdminColumns
                },
                {
                    data: "clientName",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    }
                },
                {
                    data: "title",
                },
                {
                    data: "description",
                },
                {
                    data: "meetingDate",
                },
                {
                    data: "venue",
                },
                {
                    data: "statusDesc",
                },
                {
                    data: null,
                    className: 'pr-0 text-right',
                    defaultContent: `   
                                            <a style="cursor:pointer" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3 update-btn">
                                   <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Write.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <rect x="0" y="0" width="24" height="24" />
                                      <path
                                       d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                       fill="#000000" fill-rule="nonzero"
                                       transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                      <path
                                       d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                       fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                     </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                   </span>
                                  </a>            
                                              <a style="cursor:pointer" class="btn btn-icon btn-light btn-hover-primary btn-sm delete-btn">
                                               <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                  <rect x="0" y="0" width="24" height="24" />
                                                  <path
                                                   d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                   fill="#000000" fill-rule="nonzero" />
                                                  <path
                                                   d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                   fill="#000000" opacity="0.3" />
                                                 </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                               </span>
                                              </a>
                                                                `
                },

            ],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
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
                    text: "Schedule Appointment",
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
        $('#filter-appointments').click(function() {
            var agentID = document.getElementById('user-id').value;

            var upcomingDateFrom = document.getElementById('start-date').value;
            var upcomingDateTo = document.getElementById('end-date').value;

            appointmentsTable.ajax.url(
                    `$${APP_URL}/api/appointments/${agentID}/${upcomingDateFrom}/${upcomingDateTo}`
                )
                .load();
        })

        var agentID = document.getElementById('trash-user-id').value;
        var upcomingDateFrom = document.getElementById('trash-start-date').value;
        var upcomingDateTo = document.getElementById('trash-end-date').value;

        var trashTable = $('#trash-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/appointments/trash/${agentID}/${upcomingDateFrom}/${upcomingDateTo}`,
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
                    data: "createuser",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    },
                    visible: showAdminColumns
                },
                {
                    data: "clientName",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    }
                },
                {
                    data: "title",
                },
                {
                    data: "description",
                },
                {
                    data: "meetingDate",
                },
                {
                    data: "venue",
                },
                {
                    data: "statusDesc",
                },
                {
                    data: null,
                    className: 'pr-0 text-right',
                    defaultContent: `           
                                              <a style="cursor:pointer" class="btn btn-icon btn-light btn-hover-primary btn-sm restore-btn">
                                               <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                  <rect x="0" y="0" width="24" height="24" />
                                                  <path
                                                   d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                   fill="#000000" fill-rule="nonzero" />
                                                  <path
                                                   d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                   fill="#000000" opacity="0.3" />
                                                 </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                               </span>
                                              </a>
                                                                `
                },

            ],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
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

        // FILTER 
        $('#trash-filter-appointments').click(function() {
            var agentID = document.getElementById('trash-agent-id').value;        
            var upcomingDateFrom = document.getElementById('trash-start-date').value;
            var upcomingDateTo = document.getElementById('trash-end-date').value;

            trashTable.ajax.url(
                    `$${APP_URL}/api/appointments/trash/${agentID}/${upcomingDateFrom}/${upcomingDateTo}`
                )
                .load();
        })

        $("#appointments-table").on("click", ".delete-btn", function() {
            var data = appointmentsTable.row($(this).parents("tr")).data();
            var formdata = new FormData()
            formdata.append("transid", data.transid);
            formdata.append("createuser", CREATEUSER);

            Swal.fire({
                title: "",
                text: "Are you sure you want to remove this record?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete"

            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        text: "Deleting...",
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    });
                    fetch(`${APP_URL}/api/appointments/delete`, {
                        method: "POST",
                        body: formdata,
                    }).then(function(res) {
                        return res.json()
                    }).then(function(data) {
                        if (!data.ok) {
                            Swal.fire({
                                text: data.msg,
                                icon: "error"
                            });
                            return;
                        }
                        Swal.fire({
                            text: "Appointment deleted successfully",
                            icon: "success"
                        });
                        appointmentsTable.ajax.reload(false, null);
                        trashTable.ajax.reload(false, null);
                    }).catch(function(err) {
                        if (err) {
                            Swal.fire({
                                text: "Deleting appointment failed"
                            });
                        }
                    })
                }
            })

        });

        $("#trash-table").on("click", ".restore-btn", function() {
            var data = trashTable.row($(this).parents("tr")).data();
            var formdata = new FormData()
            formdata.append("transid", data.transid);
            formdata.append("createuser", CREATEUSER);

            Swal.fire({
                title: "",
                text: "Are you sure you want to restore this record?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete"

            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        text: "Restoring...",
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    });
                    fetch(`${APP_URL}/api/appointments/restore`, {
                        method: "POST",
                        body: formdata,
                    }).then(function(res) {
                        return res.json()
                    }).then(function(data) {
                        if (!data.ok) {
                            Swal.fire({
                                text: data.msg,
                                icon: "error"
                            });
                            return;
                        }
                        Swal.fire({
                            text: "Appointment restored successfully",
                            icon: "success"
                        });
                        trashTable.ajax.reload(false, null);
                        appointmentsTable.ajax.reload(false, null);
                    }).catch(function(err) {
                        if (err) {
                            Swal.fire({
                                text: "Restoring appointment failed"
                            });
                        }
                    })
                }
            })

        });

        $("#appointments-table").on("click", ".update-btn", function() {
            let data = appointmentsTable.row($(this).parents('tr')).data();

            $("#update-modal").modal("show");
            $("#update-transid").val(data.transid);
            $("#update-client-name").val(data.clientName);
            $("#update-title").val(data.title);
            $("#update-description").val(data.description);
            $("#update-status").val(data.status).trigger('change');
            $("#update-meeting-date").val(data.meetingDate);
            $("#update-venue").val(data.venue);
        });

    </script>
@endsection
