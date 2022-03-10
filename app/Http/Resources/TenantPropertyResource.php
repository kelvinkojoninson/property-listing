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
            "status" => $this->status,
            "propertyStatus" => $this->status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Occupied</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Vacant</span>',
            "createdate" => strtoupper(date("j M, Y", strtotime($this->createdate))),
        ];
    }
}
