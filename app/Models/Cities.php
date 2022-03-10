<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = "tblcities";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'name',
        'state_id',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    public function properties()
    {
        return $this->hasMany(Properties::class, 'state', 'transid')->where('deleted', 0) ->where('status', ['rent', 'sale']);
    }
}
