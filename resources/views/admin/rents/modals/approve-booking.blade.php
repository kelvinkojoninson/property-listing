<!-- Modal-->
<div class="modal fade" id="approve-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="approve-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" required name="bookingCode" id="update-booking-code">
                    <div class="row">
                        <div class="col">
                            <label for="">User</label>
                            <input type="hidden" id="update-user" name="userid" class="form-control">
                            <span id="update-property-user" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Property</label><br>
                            <input type="hidden" id="update-property" name="property" class="form-control">
                            <span id="update-property-title" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">For<span style="color:red">*</span></label>
                            <select name="ifo" id="update-ifo" class="form-control drop" required>
                                <option value="self">Self</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2 ifo">
                        <div class="col">
                            <label for="">Person<span style="color:red">*</span></label>
                            <input type="text" id="update-person" name="ifo-person" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2 ifo">
                        <div class="col">
                            <label for="">Phone<span style="color:red">*</span></label>
                            <input type="text" id="update-phone" name="ifo-phone" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Number of Occupants</label>
                            <input type="number" min="1" id="update-occupants-no" name="occupants_no"
                                class="form-control">
                        </div>
                    </div>
                    @if (Auth::user()->role !== 'tenant')
                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Status<span style="color:red">*</span></label>
                                <select name="status" id="update-status" class="form-control select2 drop" required>
                                    <option value="0">Approve</option>
                                    <option value="1">Pending</option>
                                </select>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="approve-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var approveBookingForm = document.getElementById("approve-form");

    $(approveBookingForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(approveBookingForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Proceed?',
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
                fetch(`${APP_URL}/api/booking/update`, {
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
                    $("#approve-modal").modal('hide');
                    bookingsTable.ajax.reload(false, null);
                    approveBookingForm.reset();
                    $(".drop").val(null).trigger('change');

                }).catch(function(err) {
                    if (err) {
                        Swal.fire({
                            text: "Operation failed"
                        });
                    }
                })
            }
        })
    });

    

</script>
