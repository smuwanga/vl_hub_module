<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Facility;
use App\Models\OutputSamplesCsv;
use App\Models\Patient;
use App\Models\PatientPhone;
use App\Models\ResultsMerged;
use App\Models\SamplesVerify;

use Illuminate\Http\Request;

use Yajra\Datatables\Facades\Datatables;
use Log;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Utils\Utilities;
use QrCode;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard')
            ->withUser(access()->user());
    }

    public function getData()
	{
	    //$users = $this->user->select('*');
	    $user_id = Auth::user()->email;
	    Log::info('logged in user is.......: '.$user_id);
	    
		$users = User::select('*');
	    return Datatables::of($users)
	        
	        ->make(true);
	}
	public function getHubFacilities(){
		$hub_id = Auth::user()->hub_id;
	    
		//$hubFacilities = Facility::select('*')->where('hubID','=',$hub_id);
		$hubFacilities = Facility::join('vl_districts','vl_facilities.districtID','=','vl_districts.id')
							->select('vl_facilities.id','vl_facilities.facility','vl_districts.district','vl_facilities.contactPerson','vl_facilities.phone','vl_facilities.email')
								->where('vl_facilities.hubID','=',$hub_id);
	    return Datatables::of($hubFacilities)
	        
	        ->make(true);
	}
	public function getFacilityPatients($id){

		//['facility' => Facility::findOrFail($id)] 'facility' => Facility::findOrFail($id),
		Log::info('....................: '.$id);

		//$facility_patients = OutputSamplesCsv::select('*');
        //$facility_patients = array('facility_patients' => $facility_patients )
		
		//view('users')->with(compact('users'));
		
		$facility_patients  = DB::table('vl_output_samplescsv')->where('district','=','kabarole');     
        // var_dump($facility_patients);

        return view('frontend.user.patients');
        
		
	}

		public function getFacilityPatientsp($id){
		
	        $facility_patients = OutputSamplesCsv::select('*')
								->where('district','=','kabarole');
	    return Datatables::of($facility_patients)
	        
	        ->make(true);
	}

	public function  getPatientResultsView($id){
		//return view('frontend.user.patientresults');
		$formID = $id;
		
		//var_dump($result); where('active', 1)->first();
		$result  = OutputSamplesCsv::where('FormNumber',''.$formID.'')->first(); 
		$patientInformation = Patient::where('artNumber',''.$result->PatientART.'')->first();
		$patientPhone = PatientPhone::where('patientID',$patientInformation->id)->first();
		$resultsMerged = ResultsMerged::where('vlSampleID',$result->SampleID)->first();
		$str = $result->VLResult;
		$samplesVerify = SamplesVerify::where('sampleID',$result->SampleID)->first();
		$viralLoadProcessedResult = Utilities::getViralLoadProcessedResult($str);

		
		

		return view('frontend.user.patientresults',['formID'=>$formID,'result'=>$result,
			'patientInformation'=>$patientInformation,'patientPhone'=>$patientPhone,
			'resultsMerged'=>$resultsMerged, 'viralLoadProcessedResult'=>$viralLoadProcessedResult,
			'samplesVerify'=>$samplesVerify]);

	}
	public function  getPatientResults($id){
		return view('frontend.user.patientresults');
	}

	
  
}
