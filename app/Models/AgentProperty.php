<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentProperty extends Model
{
    use HasFactory;
    protected $table = "tblagent_properties";
    protected $primaryKey = "transid";
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'agent_id',
        'property_id',
        'status',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
    ];

    public function agent()
    {
        return $this->belongsTo(Agents::class, 'agent_id', 'userid');
    }

    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id', 'transid');
    }
}
