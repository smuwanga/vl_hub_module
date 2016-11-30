@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">Facility Patients</div>

        @permission('view-patients')
                <div class="panel-body">

                            
                                <div id="patients">

                                    <table id="hub_facilities_patients_table" class="table table-hover table-condensed">
                                        <thead>
                                                <tr>
                                                    <th class="col-md-3">Form Number</th>
                                                    <th class="col-md-3">ART Number</th>
                                                    <th class="col-md-3">Other ID</th>
                                                    <th class="col-md-3">Date of Collection</th>
                                                    <th class="col-md-3">Date Received at CPHL</th>
                                                    <th class="col-md-3">Testing Date</th>
                                                    <th class="col-md-3">Action</th>
                                                   
                                                </tr>
                                            </thead>
                                    </table>
                                    <script type="text/javascript">
                                        $(document).ready(function() {

                                            oTable = $('#hub_facilities_patients_table').dataTable({
                                                "processing": true,
                                                "serverSide": true,
                                                "ajax": "/facilityp/703",
                                                "columnDefs": [ {
                                                  "targets": 6,
                                                  "data": null,
                                                  "defaultContent": 
                                                     '<button class="btn-view" type="button">Print</button>'
                                                     + '<button class="btn-delete"  type="button">Download</button>'
                                                } ],
                                                "columns": [
                                                    {data: 'FormNumber', name: 'FormNumber'},
                                                    {data: 'PatientART', name: 'PatientART'},
                                                    {data: 'PatientOtherID', name: 'PatientOtherID'},
                                                    {data: 'DateofCollection', name: 'DateofCollection'},
                                                    {data: 'DateReceivedatCPHL', name: 'DateReceivedatCPHL'},
                                                    {data: 'DateTimeLatestResultsUploaded', name: 'DateTimeLatestResultsUploaded'}
                                                    

                                                ]
                                            });

                                            var table = $('#hub_facilities_patients_table').DataTable();
     
                                            $('#hub_facilities_patients_table tbody').on('click', 'tr', function () {
                                                var data = table.row( this ).data();
                                                //alert( 'You clicked on '+data.FormNumber+'\'s row' );
                                                window.location.href = '/patientView/'+data.FormNumber;
                                            } );
                                        });
              
                                         
    
                                 </script>
                                </div>
       
                              
                </div><!--tab panel-->

                </div><!--panel body-->
        @endauth
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection