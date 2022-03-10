<!-- Modal-->
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-appointment-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="transid" id="update-transid">
                    <div class="row">
                        <div class="col">
                            <label for="">Client Name<span style="color:red">*</span></label>
                            <input type="text" id="update-client-name" class="form-control" name="clientName" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Title<span style="color:red">*</span></label>
                            <input type="text" id="update-title" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Description</label>
                            <textarea name="description" id="update-description" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Venue</label>
                            <input type="text" id="update-venue" class="form-control" name="venue">
                        </div>
                    </div>
                  <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="status" id="update-status" class="form-control select2" required>
                                <option value="">Select Status</option>
                                <option value="0">Open</option>
                                <option value="1">Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Date<span style="color:red">*</span></label>
                            <input type="date" class="form-control" id="update-meeting-date" name="meetingDate" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="update-appointment-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var updateAppointmentForm = document.getElementById("update-appointment-form");

    $(updateAppointmentForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(updateAppointmentForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to update appointment?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Updating appointment...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/appointments/update`, {
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
                    appointmentsTable.ajax.reload(false, null);
                    updateAppointmentForm.reset();
                    $("#update-status").val(null).trigger('change');

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Updating appointment failed"
                        });
                    }
                })
            }
        })
    });

</script>
