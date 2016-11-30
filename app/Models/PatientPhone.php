<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlPatientsPhone
 */
class PatientPhone extends Model
{
    protected $table = 'vl_patients_phone';

    public $timestamps = false;

    protected $fillable = [
        'patientID',
        'phone',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}