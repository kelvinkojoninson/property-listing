<!-- Modal-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transfer Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="transfer-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">Property<span style="color:red">*</span></label>
                            <select name="propertyID" id="property-dropdown" class="form-control" required>
                                <option value="">Select Property</option>
                                @foreach ($properties as $property)
                                    <option value="{{ $property->transid }}">{{ $property->title }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">New Owner<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="newOwner" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Transfer Date<span style="color:red">*</span></label>
                            <input type="date" class="form-control" name="transferDate" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="transfer-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var transferForm = document.getElementById("transfer-form");

    $(transferForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(transferForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to transfer property?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Transferring asset...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/transfers`, {
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
                    transfersTable.ajax.reload(false, null);
                    transferForm.reset();
                    $("select").val(null).trigger('change');

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Transfer failed"
                        });
                    }
                })
            }
        })
    });

</script>
