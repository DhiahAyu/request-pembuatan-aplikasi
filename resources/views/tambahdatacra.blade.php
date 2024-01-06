@extends('layout.admin')

@section('content')

<div class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="card-body">  
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="p-2" align="center">
                                        <strong>CHANGE REQUEST ANALYSIS</strong>
                                    </div>
                                </td>
                            </tr>
                            <form action="/insertdatacra" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="request_id" value="{{ $formRequest->id }}">
                            <tr>
                                <td colspan="2">
                                    <div class="p-2" align="center">
                                        <strong>[CR.XXX]</strong> - [CHANGE REQUEST NAME]
                                    </div>
                                </td>
                            </tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="p-2">
                                        <td style="text-align: center; vertical-align: middle;" width="24%">
                                            <strong>CR Analyst (CRA)</strong>
                                        </td>                                            
                                        <td width="76%">	
                                            <textarea class="form-control" name="cr_analyst" class="form-control" id="floatingCranalyst" placeholder="CR Analyst" value="{{old('cr_analyst')}}" style="height: 65px"></textarea>
                                        </td>	
                                        @error('cr_analyst')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Originator Name</strong>
                                        </td>
                                        <td width="76%">
                                            <textarea class="form-control" name="originator_name" class="form-control m-input" id="floatingOriginatorname" placeholder="Originator Name" value="{{old('originator_name')}}" style="height: 65px" ></textarea>
                                        </td>	
                                        @error('originator_name')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Data Owner</strong>
                                        </td>
                                        <td width="76%">	
                                            <textarea class="form-control" name="data_owner" class="form-control m-input" id="floatingDataowner" placeholder="Data Owner" value="{{old('data_owner')}}" style="height: 65px" disabled>{{$formRequest->sponsor_proyek}}</textarea>
                                        </td>	
                                        @error('data_owner')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Date CRA Assigned </strong>
                                        </td>
                                        <td width="76%">
                                            <textarea class="form-control"  name="date" class="form-control m-input" id="floatingDate" placeholder="Date" value="{{old('date')}}" style="height: 65px"></textarea>
                                        </td>	
                                        @error('date')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%" >
                                            <strong>Project Name</strong>
                                        </td>
                                        <td width="76%" class="mb-3">
                                            <textarea class="form-control" name="project_name" class="form-control m-input" id="floatingProjectname" placeholder="Project Name" value="{{old('project_name')}}" style="height: 65px" disabled>{{$formRequest->nama_aplikasi}}</textarea>
                                        </td>	
                                        @error('project_name')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Impact Areas</strong>
                                        </td>
                                        <td width="76%">
                                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Cost: Change will result in an increase to project costs">  Cost: Change will result in an increase to project costs<br>
                                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Scope: Change will result in an increase to project requirement">  Scope: Change will result in an increase to project requirement<br>
                                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Schedule: Change will result in a change to the Master Project Schedule of IS Center">  Schedule: Change will result in a change to the Master Project Schedule of IS Center<br>
                                            <input type="checkbox" name="impact_areas[]" id="floatingImpactAreas" value="Risk: Change Request is required for minimizing the risk">  Risk: Change Request is required for minimizing the risk<br>
                                        </td>
                                        @error('impact_areas')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Priority</strong>
                                        </td>
                                        <td width="76%">
                                            <input type="checkbox" name="priority[]" id="floatingPriority" value="High: Impact of this change request on productivity is highly required, work stoppage will cause severe impact of business process. Solution needed immediately">  High: Impact of this change request on productivity is highly required, work stoppage will cause severe impact of business process. Solution needed immediately<br>
                                            <input type="checkbox" name="priority[]" id="floatingPriority" value="Medium: Impact of this change request on productivity is expected, business process still running well however solution is needed">  Medium: Impact of this change request on productivity is expected, business process still running well however solution is needed<br>
                                            <input type="checkbox" name="priority[]" id="floatingPriority" value="Low: Impact of this change request on Productivity is minimal.">  Low: Impact of this change request on Productivity is minimal.<br>
                                        </td>
                                        @error('priority')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
                            <!-- ======Justification Major===== -->
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <tbody>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Justification of change for major development</strong>
                                        </td>
                                        <td width="76%">	
                                            <div class="container mb-3">
                                                <button type="button" class="btn btn-primary" id="addmajor">
                                                    <i class="fas fa-solid fa-plus" style="color: #ffffff;"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary" id="removemajor">
                                                    <i class="fas fa-solid fa-minus"></i>
                                                </button>
                                            </div>
                                            <div class="container" id="tambah_major">
                                                <div class="form-group mb-3">
                                                    <label for="justifcation_major">Justification Major ke-1</label>
                                                    <textarea class="form-control" name="justification_major[]" id="justification_major-${countermajor}" placeholder="Justification of change for major development" style="height: 65px"></textarea>
                                                </div>
                                            </div>
                                        </td>	
                                    </td>
                                        @error('justifcation_major')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
                            <!-- ======Justification Minor===== -->
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <tbody>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Justification of change for minor development</strong>
                                        </td>
                                        <td width="76%">	
                                            <div class="container mb-3">
                                                <button type="button" class="btn btn-primary" id="addminor">
                                                    <i class="fas fa-solid fa-plus" style="color: #ffffff;"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary" id="removeminor">
                                                    <i class="fas fa-solid fa-minus"></i>
                                                </button>
                                            </div>
                                            <div class="container" id="tambah_minor">
                                                <div class="form-group mb-3">
                                                    <label for="justifcation_minor">Justification Minor ke-1</label>
                                                    <textarea class="form-control" name="justification_minor[]" id="justification_minor-${counterminor}" placeholder="Justification of change for minor development" style="height: 65px"></textarea>
                                                </div>
                                            </div>	
                                        </td>
                                        @error('justifcation_minor')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
            
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <tbody>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>General Context for Data Integration</strong>
                                        </td>
                                        <td width="76%">
                                            <textarea class="form-control"  name="general_context" class="form-control m-input" id="floatingMinor" placeholder="General Context for Data Integration" value="{{old('justifcation_minor')}}" style="height: 65px"></textarea>
                                        </td>	
                                        @error('general_context')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
            
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <tbody>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Potential cost and extra time consideration</strong>
                                        </td>
                                        <td width="76%">	
                                            <textarea class="form-control" name="pontential_cost" id="floatingKondisi" placeholder="Potential cost and extra time consideration" value="{{old('pontential_cost')}}" style="height: 65px"></textarea>
                                        </td>
                                        @error('pontential_cost')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <tbody>
                                    <tr class="p-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Alternative Solutions Considered</strong>
                                        </td>
                                        <td width="76%">
                                            <textarea class="form-control" name="alternative_solutions" class="form-control m-input" id="floatingAlternative" placeholder="Alternative Solutions Considered" value="{{old('alternative_solutions')}}"></textarea>
                                        </td>	
                                        @error('alternative_solutions')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
            
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <tbody>
                                    <tr class="p-2 mb-2">
                                        <td style="text-align: center;vertical-align: middle;" width="24%">
                                            <strong>Support from other parties</strong>
                                        </td>
                                        <td width="76%">
                                            <textarea class="form-control" name="support" class="form-control m-input" id="floatingSupport" placeholder="Support from other parties" value="{{old('support')}}" style="height: 65px"></textarea>
                                        </td>
                                        @error('support')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </tr>
                                </tbody>
                            </table>
            
                            <table class="table table-bordered" style="margin-top: 1em;">
                                <thead class="bg-blue">
                                    <tr style="text-align: center;">
                                        <th colspan="2">
                                            <strong>Infrastruktur dan Security</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; width: 24%;">
                                            <strong>Design Topology</strong>
                                        </td>
                                        <td width="76%">
                                            <div class="p-2">
                                                <label class="p-1">
                                                    Akses User
                                                </label>
                                                <textarea class="form-control" name="akses_user" class="form-control m-input" id="floatingAkses" value="{{old('akses_user')}}" style="height: 65px"></textarea>
                                                <label class="p-1">
                                                    Topology Server dan Integrasi
                                                </label>
                                                <textarea class="form-control" name="topologi_server" class="form-control m-input" id="floatingIntegrasi" value="{{old('topologi_server')}}" style="height: 65px"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; width: 24%;">
                                            <strong>Spesifikasi</strong>
                                        </td>
                                        <td width="76%">
                                            <div class="p-2">
                                                <label class="p-1">
                                                    Spesifikasi Server
                                                </label>
                                                <textarea class="form-control" name="spesifikasi_server" class="form-control m-input" id="floatingSpesifikasi" value="{{old('spesifikasi_server')}}" style="height: 65px"></textarea>
                                                <label class="p-1">
                                                    Software yang digunakan
                                                </label>
                                                <textarea class="form-control" name="software" class="form-control m-input" id="floatingSoftware" value="{{old('software')}}" style="height: 65px"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; width: 24%;">
                                            <strong>Penyimpanan Data dan Backup</strong>
                                        </td>
                                        <td width="76%">
                                            <div class="p-2">
                                                <label class="p-1">
                                                    Tipe data yang digunakan
                                                </label>
                                                <textarea class="form-control" name="tipe_data" class="form-control m-input" id="floatingTipe" value="{{old('tipe_data')}}" style="height: 65px"></textarea>
                                                <label class="p-1">
                                                    Komponen yang di backup
                                                </label>
                                                <textarea class="form-control" name="komponen_backup" class="form-control m-input" id="floatingKomponen" value="{{old('komponen_backup')}}" style="height: 65px"></textarea>
                                                <label class="p-1">
                                                    Frekuensi backup
                                                </label>
                                                <textarea class="form-control" name="frekuensi_backup" class="form-control m-input" id="floatingFrekuensi" value="{{old('frekuensi_backup')}}" style="height: 65px"></textarea>
                                                <label class="p-1">
                                                    Lama data backup disimpan
                                                </label>
                                                <textarea class="form-control" name="lama_backup" class="form-control m-input" id="floatingBackup" value="{{old('lama_backup')}}" style="height: 65px"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; width: 24%;">
                                            <strong>Security</strong>
                                        </td>
                                        <td class="p-3">
                                            <textarea class="form-control" name="security" class="form-control m-input" id="floatingSecurity" value="{{old('security')}}" style="height: 65px;"></textarea>
                                        </td>
                                    </tr>
                                    {{-- <input type="hidden" name="kirimke" id="kirimke" value=""> --}}
                                </tbody>
                            </table> 
                                <!-- Modal -->
                            <div class="modal fade" data-bs-backdrop="static" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Pilih Tujuan</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
            
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <label for="destination">Pilih Tujuan:</label>
                                            <select id="destination" name="kirimke" class="form-control">
                                                <option value="planning">Planning</option>
                                                <option value="digiport">Digiport</option>
                                            </select>
                                        </div>
            
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="actioncra" value="submit" id="modalSubmitButton">Kirim</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                &nbsp;
                                <div class="mb-3">
                                    <label for="destination">Kirim CRA ke:</label>
                                    {{-- <select id="destination" name="kirimke" class="form-control">
                                        <option value="planning">Planning</option>
                                        <option value="digiport">Digiport</option>
                                    </select> --}}
                                    <select id="destination" name="kirimke" class="form-control" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <label for="destination">Kirim CRA ke:</label>
                                        <option selected>Select this menu</option>
                                        <option value="planning">Planning</option>
                                        <option value="digiport">Digiport</option>
                                      </select>
                                </div>
                                <div class="row mt-5">   
                                    <div class="col-xl-6 mb-4">
                                        <button type="submit" class="btn btn-info" name="actioncra" value="saveDraft" style="width: 100%">Save as draft</button>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <button type="submit" class="btn btn-success" name="actioncra" value="submit" style="width: 100%">Submit</button>
                                    </div>     
                                    <div class="modal-dialog modal-fullscreen-sm-down">
                                    </div>                             
                                </div>                                      
                            </tbody>
                        </div>
                    </div>
                </div> 
        </div>
    </div>
