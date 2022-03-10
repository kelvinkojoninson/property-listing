<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "transid" => $this->id,
            "tenantID" => $this->user->userid,
            "tenantName" => "{$this->user->fname} {$this->user->mname} {$this->user->lname}",
            "walletID" => $this->wallet_id,
            "balance" => $this->balance > 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">'.number_format($this->balance, 2).'</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">'.number_format($this->balance, 2).'</span>',
        ];
    }
}
