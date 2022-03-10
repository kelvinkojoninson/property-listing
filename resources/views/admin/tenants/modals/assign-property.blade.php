<!-- Modal-->
<div class="modal fade" id="assign-property-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Property to Realtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="assign-property-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">Tenant</label>
                            <select name="tenant" id="tenants-dropdown" class="form-control drop" required>
                                <option value="">Select Tenant</option>
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->userid }}">{{ $tenant->userid }} &bullet;
                                        {{ $tenant->fname }} {{ $tenant->mname }} {{ $tenant->lname }}</option>
                                @endforeach
                            </select>
                        </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="">Properties</label>
                    <select name="property" id="property-dropdown" class="form-control drop" required>
                        <option value="">Select Property</option>
                        @foreach ($properties as $property)
                            <option value="{{ $property->transid }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="">Status<span style="color:red">*</span></label>
                    <select name="status" class="form-control select2 drop" required>
                        <option value="">Select Status</option>
                        <option value="0">Occupied</option>
                        <option value="1">Vacant</option>
                    </select>
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            <button type="submit" form="assign-property-form" class="btn btn-primary font-weight-bold">Save</button>
        </div>
    </div>
</div>
</div>
<script>
    var assignPropertyForm = document.getElementById("assign-property-form");

    $(assignPropertyForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(assignPropertyForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to assign property to this tenant?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Processing...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/tenants/assign_property`, {
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
                        text: data.msg,
                        icon: "success"
                    });
                    $("#assign-property-modal").modal('hide');
                    propertyTenantTable.ajax.reload(false, null);
                    assignPropertyForm.reset();
                    $(".drop").val(null).trigger('change');

                }).catch(function(err) {
                    if (err) {
                        console.log(err)
                        Swal.fire({
                            text: "Operation failed"
                        });
                    }
                })
            }
        })
    });

</script>
