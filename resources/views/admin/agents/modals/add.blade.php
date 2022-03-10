<!-- Modal-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Realtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-agents-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">First Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="firstName" required>
                        </div>
                        <div class="col">
                            <label for="">Last Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="lastName" required>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Other Names</label>
                            <input type="text" class="form-control" name="middleName">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Phone<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="phoneNumber" required>
                        </div>
                        <div class="col">
                            <label for="">Phone(S)</label>
                            <input type="text" class="form-control" name="phoneNumber2">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Email<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="approved" class="form-control select2" required>
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
                <button type="submit" form="add-agents-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var addAgentsForm = document.getElementById("add-agents-form");

    $(addAgentsForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(addAgentsForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to add realtor?',
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
                fetch(`${APP_URL}/api/agents`, {
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
                    $("#add-modal").modal('hide');
                    agentsTable.ajax.reload(false, null);
                    addAgentsForm.reset();
                    $("select").val(null).trigger('change');

                }).catch(function(err) {
                    if (err) {
                        Swal.fire({
                            text: "Realtor registration failed"
                        });
                    }
                })
            }
        })
    });

</script>
