<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "tblstates";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'name',
        'country_id',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    public function cities()
    {
        return $this->hasMany(Cities::class, 'state_id', 'transid');
    }
}
