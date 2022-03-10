<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingTypes extends Model
{
    use HasFactory;
    protected $table = "tblbuilding_types";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'description',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    public function properties()
    {
        return $this->hasMany(Properties::class, 'building_type', 'transid')->where('deleted', 0);
    }
}
