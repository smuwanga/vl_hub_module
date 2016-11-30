<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SamplesVerify
 */
class SamplesVerify extends Model
{
    protected $table = 'vl_samples_verify';

    public $timestamps = false;

    protected $fillable = [
        'sampleID',
        'outcome',
        'outcomeReasonsID',
        'comments',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}