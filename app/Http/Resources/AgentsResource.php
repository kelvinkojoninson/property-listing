<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentsResource extends JsonResource
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
            "userid" => $this->userid,
            "username" => $this->username,
            "name" => "{$this->fname} {$this->mname} {$this->lname}",
            "firstName" => $this->fname,
            "lastName" => $this->lname,
            "middleName" => $this->mname,
            "phoneNumber" => $this->phone,
            "phoneNumber2" => $this->phone2,
            "email" => $this->email,
            "picture" => "<a href='{$this->picture}' target='_blank'><img src='{$this->picture}' height='150' width='150' class='mr-2'></a>",
            "approved" => $this->approved,
            "approvalStatus" => $this->approved == 0 ? '<span class="label label-lg font-weight-bold  label-primary label-inline">Approved</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Not Approved</span>',
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
        ];
    }
}
