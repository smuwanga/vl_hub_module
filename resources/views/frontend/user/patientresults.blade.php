@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
<a href="javascript:myFunction()">print</a>
            <div class="panel panel-default">
                

        @permission('view-patients')

                <div class="panel-body">

                            
                    <div id="results">
                        <!-- <div class="print-container"> -->
                        <div class="print-header">
                            <img src="../img/backend/sample_result/uganda.emblem.gif">
                            <div class="print-header-moh">
                                Ministry Of Health Uganda<br>
                                National Aids Control Program<br>
                            </div>
                            Central Public Health Laboratories<br>
                            <u>Viral Load Test Results</u><br>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" >
                                <div class="print-ttl">facility details</div>
                                <div class="print-sect">
                                    <table>
                                        <tr>
                                            <td>Name:</td>
                                            <td class="print-val">{{$result->Facility}}</td>
                                        </tr>
                                        <tr>
                                            <td>District:</td>
                                            <td class="print-val">{{$result->District}} | Hub: {{$result->Hub}}</td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="col-xs-6">
                                <div class="print-ttl">sample details</div>
                                <div class="print-sect">
                                    <table>
                                        <tr>
                                            <td>Form #: </td>
                                            <td class="print-val">{{$formID}}</td>
                                        </tr>
                                        <tr>
                                            <td>Sample Type: </td>
                                            <td class="print-val-check"> 
                                                
                                                    @if ($result->SampleType == 'DBS')
                                                        {{ Form::checkbox('dbs_checkbox', 'DBS',true) }} DBS&nbsp;
                                                        {{ Form::checkbox('plasma_checkbox', 'Plasma') }} Plasma

                                                    @elseif ($result->SampleType == 'Plasma')
                                                        {{ Form::checkbox('dbs_checkbox', 'DBS') }} DBS&nbsp;
                                                        {{ Form::checkbox('plasma_checkbox', 'Plasma',true) }}Plasma
                                                    @else
                                                        <input type="checkbox" name="vehicle" value="Car">DBS
                                            &nbsp;<input type="checkbox" name="vehicsle" value="Car">Plasma
                                                    @endif

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="print-ttl">patient information</div>
                        <div class="print-sect">
                            <div class="row">
                                <div class="col-xs-6" >             
                                    <table>
                                        <tr>
                                            <td>ART Number: &nbsp;</td>
                                            <td class="print-val">{{$result->PatientART}}</td>
                                        </tr>
                                        <tr>
                                            <td>Other ID:</td>
                                            <td class="print-val">{{$result->PatientOtherID}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td class="print-val-check">
                                                @if ($patientInformation->gender == 'Male')
                                                        {{ Form::checkbox('male_checkbox', 'Male',true) }} Male&nbsp;
                                                        {{ Form::checkbox('female_checkbox', 'Female') }} Female&nbsp;
                                                        {{ Form::checkbox('left_blank_checkbox', 'Left Blank') }} Left blank&nbsp;
                                                    @elseif ($result->SampleType == 'Female')
                                                        {{ Form::checkbox('male_checkbox', 'Male') }} Male&nbsp;
                                                        {{ Form::checkbox('female_checkbox', 'Female',true) }} Female&nbsp;
                                                        {{ Form::checkbox('left_blank_checkbox', 'Left Blank') }} Left blank&nbsp;
                                                    @else
                                                        {{ Form::checkbox('male_checkbox', 'Male') }} Male&nbsp;
                                                        {{ Form::checkbox('female_checkbox', 'Female') }} Female&nbsp;
                                                        {{ Form::checkbox('left_blank_checkbox', 'Left Blank', true) }} Left blank&nbsp;
                                                    @endif
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                                <div class="col-xs-6">
                                    <table>
                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td class="print-val">{{$patientInformation->dateOfBirth}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number:</td>
                                            <td class="print-val-">{{$patientPhone->phone}}</td>
                                        </tr>
                                    </table>
                                    
                                </div>

                            </div>
                        </div>
                        <div class="print-ttl">sample test information</div>
                        <div class="print-sect">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <table>
                                                <tr>
                                                    <td>Sample Collection Date: &nbsp; </td>
                                                    <td class="print-val">{{$result->DateofCollection}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Reception Date: &nbsp; </td>
                                                    <td class="print-val">{{$result->DateReceivedatCPHL}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Test Date: &nbsp; </td>
                                                    <td class="print-val">{{$result->DateTimeLatestResultsUploaded}}</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-xs-6">
                                            
                                            <table>
                                                <tr>
                                                    <td>Repeat Test:  &nbsp; </td>
                                                    <td>
                                                    @if ($result->RepeatViralLoadTest == 'No')
                                                        {{ Form::checkbox('yes_repeat_test_checkbox', 'Yes') }} Yes&nbsp;
                                                        {{ Form::checkbox('no_repeat_test_checkbox', 'No',true) }} No&nbsp;

                                                    @elseif ($result->RepeatViralLoadTest == 'Yes')
                                                       {{ Form::checkbox('yes_repeat_test_checkbox', 'Yes',true) }} Yes&nbsp;
                                                        {{ Form::checkbox('no_repeat_test_checkbox', 'No') }} No&nbsp;

                                                    @else
                                                         {{ Form::checkbox('yes_repeat_test_checkbox', 'Yes') }} Yes&nbsp;
                                                        {{ Form::checkbox('no_repeat_test_checkbox', 'No') }} No&nbsp;
                                                    @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sample Rejected:  &nbsp; </td>
                                                    <td>
                                                    @if ($samplesVerify->outcome == 'Rejected')
                                                        {{ Form::checkbox('rejected_checkbox', 'Yes') }} Yes&nbsp;
                                                        {{ Form::checkbox('not_rejected_checkbox', 'No',true) }} No&nbsp;

                                                    @elseif ($samplesVerify->outcome == 'Accepted')
                                                       {{ Form::checkbox('rejected_checkbox', 'Yes',true) }} Yes&nbsp;
                                                       {{ Form::checkbox('not_rejected_checkbox', 'No') }} No&nbsp;

                                                    @else
                                                         {{ Form::checkbox('rejected_checkbox', 'Yes',false) }} Yes&nbsp;
                                                         {{ Form::checkbox('not_rejected_checkbox', 'No',false) }} No&nbsp;
                                                    @endif
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>        
                                    </div> 
                            </div>
                            <div class="print-ttl">viral load results</div>
                            <div class="print-sect">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <table colspan="2">
                                            <tr>
                                                <td width="40%">Method Used: </td>
                                                <td>
                                                    @if ($result->MachineType == 'abbott')
                                                        Abbott Real time HIV-1 PCR &nbsp;
                                                    

                                                    @elseif ($result->MachineType == 'roche')
                                                       HIV-1 RNA PCR Roche &nbsp;

                                                    @endif

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Location ID: </td>
                                                <td >
                                                    {{$result->LocationID}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Viral Load Testing #: </td>
                                                <td>{{$result->SampleID}}</td>
                                            </tr>

                                            <tr>
                                                <td valign="top">Result of Viral Load: </td>
                                                <td>{{$result->VLResult}}</td>
                                            </tr>
                                        </table>        
                                        
                                    </div>
                                    <div class="col-xs-3">
                                               
                                        @if ($viralLoadProcessedResult == 'not detected')
                                            <img src="../img/backend/sample_result/smiley.smile.gif" height="150" width="150">
                                        @elseif ($viralLoadProcessedResult == 'detected')    
                                            <img src="../img/backend/sample_result/smiley.sad.gif" height="150" width="150">
                                        @else
                                            <img src="../img/backend/sample_result/smiley.sad.gif" height="150" width="150">
                                        @endif
                                    </div>
                                </div>                      
                            </div>


                            <div class="print-ttl">Recommendations</div>
                            <div class="print-sect">
                                Suggested Clinical Action based on National Guidelines:<br>
                                <div style="margin-left:10px">
                                    @if ($viralLoadProcessedResult == 'not detected')
                                        Below 1,000 copies/mL: Patient is suppressing their viral load. <br>
                                        Please continue adherence counseling. Do another viral load after 12 months.

                                    @elseif ($viralLoadProcessedResult == 'detected')    
                                           Above 1,000 copies/mL: patient has elevated viral load. <br>
                                           Please initiate adherence intensive counseling and conduct a repeat viral load test after six months.
                                    @else
                                        There is No Result Given. The Test Failed the Quality Control Criteria. We advise you send a new sample.

                                    @endif
                                </div>
                            </div>
    

                            <br>
                            <div class="row">
                                 
                                <div class="col-xs-2">
                                    Lab Technologist: 
                                </div>
                                <div class="col-xs-3">
                                    <img src="../img/backend/sample_result/signature.kushemererwa.grace.esther.gif" height="50" width="100">
                                    <hr>
                                </div>
                                
                                <div class="col-xs-2">
                                    Lab Manager: 
                                </div>
                                <div class="col-xs-3">
                                    <img src="../img/backend/sample_result/signature.isaac.ssewanyana.gif" height="50" width="100">
                                    <hr>
                                </div>
                                
                                <div class="col-xs-2">
                                    <div class="qrcode-output">
                                         
                                    
                                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">




                                    </div>
                                </div>
                                
                            </div>

                                    
                    </div>
                    
                  
                              
                </div><!--tab panel-->

                </div><!--panel body-->
        @endauth
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection