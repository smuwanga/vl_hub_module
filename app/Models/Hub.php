<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlHub
 */
class Hub extends Model
{
    protected $table = 'vl_hubs';

    public $timestamps = false;

    protected $fillable = [
        'hub',
        'email',
        'ipID',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}