<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            "clientName" => $this->customer_id,
            "title" => $this->title,          
            "meetingDate" => $this->meeting_date,
            "description" => $this->description,
            "venue" => $this->venue,
            "status" => $this->status,
            "statusDesc" => $this->status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Open</span>' : '<span class="label label-lg font-weight-bold  label-warning label-inline">Closed</span>',
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
            "createuser" => "{$this->user->fname} {$this->user->mname} {$this->user->lname}",
        ];
    }
}
