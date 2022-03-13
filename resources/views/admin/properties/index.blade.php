@extends('layouts.layout')
@section('page-name', 'Properties')
@section('page-content')
    <div class="container">
        <div class="card card-custom">
            <!--begin::Body-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vertical-center dataTable js-exportable" id="properties-table">
                        <thead>
                            <tr class="text-left">
                                <th style="width: 5px">No.</th>
                                <th class="pr-0">Title</th>
                                <th class="pr-0">Building Type</th>
                                <th class="pr-0">Country</th>
                                <th class="pr-0">State</th>
                                <th class="pr-0">City</th>
                                <th class="pr-0" style="width: 50px">Price</th>
                                <th class="pr-0" style="width: 50px">Status</th>
                                <th class="pr-0" style="width: 50px">Ownership Status</th>
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
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    @include('admin.properties.modals.add')
    @include('admin.properties.modals.edit')
    @include('admin.properties.modals.view')

    <script>
        let states = @json($states);

        let role = "{!! Auth::user()->role !!}";
        var showAdminColumns = role == 'admin' ? true : false;
        var showAdminButton = role == 'admin' ? '' : 'd-none';

        var propertiesTable = $('#properties-table').DataTable({
            dom: "Bfrtip",
            ajax: {
                url: `${APP_URL}/api/properties`,
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
                    data: "title",
                },
                {
                    data: "buildingDesc",
                },
                {
                    data: "countryDesc",
                },
                {
                    data: "stateDesc",
                },
                {
                    data: "cityDesc",
                },
                {
                    data: "priceFormat",
                },
                {
                    data: "statusDesc",
                    'render': function(data, type, full, meta) {
                        return `<span class="label label-lg font-weight-bold  label-dark label-inline">${data}</span>`
                    },
                },
                {
                    data: "ownershipStatus",
                },
                {
                    data: null,
                    className: 'pr-0 text-right',
                    'render': function(data, type, full, meta) {
                        var html = ``;
                        html += `
                                <a style="cursor:pointer" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3 view-btn">
                                <i class='fas fa-eye'></i>
                                </a> `;

                        if ("{!! Auth::user()->role !!}" == 'admin') {
                            html += `<a style="cursor:pointer" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3 update-btn">
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
                  </a>`
                        }
                        return html
                    },
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
                    text: "Register Property",
                    attr: {
                        class: `ml-2 btn-success btn btn-sm rounded ${showAdminButton}`
                    },
                    action: function(e, dt, node, config) {
                        $("#add-modal").modal("show")
                    },
                },
            ]
        });

        $("#properties-table").on("click", ".update-btn", function() {
            let data = propertiesTable.row($(this).parents('tr')).data();

            $("#update-modal").modal("show");
            $("#update-transid").val(data.transid);
            $("#update-status").val(data.status).trigger('change');
            $("#update-title").val(data.title);
            $("#update-description").val(data.description);
            $("#update-country").val(data.country).trigger('change');
            $("#update-building-type").val(data.buildingType).trigger('change');
            $("#update-address").val(data.address);
            $("#update-gpsaddress").val(data.gpsaddress);
            $("#update-price").val(data.price);
            $("#update-bedrooms").val(data.bedrooms);
            $("#update-baths").val(data.baths);
            $("#update-floors").val(data.floors);
            $("#update-garages").val(data.garages);
            $("#update-area").val(data.area);
            $("#update_misc_tag").val(data.miscValue);
            $("#update_amenities_tag").val(data.amenitiesValue);
            $("#update-longitude").val(data.longitude);
            $("#update-latitude").val(data.latitude);
            $("#update-schools-neighbourhood").val(data.schoolsNeighbourhood);
            $("#update-states-dropdown").val(data.state).trigger('change');
            let citiesDropdown = document.getElementById("update-cities-dropdown");
            getCities(data.city, data.state, citiesDropdown);

        });

        $("#properties-table").on("click", ".view-btn", function() {
            let data = propertiesTable.row($(this).parents('tr')).data();

            $("#view-modal").modal("show");
            document.getElementById("view-title").innerHTML = data.title;
            document.getElementById("view-description").innerHTML = data.description;
            document.getElementById("view-country").innerHTML = data.countryDesc;
            document.getElementById("view-state").innerHTML = data.stateDesc;
            document.getElementById("view-city").innerHTML = data.cityDesc;
            document.getElementById("view-address").innerHTML = data.address;
            document.getElementById("view-building-type").innerHTML = data.buildingDesc;
            document.getElementById("view-gpsaddress").innerHTML = data.gpsaddress;
            document.getElementById("view-price").innerHTML = data.priceFormat;
            document.getElementById("view-bedrooms").innerHTML = data.bedrooms;
            document.getElementById("view-baths").innerHTML = data.baths;
            document.getElementById("view-floors").innerHTML = data.floors;
            document.getElementById("view-garages").innerHTML = data.garages;
            document.getElementById("view-area").innerHTML = data.area;
            document.getElementById("view-coordinates").innerHTML = `${data.longitude}, ${data.latitude}`;
            document.getElementById("view-amenities").innerHTML = data.amenities;
            document.getElementById("view-miscellaneous").innerHTML = data.miscs;
            document.getElementById("view-status").innerHTML = data.statusDesc;
            document.getElementById("view-ownership-status").innerHTML = data.ownershipStatus;
            document.getElementById("view-pictures").innerHTML = data.pictures;
        });

        $("#properties-table").on("click", ".delete-btn", function() {
            var data = propertiesTable.row($(this).parents("tr")).data();
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
                    fetch(`${APP_URL}/api/properties/delete`, {
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
                            text: "Property deleted successfully",
                            icon: "success"
                        });
                        propertiesTable.ajax.reload(false, null);
                    }).catch(function(err) {
                        if (err) {
                            Swal.fire({
                                text: "Deleting property failed"
                            });
                        }
                    })
                }
            })

        });

        let statesDropdown = document.getElementById("states-dropdown");
        let citiesDropdown = document.getElementById("cities-dropdown");

        statesDropdown.addEventListener("change", function(event) {
            let selectedIndex = statesDropdown.options.selectedIndex;
            let stateCode = statesDropdown.options[selectedIndex].value;
            getCities(null, stateCode, citiesDropdown);
        });

        function getCities(citycode, statecode, cityDropdown) {
            let selectedState = states.find((state) => state.transid == statecode);
            let fragment = new DocumentFragment();

            selectedState.cities.map(city => {
                let selected = city.transid == citycode ? true : false;
                let option = new Option(city.name, city.transid, selected, selected);
                fragment.appendChild(option);
            });

            cityDropdown.innerHTML = null;
            cityDropdown.appendChild(fragment);
        }

    </script>
@endsection
