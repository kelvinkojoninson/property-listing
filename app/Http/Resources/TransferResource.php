<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
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
            "newOwnerName" => $this->new_owner,
            "propertyID" => $this->property_id,          
            "title" => $this->property->title,
            "buildingDesc" => $this->property->buildingType->description,
            "transferDate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->transfer_date))),
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
            "createuser" => $this->createuser,
        ];
    }
}
