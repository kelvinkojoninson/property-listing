<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentPropertyResource extends JsonResource
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
            "agentID" => $this->agent_id,
            "agentName" => "{$this->agent->fname} {$this->agent->mname} {$this->agent->lname}",
            "propertyID" => $this->property_id,
            "propertyTitle" => $this->property->title,
            "status" => $this->status,
            "propertyStatus" => $this->status == 0 ? 'Assigned' : 'Unassigned',
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
        ];
    }
}
