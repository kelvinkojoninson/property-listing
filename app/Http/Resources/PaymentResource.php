<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            "name" => "{$this->user->fname} {$this->user->mname} {$this->user->lname}",
            "email" => $this->user->email,
            "phone" => $this->user->phone,
            "amountDue" => number_format($this->amount_due, 2),
            "amountPaid" => number_format($this->amount_paid, 2),
            "balance" => number_format($this->balance, 2),
            "paymentMode" => $this->payment_mode,
            "reference" => $this->reference,
            "createdate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))),
        ];
    }
}
