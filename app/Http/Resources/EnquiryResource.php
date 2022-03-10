<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnquiryResource extends JsonResource
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
            "propertyId" => $this->property_id,
            "propertyTitle" => $this->property->title,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "status" => $this->status,
            "enquiryStatus" => $this->status == 0 ? 'Contacted' : 'Not Contacted',
            "message" => \Illuminate\Support\Str::limit($this->message, 100, $end = '...'),
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
        ];
    }
}
