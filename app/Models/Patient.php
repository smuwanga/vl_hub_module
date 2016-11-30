<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlPatient
 */
class Patient extends Model
{
    protected $table = 'vl_patients';

    public $timestamps = false;

    protected $fillable = [
        'uniqueID',
        'artNumber',
        'otherID',
        'gender',
        'dateOfBirth',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}