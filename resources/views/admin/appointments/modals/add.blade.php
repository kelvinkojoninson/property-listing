<!-- Modal-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Schedule Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-appointment-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">Client Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="clientName" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Title<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Venue</label>
                            <input type="text" class="form-control" name="venue">
                        </div>
                    </div>
                  <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="status" id="add-status" class="form-control select2" required>
                                <option value="">Select Status</option>
                                <option value="0">Open</option>
                                <option value="1">Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Date<span style="color:red">*</span></label>
                            <input type="date" class="form-control" name="meetingDate" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="add-appointment-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var addAppointmentForm = document.getElementById("add-appointment-form");

    $(addAppointmentForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(addAppointmentForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to schedule appointment?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Scheduling appointment...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/appointments`, {
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
                    $("#add-modal").modal('hide');
                    appointmentsTable.ajax.reload(false, null);
                    addAppointmentForm.reset();
                    $("#add-status").val(null).trigger('change');

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Scheduling appointment failed"
                        });
                    }
                })
            }
        })
    });

</script>
