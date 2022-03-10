<!-- Modal-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Load Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="load-wallet-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2 @if (Auth::user()->role === 'tenant') d-none @endif">
                        <div class="col">
                            <label for="">Tenants<span style="color:red">*</span></label>
                            <select name="userid" class="form-control drop" required>
                                <option value="all">Select Tenant</option>
                                @foreach ($tenants as $tenant)
                                    <option {{ Auth::user()->userid == $tenant->userid ? 'selected' : '' }} value="{{ $tenant->userid }}">{{ $tenant->userid }} &bullet; {{ $tenant->fname }} {{ $tenant->mname }} {{ $tenant->lname }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Amount</label>
                            <input name="amount" type="text" class="form-control" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="load-wallet-form" class="btn btn-primary font-weight-bold">Load Wallet</button>
            </div>
        </div>
    </div>
</div>
<script>
    var loadWalletForm = document.getElementById("load-wallet-form");

    $(loadWalletForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(loadWalletForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Proceed to load wallet?',
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
                fetch(`${APP_URL}/api/rent/load-wallet`, {
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
                    $("#add-modal").modal('hide');
                    loadWalletForm.reset();
                    $(".drop").val(null).trigger('change');
                    window.location.href = data.msg.url;
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
