<!-- Modal-->
<div class="modal fade" id="assign-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="assign-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" required name="bookingCode" id="booking-code">
                    <div class="row">
                        <div class="col">
                            <label for="">User</label>
                            <input type="hidden" id="book-userid" name="userid" class="form-control">
                            <span id="book-user" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Property</label><br>
                            <input type="hidden" id="book-property" name="property" class="form-control">
                            <span id="book-property-title" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Booking Status</label>
                            <span id="book-status" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Account Balance</label>
                            <input type="hidden" id="user-balance" name="balance" class="form-control">
                            <span id="user-balance-label" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Date Occupied<span style="color:red">*</span></label>
                            <input type="date" name="dateOccupied" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="status" class="form-control drop" required>
                                <option value=""></option>
                                <option value="2">Suspend</option>
                                <option value="0">Occupied</option>
                                <option value="1">Vacated</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="assign-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var assignForm = document.getElementById("assign-form");

    $(assignForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(assignForm)
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
                    $("#assign-modal").modal('hide');
                    bookingsTable.ajax.reload(false, null);
                    propertyTable.ajax.reload(false, null);
                    assignForm.reset();
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
