<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            "email" => $this->email,
            "picture" => "<a href='{$this->picture}' target='_blank'><img src='{$this->picture}' height='150' width='150' class='mr-2'></a>",
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
        ];
    }
}
