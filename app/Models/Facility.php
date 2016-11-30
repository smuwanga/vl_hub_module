<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlFacility
 */
class Facility extends Model
{
    protected $table = 'vl_facilities';

    public $timestamps = false;

    protected $fillable = [
        'facility',
        'districtID',
        'hubID',
        'ipID',
        'phone',
        'email',
        'contactPerson',
        'physicalAddress',
        'returnAddress',
        'active',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}