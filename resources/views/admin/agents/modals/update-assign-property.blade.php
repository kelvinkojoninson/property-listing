<!-- Modal-->
<div class="modal fade" id="update-assign-property-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Property to Realtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-assign-property-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" required name="transid" id="update-transid1">
                    <div class="row">
                        <div class="col">
                            <label for="">Realtor</label>
                            <select name="agent" id="update-agents-dropdown" class="form-control" required>
                                <option value="">Select Realtor</option>
                               @foreach ($agents as $agent)
                                    <option value="{{ $agent->userid }}">{{ $agent->userid }} &bullet;
                                        {{ $agent->fname }} {{ $agent->mname }} {{ $agent->lname }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Properties</label>
                            <select name="property" id="update-property-dropdown" class="form-control" required>
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
                            <select name="status" id="update-status1" class="form-control select2" required>
                                <option value="">Select Status</option>
                                <option value="0">Assign</option>
                                <option value="1">Unassign</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="update-assign-property-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var updateAssignPropertyForm = document.getElementById("update-assign-property-form");

    $(updateAssignPropertyForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(updateAssignPropertyForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to update property to this realtor?',
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
                fetch(`${APP_URL}/api/agents/update_assign_property`, {
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
                    $("#update-assign-property-modal").modal('hide');
                    propertyAgentsTable.ajax.reload(false, null);
                    updateAssignPropertyForm.reset();
                    $("select").val(null).trigger('change');

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
