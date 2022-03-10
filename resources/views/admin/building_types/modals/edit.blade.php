<!-- Modal-->
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Building Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-building-type-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="update-transid" name="transid" hidden>
                    <div class="row">
                        <div class="col">
                            <label for="">Description</label>
                            <input type="text" id="update-description" name="description" placeholder="Flat" class="form-control form-control-sm">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-building-type-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var editBuildingTypeForm = document.getElementById("edit-building-type-form");

    $(editBuildingTypeForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(editBuildingTypeForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to update building type?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Updating...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/building_types/update`, {
                    method: "POST",
                    body: formdata,
                }).then(function (res) {
                    return res.json()
                }).then(function (data) {
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
                    $("#update-modal").modal('hide');
                    buildingTypesTable.ajax.reload(false, null);
                    editBuildingTypeForm.reset();

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Updating building type failed"
                        });
                    }
                })
            }
        })
    });

</script>