</div>
    <style>
        .tbl-container {
        width: 400px;
        margin-top: 10px;
        margin-left: 10px;
        }
        .bdr {
        border-radius: 6px;
        overflow: hidden;
        }
        .bg-blue {
        background-color: #2495bd;
        color: white;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Script untuk Justification Major dan Justification Minor -->
    <script>
        let countermajor = 1;
        let counterminor = 1;

        $(document).ready(function () {
            $('#addmajor').click(function () {
                countermajor++;
                let newInputan = `
                    <div class="form-group mb-3">
                        <label for="justifcation_major">Justification Major ke-${countermajor}</label>
                        <textarea class="form-control" name="justification_major[]" id="justification_major-${countermajor}" placeholder="Justification of change for major development" style="height: 65px"></textarea>
                    </div>`;
                $('#tambah_major').append(newInputan);
            });

            $('#removemajor').click(function () {
                if (countermajor === 1) {
                    alert("At least you must have 1 justification major");
                } else {
                    $('#justification_major-' + countermajor).closest('.form-group').remove();
                    countermajor--;
                }
            });

            $('#addminor').click(function () {
                counterminor++;
                let newInputan = `
                    <div class="form-group mb-3">
                        <label for="justifcation_minor">Justification Minor ke-${counterminor}</label>
                        <textarea class="form-control" name="justification_minor[]" id="justification_minor-${counterminor}" placeholder="Justification of change for minor development" style="height: 65px"></textarea>
                    </div>`;
                $('#tambah_minor').append(newInputan);
            });

            $('#removeminor').click(function () {
                if (counterminor === 1) {
                    alert("At least you must have 1 justification minor");
                } else {
                    $('#justification_minor-' + counterminor).closest('.form-group').remove();
                    counterminor--;
                }
            });
        });
    </script>

    <script>

      document.getElementById('modalSubmitButton').addEventListener('click', function (e) {
          e.preventDefault();
        //   Lakukan apa yang Anda inginkan saat tombol "Submit" ditekan
        //   Ini bisa termasuk pengiriman data ke rute /insertdata atau rute yang sesuai dengan fetch API.
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
@endsection