<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlResultsMerged
 */
class ResultsMerged extends Model
{
    protected $table = 'vl_results_merged';

    public $timestamps = false;

    protected $fillable = [
        'machine',
        'worksheetID',
        'vlSampleID',
        'resultAlphanumeric',
        'resultNumeric',
        'suppressed',
        'created',
        'createdby'
    ];

    protected $guarded = [];

        
}