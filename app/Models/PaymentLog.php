<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'property_id',
        'userid',
        'amount_due',
        'payment_date',
        'status',
        'reference'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    } 

    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id', 'transid');
    }
}
