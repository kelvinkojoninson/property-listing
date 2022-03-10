<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'wallet_id',
    ];

    protected $appends = [
        'balance'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');

    }

    public function history()
    {
        return $this->hasMany(WalletHistory::class, 'wallet_id', 'wallet_id');

    }

    public function getBalanceAttribute()
    {
        return $this->history()->sum('amount');

    }

}
