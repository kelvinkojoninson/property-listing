<!-- Modal-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-property-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                         <div class="col">
                            <label for="">Title<span style="color:red">*</span></label>
                            <input type="text" required name="title" placeholder="Apartment 1" class="form-control form-control-sm">
                        </div>
                    </div>
                   <div class="row mt-2">
                        <div class="col">
                            <label for="">Description<span style="color:red">*</span></label>
                            <textarea name="description" required cols="30" rows="5" class="form-control form-control-sm"></textarea>
                         </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Building Type<span style="color:red">*</span></label>
                            <select name="buildingType" class="form-control select2" required>
                                <option value="">Select</option>
                                @foreach ($buildingTypes as $buildingType)
                                    <option value="{{ $buildingType->transid }}">{{ $buildingType->description }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Country<span style="color:red">*</span></label>
                            <select name="country" id="country-dropdown" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">State<span style="color:red">*</span></label>
                            <select name="state" id="states-dropdown" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->transid }}">{{ $state->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">City<span style="color:red">*</span></label>
                            <select name="city" id="cities-dropdown" class="form-control" required>
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Address<span style="color:red">*</span></label>
                            <textarea name="address" cols="30" required rows="5" class="form-control form-control-sm"></textarea>
                         </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">GPS Address</label>
                            <input type="text" name="gpsaddress" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Price<span style="color:red">*</span></label>
                            <input type="text" name="price" required class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Bedrooms</label>
                            <input type="number" name="bedrooms" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Baths</label>
                            <input type="number" name="baths" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Floors</label>
                            <input type="number" name="floors" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Garages</label>
                            <input type="number" name="garages" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Area (m<sup>2</sup>)</label>
                            <input type="text" name="area" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Longitude</label>
                            <input type="text" name="longitude" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Latitude</label>
                            <input type="text" name="latitude" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Amenities</label>
                            <input id="amenities_tag" class="form-control tagify" name='amenities' placeholder="Add Amenity" value="" />
                        </div>
                        <div class="col">
                            <label for="">Miscellaneous</label>
                            <input id="misc_tag" class="form-control tagify" name='miscellaneous' placeholder="Add" value="" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Schools & Neighbourhood</label>
                            <textarea name="schools_neighbourhood" cols="30" rows="5" class="form-control form-control-sm"></textarea>
                         </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="status" class="form-control select2" required>
                                <option value="">Select Status</option>
                                 <option value="rent">Rent</option>
                                 <option value="rented">Rented</option>
                                 <option value="sold">Sold</option>
                                 <option value="sale">Sale</option>
                              </select>
                        </div>
                        <div class="col">
                            <label for="">Upload Pictures</label>
                            <input type="file" name="images[]" multiple accept="image/*" class="form-control-file form-control-sm">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="add-property-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var addPropertyForm = document.getElementById("add-property-form");

    $(addPropertyForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(addPropertyForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to register property?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Registering...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/properties`, {
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
                    // $("#add-modal").modal('hide');
                    propertiesTable.ajax.reload(false, null);
                    // addPropertyForm.reset();
                    // $("select").val(null).trigger('change');

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Adding property failed"
                        });
                    }
                })
            }
        })
    });

</script>
