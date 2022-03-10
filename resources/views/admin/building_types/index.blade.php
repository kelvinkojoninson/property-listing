@extends('layouts.layout')
@section('page-name', 'Building Types')
@section('page-content')
    <div class="container">
        <div class="card card-custom">
            <!--begin::Body-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-head-custom table-vertical-center dataTable js-exportable"
                        id="building-types-table">
                        <thead>
                            <tr class="text-left">
                                <th style="width: 5px">No.</th>
                                <th class="pr-0" style="width: 50px">Description</th>
                                <th class="pr-0 text-right" style="min-width: 150px">action</th>
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
    @include('admin.building_types.modals.add')
    @include('admin.building_types.modals.edit')
   
    <script>
        var buildingTypesTable = $('#building-types-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/building_types`,
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
                    data: "description",
                    'render': function(data, type, full, meta) {
                        return `<span style="width: 108px;"><div class="font-weight-bolder text-dark mb-0">${data}</div></span>`
                    }
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
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info"
                    },
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right"
                    },
                    exportOptions: {
                        columns: [1, 2]
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
                    text: "New Building Type",
                    attr: {
                        class: "ml-2 btn-success btn btn-sm rounded"
                    },
                    action: function(e, dt, node, config) {
                        $("#add-modal").modal("show")
                    }
                },
            ]
        });

        $("#building-types-table").on("click", ".update-btn", function() {
            let data = buildingTypesTable.row($(this).parents('tr')).data();

            $("#update-modal").modal("show");
            $("#update-transid").val(data.transid);
            $("#update-description").val(data.description);
        });

        $("#building-types-table").on("click", ".delete-btn", function() {
            var data = buildingTypesTable.row($(this).parents("tr")).data();
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
                    fetch(`${APP_URL}/api/building_types/delete`, {
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
                            text: "Building type deleted successfully",
                            icon: "success"
                        });
                        buildingTypesTable.ajax.reload(false, null);
                    }).catch(function(err) {
                        if (err) {
                            Swal.fire({
                                text: "Deleting building type failed"
                            });
                        }
                    })
                }
            })

        });
    </script>
@endsection
