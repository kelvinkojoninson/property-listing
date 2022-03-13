<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantPropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "transid" => $this->transid,
            "tenantID" => $this->tenant_id,
            "tenantName" => "{$this->tenant->fname} {$this->tenant->mname} {$this->tenant->lname}",
            "propertyID" => $this->property_id,
            "propertyTitle" => $this->property->title,
            "price" => number_format($this->property->price, 2),
            "location" => "{$this->property->countryDesc->name}, {$this->property->stateDesc->name}, {$this->property->cityDesc->name}",
            "buildingType" => $this->property->buildingType->description,
            "status" => $this->status,
            "propertyStatus" => $this->status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Occupied</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Vacant</span>',
            "createdate" => strtoupper(date("j M, Y", strtotime($this->createdate))),
            "dateOccupied" => strtoupper(date("j M, Y", strtotime($this->date_occupied))),
            "dateVacated" => empty($this->date_vacacted) ? '' : strtoupper(date("j M, Y", strtotime($this->date_vacacted))),
            "cummulatedPrice" => number_format($this->payment, 2)
        ];
    }
}
