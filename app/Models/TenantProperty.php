<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantProperty extends Model
{
    use HasFactory;
    protected $table = "tbltenant_properties";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'tenant_id',
        'property_id',
        'status',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    protected $appends = [
        'payment'
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id', 'userid');
    }

    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id', 'transid');
    }

    public function getPaymentAttribute()
    {
        return $this->hasMany(Payments::class, 'userid','tenant_id')->where('property_id',$this->property_id)->where('deleted',0)->sum('amount_paid');

    }

}
