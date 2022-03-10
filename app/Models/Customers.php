<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = "tblcustomers";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'userid',
        'username',
        'fname',
        'lname',
        'mname',
        'phone',
        'phone2',
        'email',
        'picture',
        'approved',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    public function agents()
    {
        return $this->hasMany(OwnerAgents::class, 'userid', 'owner_id');
    } 
}
