<!-- Modal-->
<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center">
                        <div id="view-pictures">
                            {{-- <img height="150" width="200"
                                alt="property's photo" class="rounded-circle" id="info-product-image"> --}}
                        </div>
                        <div id="view-ownership-status" class="mt-2"></div>
                        <br>
                        <div class="row">
                            <div class="col-12 ">
                                <ul class="list-group list-group-flush">
                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Title:
                                        <span id="view-title"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Description:
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span id="view-description"></span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Building Type:
                                        <span id="view-building-type"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Country:
                                        <span id="view-country"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                       State:
                                        <span id="view-state"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        City:
                                        <span id="view-city"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Address:
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span id="view-address"></span>
                                    </li>
                                    <li class="list-group-item d-flex  align-items-right">
                                        GPS Address:
                                        <span id="view-gpsaddress"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Price:
                                        <span id="view-price"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Bedrooms:
                                        <span id="view-bedrooms"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Baths:
                                        <span id="view-baths"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Floors:
                                        <span id="view-floors"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Garages:
                                        <span id="view-garages"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Area:
                                        <span id="view-area"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Coordinates:
                                        <span id="view-coordinates"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Amenities:
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span id="view-amenities"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Miscellaneous:
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                       <span id="view-miscellaneous"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status:
                                        <span id="view-status"></span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
