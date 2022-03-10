<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $table = "tblproperties";
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    protected $fillable = [
        'transid',
        'status',
        'ownership_status',
        'title',
        'description',
        'country',
        'state',
        'city',
        'address',
        'gpsaddress',
        'price',
        'building_type',
        'pictures',
        'bedrooms',
        'baths',
        'floors',
        'garages',
        'area',
        'misc',
        'amenities',
        'longitude',
        'latitude',
        'schools_neighbourhood',
        'agent',
        'createdate',
        'createuser',
        'modifyuser',
        'modifydate',
        'deleted',
        'featured',
        'popular'
    ];

    protected $casts = [
        'pictures' => 'array',
        'misc' => 'array',
        'amenities' => 'array',
      ];

    protected $with = ['countryDesc', 'stateDesc', 'cityDesc', 'buildingType'];

    public function countryDesc()
    {
        return $this->belongsTo(Countries::class, 'country', 'id');
    } 

    public function stateDesc()
    {
        return $this->belongsTo(States::class, 'state', 'transid');
    }
    
    public function cityDesc()
    {
        return $this->belongsTo(Cities::class, 'city', 'transid');
    }

    public function buildingType()
    {
        return $this->belongsTo(BuildingTypes::class, 'building_type', 'transid');
    }
}
