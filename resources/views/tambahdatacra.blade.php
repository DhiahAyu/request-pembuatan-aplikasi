@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10">
        <div class="card p-3">
          <div class="card-body">   
      <tbody class="p-3">
        <tr>
            <td colspan="2">
                <div class="p-2" align="center"><strong>CHANGE REQUEST ANALYSIS</strong></div>
            </td>
        </tr>
        <form action="/insertdatacra" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="request_id" value="{{ $formRequest->id }}">
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
            <textarea class="form-control" name="cr_analyst" class="form-control" id="floatingCranalyst" placeholder="CR Analyst" value="{{old('cr_analyst')}}" style="height: 65px"></textarea></td>	
            @error('cr_analyst')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Originator Name</strong></td>
            <td width="76%">
            <textarea class="form-control" name="originator_name" class="form-control m-input" id="floatingOriginatorname" placeholder="Originator Name" value="{{old('originator_name')}}" style="height: 65px"></textarea></td>	
            @error('originator_name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Data Owner</strong></td>
            <td width="76%">	
            <textarea class="form-control" name="data_owner" class="form-control m-input" id="floatingDataowner" placeholder="Data Owner" value="{{old('data_owner')}}" style="height: 65px"></textarea></td>	
            @error('data_owner')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Date CRA Assigned </strong></td>
            <td width="76%">
            <textarea class="form-control"  name="date" class="form-control m-input" id="floatingDate" placeholder="Date" value="{{old('date')}}" style="height: 65px"></textarea></td>	
            @error('date')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%" ><strong class="p-3">Project Name</strong></td>
            <td width="76%" class="mb-3">
            <textarea class="form-control"   name="project_name" class="form-control m-input" id="floatingProjectname" placeholder="Project Name" value="{{old('project_name')}}" style="height: 65px"></textarea></td>	
            @error('project_name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
    </tbody>
</table>	
<table class="" width="100%" border="1">
    <tbody class="p-3">
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Impact Areas</strong></td>
            <td width="76%">
            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Cost: Change will result in an increase to project costs">  Cost: Change will result in an increase to project costs<br>
            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Scope: Change will result in an increase to project requirement">  Scope: Change will result in an increase to project requirement<br>
            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Schedule: Change will result in a change to the Master Project Schedule of IS Center">  Schedule: Change will result in a change to the Master Project Schedule of IS Center<br>
            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Risk: Change Request is required for minimizing the risk">  Risk: Change Request is required for minimizing the risk<br>
            @error('impact_areas')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Priority</strong></td>
            <td width="76%">
            <input type="checkbox" name="priority[]" id="floatingPriority" value="High: Impact of this change request on productivity is highly required, work stoppage will cause severe impact of business process. Solution needed immediately">  High: Impact of this change request on productivity is highly required, work stoppage will cause severe impact of business process. Solution needed immediately<br>
            <input type="checkbox" name="priority[]" id="floatingPriority" value="Medium: Impact of this change request on productivity is expected, business process still running well however solution is needed">  Medium: Impact of this change request on productivity is expected, business process still running well however solution is needed<br>
            <input type="checkbox" name="priority[]" id="floatingPriority" value="Low: Impact of this change request on Productivity is minimal.">  Low: Impact of this change request on Productivity is minimal.<br>
            @error('priority')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Justification of change for major development</strong></td>
            <td width="76%">	
            <textarea class="form-control"   name="justifcation_major" class="form-control m-input" id="floatingMajor" placeholder="Justification of change for major development" value="{{old('justifcation_major')}}" style="height: 65px"></textarea></td>	
        </td>
            @error('justifcation_major')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Justification of change for minor development</strong></td>
            <td width="76%">	
            <textarea class="form-control"  name="justifcation_minor" class="form-control m-input" id="floatingMinor" placeholder="Justification of change for minor development" value="{{old('justifcation_minor')}}" style="height: 65px"></textarea></td>	
        </td>
            @error('justifcation_minor')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
            <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">General Context for Data Integration</strong></td>
            <td width="76%">
            <textarea class="form-control"  name="general_context" class="form-control m-input" id="floatingMinor" placeholder="General Context for Data Integration" value="{{old('justifcation_minor')}}" style="height: 65px"></textarea></td>	
            @error('general_context')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
            <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Potential cost and extra time consideration?</strong></td>
            <td width="76%">	
            <textarea class="form-control" name="pontential_cost" id="floatingKondisi" placeholder="Potential cost and extra time consideration" value="{{old('pontential_cost')}}" style="height: 65px"></textarea></td>
            @error('pontential_cost')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Alternative Solutions Considered</strong></td>
            <td width="76%">
            <textarea class="form-control" name="alternative_solutions" class="form-control m-input" id="floatingAlternative" placeholder="Alternative Solutions Considered" value="{{old('alternative_solutions')}}"></textarea></td>	
            @error('alternative_solutions')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2 mb-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Support from other parties</strong></td>
            <td width="76%">
            <textarea class="form-control" name="support" class="form-control m-input" id="floatingSupport" placeholder="Support from other parties" value="{{old('support')}}" style="height: 65px"></textarea></td>	
            </td>
            @error('support')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2 mb-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Infrastructure and Security</strong></td>
            <td width="76%">
            <textarea class="form-control" name="infrastructure" class="form-control m-input" id="floatingInfrastructure" placeholder="Infrastructure" value="{{old('infrastructure')}}" style="height: 65px"></textarea></td>	
        </td>
            @error('infrastructure')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1">
        <tr class="p-2 mb-2">
            <td style="text-align: center;" width="24%"><strong class="p-3">Additional Information/Comments</strong></td>
            <td width="76%">	
            <textarea class="form-control" name="additional" class="form-control m-input" id="floatingAdditional" placeholder="Additional Information/Comments" value="{{old('additional')}}" style="height: 65px"></textarea></td>	
            </td>
            @error('additional')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </tr>
        <table class="" width="100%" border="1"> <br>
        </tbody>
    </table>
    <br>
        &nbsp;
        <div class="row">	
            <div class="col-xl-6 mb-4">
                <button type="submit" class="btn btn-info" name="actioncra" value="saveDraft" style="width: 100%">Save as draft</button>
            </div>
            <div class="col-xl-6 mb-4">
                <button type="submit" class="btn btn-success" name="actioncra" value="submit" style="width: 100%">Submit</button>
            </div>									
    </div>									
    </form>

      </div>
      </div>
      </div>
      </div>
    </div>

    
    <script>
      document.getElementById('submitButton').addEventListener('click', function (e) {
          e.preventDefault();
          // Lakukan apa yang Anda inginkan saat tombol "Submit" ditekan
          // Ini bisa termasuk pengiriman data ke rute /insertdata atau rute yang sesuai dengan fetch API.
          fetch('/insertdatacra', {
            method: 'POST',
            body: new FormData(document.querySelector('form')),
          })
          .then(response => {
            if (response.ok) {
              // Proses response jika berhasil, seperti menampilkan pesan sukses
              alert('Data berhasil disubmit');
            } else {
              // Proses response jika terjadi kesalahan
              alert('Terjadi kesalahan saat submit data');
            }
          });
      });
      document.getElementById('saveDraftButton').addEventListener('click', function (e) {
          e.preventDefault();
          // Lakukan apa yang Anda inginkan saat tombol "Save Draft" ditekan
          // Ini bisa termasuk pengiriman data ke rute yang berbeda atau menyimpan sebagai draft dengan JavaScript.
          // Contoh menggunakan fetch API:
          fetch('/saveasdraftcra', {
            method: 'POST',
            body: new FormData(document.querySelector('form')),
          })
          .then(response => {
            if (response.ok) {
              // Proses response jika berhasil, seperti menampilkan pesan sukses
              alert('Data disimpan sebagai draft');
            } else {
              // Proses response jika terjadi kesalahan
              alert('Terjadi kesalahan saat menyimpan sebagai draft');
            }
          });
      });
    </script>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</div>
@endsection
