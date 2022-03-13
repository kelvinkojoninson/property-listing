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
            "paymentID" => $this->transid ?? $this->payment_id,
            "id" => $this->id,
            "userid" => $this->userid,
            "name" => "{$this->user->fname} {$this->user->mname} {$this->user->lname}",
            "property" => $this->property->title,
            "amountDue" => number_format($this->amount_due, 2),
            "amountPaid" => number_format($this->amount_paid, 2),
            "paymentMode" => $this->payment_mode,
            "reference" => $this->reference,
            "status" => $this->status == 0 ? '<span class="label label-lg font-weight-bold  label-success label-inline">Successful</span>' : '<span class="label label-lg font-weight-bold  label-danger label-inline">Failed</span>',
            "paymentDate" => strtoupper(date("j M, Y h:i:sa", strtotime($this->createdate))) ?? strtoupper(date("j M, Y h:i:sa", strtotime($this->payment_date))),
        ];
    }
}
