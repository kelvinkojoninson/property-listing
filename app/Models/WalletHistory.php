<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'transid',
        'userid',
        'wallet_id',
        'amount',
        'currency',
        'reference',
        'transtype',
        'channel',
        'ifo',
    ];

    protected $casts = [
        'reference',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');

    }
}
