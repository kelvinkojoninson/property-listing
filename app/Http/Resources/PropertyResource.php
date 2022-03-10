<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $pictures = '';
        if (!empty($this->pictures)) {
            foreach ($this->pictures as $picture) {
                $pictures .= "<a href='{$picture}' target='_blank'><img src='{$picture}' height='150' width='150' class='mr-2'></a>";
            }
        }

        $amenities = '';
        $amenitiesValue = '';
        if (!empty($this->amenities)) {
            foreach ($this->amenities as $amenity) {
                $amenities .= "<span class='label label-lg label-light-primary label-inline'>{$amenity}</span>";
                $amenitiesValue .= $amenity.',';
            }
        }

        $miscs = '';
        $miscValue = '';
        if (!empty($this->misc)) {
            foreach ($this->misc as $other) {
                $miscs .= "<span class='label label-lg label-light-primary label-inline'>{$other}</span>";
                $miscValue .= $other.',';
            }
        }



        return [
            "transid" => $this->transid,
            "title" => $this->title,
            "descriptionTrunc" => \Illuminate\Support\Str::limit($this->description, 100, $end = '...'),
            "description" => $this->description,
            "country" => $this->country,
            "countryDesc" => $this->countryDesc->name,
            "status" => $this->status,
            "statusDesc" => ucfirst($this->status),
            "ownershipStatus" => $this->ownership_status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Owned</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Sold</span>',
            "buildingType" => $this->building_type,
            "buildingDesc" => $this->buildingType->description,
            "stateDesc" => $this->stateDesc->name,
            "state" => $this->state,
            "city" => $this->city,
            "cityDesc" => $this->cityDesc->name,
            "addressTrunc" => \Illuminate\Support\Str::limit($this->address, 100, $end = '...'),
            "address" => $this->address,
            "gpsaddress" => $this->gpsaddress ?? '',
            "priceFormat" => number_format($this->price, 2),
            "price" => $this->price,
            "pictures" => $pictures,
            "bedrooms" => $this->bedrooms,
            "baths" => $this->baths,
            "floors" => $this->floors,
            "garages" => $this->garages,
            "area" => $this->area,
            "miscs" => $miscs,
            "amenitiesValue" => $amenitiesValue,
            "amenities" => $amenities,
            "miscValue" => $miscValue,
            "longitude" => $this->longitude ?? '',
            "latitude" => $this->latitude ?? '',
            "schoolsNeighbourhood" => $this->schools_neighbourhood,
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
        ];
    }
}
