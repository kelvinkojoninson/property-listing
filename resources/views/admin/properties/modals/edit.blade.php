<!-- Modal-->
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-property-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="update-transid" hidden required name="transid">

                    <div class="row">
                        <div class="col">
                            <label for="">Title<span style="color:red">*</span></label>
                            <input type="text" id="update-title" required name="title" placeholder="Apartment 1" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Description<span style="color:red">*</span></label>
                            <textarea name="description" id="update-description" required cols="30" rows="10" class="form-control form-control-sm"></textarea>
                         </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Building Type<span style="color:red">*</span></label>
                            <select name="buildingType" id="update-building-type" class="form-control select2" required>
                                <option value="">Select</option>
                                @foreach ($buildingTypes as $buildingType)
                                    <option value="{{ $buildingType->transid }}">{{ $buildingType->description }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Country<span style="color:red">*</span></label>
                            <select name="country" id="update-country" class="form-control select2" required>
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
                            <select name="state" id="update-states-dropdown" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->transid }}">{{ $state->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">City<span style="color:red">*</span></label>
                            <select name="city" id="update-cities-dropdown" class="form-control" required>
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Address<span style="color:red">*</span></label>
                            <textarea name="address" id="update-address" cols="30" required rows="10" class="form-control form-control-sm"></textarea>
                         </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">GPS Address</label>
                            <input type="text" name="gpsaddress" id="update-gpsaddress" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Price<span style="color:red">*</span></label>
                            <input type="text" name="price" id="update-price" required class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Bedrooms</label>
                            <input type="number" id="update-bedrooms" name="bedrooms" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Baths</label>
                            <input type="number" id="update-baths" name="baths" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Floors</label>
                            <input type="number" id="update-floors" name="floors" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Garages</label>
                            <input type="number" id="update-garages" name="garages" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Area (m<sup>2</sup>)</label>
                            <input type="text" id="update-area" name="area" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Longitude</label>
                            <input type="text" id="update-longitude" name="longitude" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Latitude</label>
                            <input type="text" id="update-latitude" name="latitude" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Amenities</label>
                            <input id="update_amenities_tag" class="form-control tagify" name='amenities' placeholder="Add Amenity"/>
                        </div>
                        <div class="col">
                            <label for="">Miscellaneous</label>
                            <input id="update_misc_tag" class="form-control tagify" name='miscellaneous' placeholder="Add"/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Schools & Neighbourhood</label>
                            <textarea name="schools_neighbourhood" id="update-schools-neighbourhood" cols="30" rows="5" class="form-control form-control-sm"></textarea>
                         </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Status<span style="color:red">*</span></label>
                            <select name="status" id="update-status" class="form-control select2" required>
                                <option value="">Select Status</option>
                                <option value="rent">Rent</option>
                                <option value="rented">Rented</option>
                                <option value="sold">Sold</option>
                                <option value="sale">Sale</option>
                              </select>
                        </div>
                        <div class="col">
                            <label for="">Upload Pictures</label>
                            <input type="file" name="images[]" multiple="multiple" accept="image/*" class="form-control-file form-control-sm">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" form="update-property-form" class="btn btn-primary font-weight-bold">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    var updatePropertyForm = document.getElementById("update-property-form");

    $(updatePropertyForm).submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(updatePropertyForm)
        formdata.append("createuser", CREATEUSER);
        Swal.fire({
            title: 'Are you sure you want to update property?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Updating Property...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/properties/update`, {
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
                    propertiesTable.ajax.reload(false, null);
                    updatePropertyForm.reset();
                    $("select").val(null).trigger('change');

                }).catch(function (err) {
                    if (err) {
                        Swal.fire({
                            text: "Updating property failed"
                        });
                    }
                })
            }
        })
    });

</script>
