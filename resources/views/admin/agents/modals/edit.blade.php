<!-- Modal-->
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Realtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-agent-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" required name="transid" id="update-transid">
                    <input type="hidden" required name="userid" id="update-userid">

                    <div class="row">
                        <div class="col">
                            <label for="">First Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="update-firstname" name="firstName" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Last Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="update-lastname" name="lastName" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Other Names</label>
                            <input type="text" class="form-control" id="update-middlname" name="middleName">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Phone<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="update-phone" name="phoneNumber" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Phone(S)</label>
                            <input type="text" class="form-control" id="update-phone2" name="phoneNumber2">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Email<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="update-email" name="email" required>
                        </div>
                    </div>
                   <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="approved" id="update-status" class="form-control select2" required>
                                <option value="">Select Status</option>
                                <option value="0">Approved</option>
                                <option value="1">Not Approved</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Upload Picture</label>
                            <input type="file" name="image" accept="image/*" class="form-control-file form-control-sm">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="update-agent-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var updateAgentForm = document.getElementById("update-agent-form");

    $(updateAgentForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(updateAgentForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to update realtor?',
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
                fetch(`${APP_URL}/api/agents/update`, {
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
                    agentsTable.ajax.reload(false, null);
                    updateAgentForm.reset();
                    $("select").val(null).trigger('change');

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Realtor update failed"
                        });
                    }
                })
            }
        })
    });

</script>
