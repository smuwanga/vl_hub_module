<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlDistrict
 */
class District extends Model
{
    protected $table = 'vl_districts';

    public $timestamps = false;

    protected $fillable = [
        'district',
        'mapCode',
        'regionID',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}