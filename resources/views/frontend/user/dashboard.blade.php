@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                @permission('view-facilities')
                <div class="panel-body">
                    
                        
                             
                                  
                                      <table id="hub_facilities_table" class="table table-hover table-condensed" width="100%">
                                        <thead>
                                                <tr>
                                                    <th class="col-md-3">id</th>
                                                    <th class="col-md-3">Facility</th>
                                                    <th class="col-md-3">District</th>
                                                    <th class="col-md-3">Contact Person</th>
                                                    <th class="col-md-3">Phone Number</th>
                                                    <th class="col-md-3">Email</th>
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                        
                                        <script type="text/javascript">
                                        $(document).ready(function() {

                                            oTable = $('#hub_facilities_table').dataTable({
                                                "processing": true,
                                                "serverSide": true,
                                                "ajax": "/hubs/data",
                                                "columnDefs": [
                                                                {
                                                                    "targets": [ 0 ],
                                                                    "visible": false,
                                                                    "searchable": false
                                                                }
                                                            ],
                                                "columns": [
                                                    {data: 'id', name: 'vl_facilities.id'},
                                                    {data: 'facility', name: 'vl_facilities.facility'},
                                                    {data: 'district', name: 'vl_districts.district'},
                                                    {data: 'contactPerson', name: 'vl_facilities.contactPerson'},
                                                    {data: 'phone', name: 'vl_facilities.phone'},
                                                    {data: 'email', name: 'vl_facilities.email'}
                                                ]
                                            });

                                            var table = $('#hub_facilities_table').DataTable();
                                            $('#hub_facilities_table').on( 'click', 'tbody tr', function () {
                                                    //window.location.href = 'facility/703';
                                                     var data = table.row( this ).data();
                                                    window.location.href = 'facility/'+data.id;
                                              } );
                                        });
                                        
                                        

                                        </script>
                                
                </div><!--tab panel-->

                </div><!--panel body-->
        @endauth
        @permission('view-patients_as_facility')
                <div class="panel-body">
                    
                        
                              <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Action Pane</a></li>
                                <li><a data-toggle="tab" href="#menu1">Not Suppressed</a></li>
                                <li><a data-toggle="tab" href="#menu2">Suppressed</a></li>
                                <li><a data-toggle="tab" href="#menu3">Rejected Samples</a></li>
                                <li><a data-toggle="tab" href="#menu3">Received Samples</a></li>
                              </ul>

                              <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                  
                                          <table class="table table-hover table-bordered dashboard-table">
                                            <tr>
                                               <th>Not Suppressed Patients</th>
                                               <th>Suppressed Patients</th>
                                               <th>Rejected Samples</th>
                                               <th>Samples Received</th>
                                            </tr>
                                            
                                            <tr>
                                               <td>12</td>
                                               <td>140</td>
                                               <td>72</td>
                                               <td>140</td>
                                            </tr>

                                            <tr>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                            </tr>
                                        </table>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                <table class="table table-hover table-bordered dashboard-table">
                                    <tr>
                                       <th>Patiend ID</th>
                                       <th>Facility</th>
                                       <th>ART#</th>
                                       <th>Date of Collection</th>

                                       <th>Date Arrived at CPHL</th>
                                       <th>Results</th>
                                       <th>Recommended Request Data</th>
                                       <th>Contact</th>

                                       <th>More Info</th>
                                       <th>Action</th>
                                       <th>Comments</th>
                                       
                                    </tr>
                                    <tr>
                                        <td>xdsv</td>
                                        <td>Kida HC III</td>
                                        <td>KH201504/001</td>
                                        <td>01/07/2015</td>

                                        <td>04/07/2015</td>
                                        <td>4324 Copies/mL</td>
                                        <td>01/04/2016</td>
                                        <td>0773987876</td>

                                        <td></td>
                                        <td>Called</td>
                                        <td>Coming next week</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>ydsv</td>
                                        <td>Kida HC III</td>
                                        <td>KH201505/003</td>
                                        <td>01/07/2015</td>

                                        <td>04/07/2015</td>
                                        <td>3092 Copies/mL</td>
                                        <td>01/04/2016</td>
                                        <td>0773987866</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                 </table>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    
                                    <table class="table table-hover table-bordered dashboard-table">
                                    <tr>
                                       <th>Patiend ID</th>
                                       <th>Facility</th>
                                       <th>ART#</th>
                                       <th>Date of Collection</th>

                                       <th>Date Arrived at CPHL</th>
                                       <th>Results</th>
                                       <th>Recommended Request Data</th>
                                       <th>Contact</th>

                                       <th>More Info</th>
                                       <th>Action</th>
                                       <th>Comments</th>
                                       
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                    
                                 </table>
                                 
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                  <table class="table table-hover table-bordered dashboard-table">
                                    <tr>
                                       <th>Patiend ID</th>
                                       <th>Facility</th>
                                       <th>ART#</th>
                                       <th>Date of Collection</th>

                                       <th>Date Arrived at CPHL</th>
                                       <th>Results</th>
                                       <th>Recommended Request Data</th>
                                       <th>Contact</th>

                                       <th>More Info</th>
                                       <th>Action</th>
                                       <th>Comments</th>
                                       
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                    
                                 </table>
                                 
                                </div>
                              </div>
                </div><!--tab panel-->

                </div><!--panel body-->
        @endauth
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection