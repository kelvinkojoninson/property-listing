<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletHistoryResource extends JsonResource
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
            "amount" => number_format($this->amount, 2),
            "currency" => $this->currency,
            "channel" => $this->channel,
            "type" => $this->transtype,
            "ifo" => $this->ifo,
        ];
    }
}
