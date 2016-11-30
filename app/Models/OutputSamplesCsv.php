<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VlOutputSamplescsv
 */
class OutputSamplesCsv extends Model
{
    protected $table = 'vl_output_samplescsv';

    public $timestamps = false;

    protected $fillable = [
        'FormNumber',
        'LocationID',
        'SampleID',
        'Facility',
        'District',
        'Hub',
        'IP',
        'DateofCollection',
        'SampleType',
        'PatientART',
        'PatientOtherID',
        'Gender',
        'Age',
        'PhoneNumber',
        'HasPatientBeenontreatment',
        'DateofTreatmentInitiation',
        'CurrentRegimen',
        'OtherRegimen',
        'IndicationforTreatmentInitiation',
        'WhichTreatmentLineisPatienton',
        'ReasonforFailure',
        'IsPatientPregnant',
        'ANCNumber',
        'IsPatientBreastfeeding',
        'PatienthasActiveTB',
        'IfYesaretheyon',
        'ARVAdherence',
        'RoutineMonitoring',
        'LastViralLoadDate1',
        'LastViralLoadValue1',
        'SampleType1',
        'RepeatViralLoadTest',
        'LastViralLoadDate2',
        'LastViralLoadValue2',
        'SampleType2',
        'SuspectedTreatmentFailure',
        'LastViralLoadDate3',
        'LastViralLoadValue3',
        'SampleType3',
        'Tested',
        'LastWorksheet',
        'MachineType',
        'VLResult',
        'DateTimeApproved',
        'DateTimeRejected',
        'RejectionReason',
        'DateTimeAddedtoWorksheet',
        'DateTimeLatestResultsUploaded',
        'DateTimeResultsPrinted',
        'DateReceivedatCPHL',
        'DateTimeFirstPrinted',
        'DateTimeSamplewasCaptured'
    ];

    protected $guarded = [];

        
}