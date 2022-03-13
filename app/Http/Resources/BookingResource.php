<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pictures = '';
        if (!empty($this->property->pictures)) {
            foreach ($this->property->pictures as $picture) {
                $pictures .= "<a href='{$picture}' target='_blank'><img src='{$picture}' height='150' width='150' class='mr-2'></a>";
            }
        }

        $amenities = '';
        $amenitiesValue = '';
        if (!empty($this->property->amenities)) {
            foreach ($this->property->amenities as $amenity) {
                $amenities .= "<span class='label label-lg label-light-primary label-inline'>{$amenity}</span>";
                $amenitiesValue .= $amenity.',';
            }
        }

        $miscs = '';
        $miscValue = '';
        if (!empty($this->property->misc)) {
            foreach ($this->property->misc as $other) {
                $miscs .= "<span class='label label-lg label-light-primary label-inline'>{$other}</span>";
                $miscValue .= $other.',';
            }
        }
        return [
            "bookingCode" => $this->booking_code,
            "propertyID" => $this->property_id,
            "propertyTitle" => $this->property->title,
            'userid' => $this->userid,
            'name' =>  "{$this->user->fname} {$this->user->mname} {$this->user->lname}",
            "ifoName" => empty($this->ifo_phone) ? "{$this->user->fname} {$this->user->mname} {$this->user->lname}" : $this->ifo_name,
            "ifo" => $this->ifo,
            "ifoPhone" => empty($this->ifo_phone) ? (empty($this->user->phone) ? '' : $this->user->phone): $this->ifo_phone,
            "occupants" => $this->occupants_no,
            "status" => $this->status,
            "bookStatus" => $this->status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Approved</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Pending</span>',
            "approved" => $this->is_approved,
            "approvedStatus" => $this->is_approved == 0 ? 'Approved' : 'Pending',
            "approvedBy" => empty($this->modifydate) ? '' : "{$this->approved->fname} {$this->approved->mname} {$this->approved->lname}",
            "dateBooked" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
            "dateApproved" => empty($this->modifydate) ? '' : strtoupper(date("j M, Y h:i:sa", strtotime($this->modifydate))),
            "balance" => $this->wallet->balance, 
            "balanceDesc" => empty($this->wallet->balance) ? 0.00 : number_format($this->wallet->balance, 2), 

            //property
            "title" => $this->property->title,
            "descriptionTrunc" => \Illuminate\Support\Str::limit($this->property->description, 100, $end = '...'),
            "description" => $this->property->description,
            "countryDesc" => $this->property->countryDesc->name,
            "statusDesc" => ucfirst($this->property->status),
            "ownershipStatus" => $this->property->ownership_status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Owned</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Sold</span>',
            "buildingDesc" => $this->property->buildingType->description,
            "stateDesc" => $this->property->stateDesc->name,
            "cityDesc" => $this->property->cityDesc->name,
            "address" => $this->property->address,
            "gpsaddress" => $this->property->gpsaddress ?? '',
            "priceFormat" => number_format($this->property->price, 2),
            "pictures" => $pictures,
            "bedrooms" => $this->property->bedrooms,
            "baths" => $this->property->baths,
            "floors" => $this->property->floors,
            "garages" => $this->property->garages,
            "area" => $this->property->area,
            "miscs" => $miscs,
            "amenities" => $amenities,
            "miscValue" => $miscValue,
            "longitude" => $this->property->longitude ?? '',
            "latitude" => $this->property->latitude ?? '',
            "schoolsNeighbourhood" => $this->property->schools_neighbourhood,
        ];
    }
}
