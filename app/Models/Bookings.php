<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'booking_code',
        'userid',
        'property_id',
        'ifo',
        'ifo_name',
        'ifo_phone',
        'occupants_no',
        'status',
        'is_approved',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'createuser', 'userid');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'transid');
    }
}
