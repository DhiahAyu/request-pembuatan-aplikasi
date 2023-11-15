<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Change Request Analysis</title>
  </head>
  <body style="background: #454D55;color: rgb(227, 227, 227);">
    <div class="content-wrapper" style="margin: 1%">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-10">
                <div class="card p-3" style="background: #343A40;color: rgb(227, 227, 227);">
                    <div class="card-body">   
                <tbody class="p-3">
                    <tr>
                        <td colspan="2">
                            <div class="p-2" align="center"><h1><strong>CHANGE REQUEST ANALYSIS</strong></h1></div>
                        </td>
                    </tr>
                    <form>
                        @csrf
                    <tr>
                        <td colspan="2">
                            <div class="p-2" align="center"><strong>[CR.XXX]</strong> - [CHANGE REQUEST NAME]</div>
                        </td>
                    </tr>
                    <br>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">CR Analyst (CRA)</strong></td>
                        <td width="76%">	
                        <textarea class="form-control" name="cr_analyst" class="form-control" id="floatingCranalyst" placeholder="CR Analyst" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->cr_analyst}}</textarea></td>	
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Originator Name</strong></td>
                        <td width="76%">
                        <textarea class="form-control" name="originator_name" class="form-control m-input" id="floatingOriginatorname" placeholder="Originator Name" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->originator_name}}</textarea></td>	
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Data Owner</strong></td>
                        <td width="76%">	
                        <textarea class="form-control" name="data_owner" class="form-control m-input" id="floatingDataowner" placeholder="Data Owner" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->data_owner}}</textarea></td>	
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Date CRA Assigned </strong></td>
                        <td width="76%">
                        <textarea class="form-control"  name="date" class="form-control m-input" id="floatingDate" placeholder="Date" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{ date('d/m/Y', strtotime($data->created_at)) }}</textarea></td>	
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%" ><strong class="p-3">Project Name</strong></td>
                        <td width="76%" class="mb-3">
                        <textarea class="form-control"   name="project_name" class="form-control m-input" id="floatingProjectname" placeholder="Project Name" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->project_name}}</textarea></td>	
                    </tr>
                </tbody>
            </table>	
            <table class="" width="100%" border="1">
                <tbody class="p-3">
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Impact Areas</strong></td>
                        <td width="76%">
                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreasCost" value="Cost: Change will result in an increase to project costs" {{ in_array('Cost: Change will result in an increase to project costs', $selectedImpactAreas) ? 'checked' : '' }} disabled> Cost: Change will result in an increase to project costs<br>
                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreasScope" value="Scope: Change will result in an increase to project requirement" {{ in_array('Scope: Change will result in an increase to project requirement', $selectedImpactAreas) ? 'checked' : '' }} disabled>  Scope: Change will result in an increase to project requirement<br>
                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreasSchedule" value="Schedule: Change will result in a change to the Master Project Schedule of IS Center"{{ in_array('Schedule: Change will result in a change to the Master Project Schedule of IS Center', $selectedImpactAreas) ? 'checked' : '' }} disabled>  Schedule: Change will result in a change to the Master Project Schedule of IS Center<br>
                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreasRisk" value="Risk: Change Request is required for minimizing the risk"{{ in_array('Risk: Change Request is required for minimizing the risk', $selectedImpactAreas) ? 'checked' : '' }} disabled>  Risk: Change Request is required for minimizing the risk<br>
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Priority</strong></td>
                        <td width="76%">
                            <input type="checkbox" name="priority[]" id="floatingPriorityHigh" value="High: Impact of this change request on productivity is highly required work stoppage will cause severe impact of business process. Solution needed immediately" {{ in_array('High: Impact of this change request on productivity is highly required, work stoppage will cause severe impact of business process. Solution needed immediately', $selectedPriority) ? 'checked' : '' }} disabled> High: Impact of this change request on productivity is highly required, work stoppage will cause severe impact of business process. Solution needed immediately<br>

                            <input type="checkbox" name="priority[]" id="floatingPriorityMedium" value="Medium: Impact of this change request on productivity is expected business process still running well however solution is needed" {{ in_array('Medium: Impact of this change request on productivity is expected, business process still running well however solution is needed', $selectedPriority) ? 'checked' : '' }} disabled>  Medium: Impact of this change request on productivity is expected, business process still running well however solution is needed<br>
                            
                            <input type="checkbox" name="priority[]" id="floatingPriorityLow" value="Low: Impact of this change request on Productivity is minimal." {{ in_array('Low: Impact of this change request on Productivity is minimal.', $selectedPriority) ? 'checked' : '' }} disabled>  Low: Impact of this change request on Productivity is minimal.<br> 
                        </td>                           
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Justification of change for major development</strong></td>
                        <td width="76%">	
                        <textarea class="form-control"   name="justifcation_major" class="form-control m-input" id="floatingMajor" placeholder="Justification of change for major development" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->justifcation_major}}</textarea></td>	
                    </td>
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Justification of change for minor development</strong></td>
                        <td width="76%">	
                        <textarea class="form-control"  name="justifcation_minor" class="form-control m-input" id="floatingMinor" placeholder="Justification of change for minor development" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->justifcation_minor}}</textarea></td>	
                    </td>
                    </tr>
                    <table class="" width="100%" border="1">
                        <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">General Context for Data Integration</strong></td>
                        <td width="76%">
                        <textarea class="form-control"  name="general_context" class="form-control m-input" id="floatingMinor" placeholder="General Context for Data Integration" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->general_context}}</textarea></td>	
                    </tr>
                    <table class="" width="100%" border="1">
                        <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Potential cost and extra time consideration?</strong></td>
                        <td width="76%">	
                        <textarea class="form-control" name="pontential_cost" id="floatingKondisi" placeholder="Potential cost and extra time consideration" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->pontential_cost}}</textarea></td>
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Alternative Solutions Considered</strong></td>
                        <td width="76%">
                        <textarea class="form-control" name="alternative_solutions" class="form-control m-input" id="floatingAlternative" placeholder="Alternative Solutions Considered" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->alternative_solutions}}</textarea></td>	
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2 mb-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Support from other parties</strong></td>
                        <td width="76%">
                        <textarea class="form-control" name="support" class="form-control m-input" id="floatingSupport" placeholder="Support from other parties" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->support}}</textarea></td>	
                        </td>
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2 mb-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Infrastructure and Security</strong></td>
                        <td width="76%">
                        <textarea class="form-control" name="infrastructure" class="form-control m-input" id="floatingInfrastructure" placeholder="Infrastructure" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->infrastructure}}</textarea></td>	
                    </td>
                    </tr>
                    <table class="" width="100%" border="1">
                    <tr class="p-2 mb-2">
                        <td style="text-align: center;" width="24%"><strong class="p-3">Additional Information/Comments</strong></td>
                        <td width="76%">	
                        <textarea class="form-control" name="additional" class="form-control m-input" id="floatingAdditional" placeholder="Additional Information/Comments" style="height: 65px;background: #343A40;color: rgb(227, 227, 227);" value='' readonly>{{$data->additional}}</textarea></td>	
                        </td>
                    </tr>
                    <table class="" width="100%" border="1"> <br>
                    </tbody>
                </table>
                <br>									
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>