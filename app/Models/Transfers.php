<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    use HasFactory;
    protected $table = "tbltransfers";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'new_owner',
        'property_id',
        'transfer_date',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

  
    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id', 'transid');
    }
}
