@extends('layout.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Form SRS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/planning">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content col-12">
        <div class="col-12">             
                    <div class="row justify-content-center">
                        <div class="card-body col-12">
                            <div class="container" style="margin: 2%">
                                <div class="card col-10 mx-auto">
                                    <div class="card-body">
                                        {{-- -----input form SRS----- --}}
                                        <form action="{{ route('modul.store') }}" method="POST" id="modulForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="request_id" value="{{ $formRequest->id }}">
                                            <div class="container mb-3">
                                                <button type="button" class="btn btn-success" id="addNamaModul"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> Modul</i></button>
                                                <button type="button" class="btn btn-success" id="removeNamaModul"><i class="fas fa-solid fa-minus"></i></button>
                                            </div>
                                            <div class="container" id="tambah_modul">
                                                <!-- Modul elements will be dynamically added here -->
                                            </div>

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
                                                                            <textarea class="form-control" name="akses_user" id="floatingAkses" style="height: 65px" disabled>{{($formRequest->cra)->akses_user }}</textarea>
                                                                            <label class="p-1">
                                                                                Topology Server dan Integrasi
                                                                            </label>
                                                                            <textarea class="form-control" name="topologi_server" class="form-control m-input" id="floatingIntegrasi" value="{{old('topologi_server')}}" style="height: 65px" disabled>{{($formRequest->cra)->topologi_server }}</textarea>
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
                                                                            <textarea class="form-control" name="spesifikasi_server" class="form-control m-input" id="floatingSpesifikasi" value="{{old('spesifikasi_server')}}" style="height: 65px" disabled>{{($formRequest->cra)->spesifikasi_server }}</textarea>
                                                                            <label class="p-1">
                                                                                Software yang digunakan
                                                                            </label>
                                                                            <textarea class="form-control" name="software" class="form-control m-input" id="floatingSoftware" value="{{old('software')}}" style="height: 65px" disabled>{{($formRequest->cra)->software }}</textarea>
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
                                                                            <textarea class="form-control" name="tipe_data" class="form-control m-input" id="floatingTipe" value="{{old('tipe_data')}}" style="height: 65px" disabled>{{($formRequest->cra)->tipe_data }}</textarea>
                                                                            <label class="p-1">
                                                                                Komponen yang di backup
                                                                            </label>
                                                                            <textarea class="form-control" name="komponen_backup" class="form-control m-input" id="floatingKomponen" value="{{old('komponen_backup')}}" style="height: 65px" disabled>{{($formRequest->cra)->komponen_backup }}</textarea>
                                                                            <label class="p-1">
                                                                                Frekuensi backup
                                                                            </label>
                                                                            <textarea class="form-control" name="frekuensi_backup" class="form-control m-input" id="floatingFrekuensi" value="{{old('frekuensi_backup')}}" style="height: 65px" disabled>{{($formRequest->cra)->frekuensi_backup }}</textarea>
                                                                            <label class="p-1">
                                                                                Lama data backup disimpan
                                                                            </label>
                                                                            <textarea class="form-control" name="lama_backup" class="form-control m-input" id="floatingBackup" value="{{old('lama_backup')}}" style="height: 65px" disabled>{{($formRequest->cra)->lama_backup }}</textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center; vertical-align: middle; width: 24%;">
                                                                        <strong>Security</strong>
                                                                    </td>
                                                                    <td class="p-3">
                                                                        <textarea class="form-control" name="security" class="form-control m-input" id="floatingSecurity" value="{{old('security')}}" style="height: 65px;" disabled>{{($formRequest->cra)->security }}</textarea>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table> 

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" value="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let countermodul = 0;

    $(document).ready(function () {
        $('#addNamaModul').click(function () {
            countermodul++;
            let newInputan = `
                <div class="form-group mb-3" id="modul-${countermodul}">
                    <label for="nama_modul">Nama Modul ke- ${countermodul}</label>
                    <input type="text" class="form-control" name="modul[${countermodul}][nama_modul]" id="nama_modul-${countermodul}">
                    <div class="container mb-3">
                        <button type="button" class="btn btn-success addReqBtn" data-modul-id="${countermodul}"><i class="fas fa-solid fa-plus" style="color: #ffffff;"></i></button>
                        <button type="button" class="btn btn-success removeReqBtn" data-modul-id="${countermodul}"><i class="fas fa-solid fa-minus"></i></button>
                    </div>
                    <div class="form-group mb-3 row" style="margin-top: 10px;" id="tambah_req-${countermodul}">
                        <!-- Requirement elements will be dynamically added here -->
                    </div>
                </div>`;
            $('#tambah_modul').append(newInputan);
        });

        $('#removeNamaModul').click(function () {
            if (countermodul === 0) {
                alert("Minimal harus ada 1 nama_modul");
            } else {
                $('#modul-' + countermodul).remove();
                countermodul--;
            }
        });

        $(document).on('click', '.addReqBtn', function () {
            let modulId = $(this).data('modul-id');
            let counterReq = $('#tambah_req-' + modulId + ' textarea').length + 1;

            let newRequirement = `
            <div class="form-group mb-3 row" style="margin-top: 10px;">
                <label class="col-3" style="text-align:center; vertical-align: middle;">Requirement ke- ${counterReq}</label>
                <div class="col-9">
                    <textarea class="form-control" name="modul[${modulId}][requirements][${counterReq}][requirement]" id="message-text-${modulId}-${counterReq}" required></textarea>
                    <input type="file" name="modul[${modulId}][requirements][${counterReq}][mockup]" id="mockup-${modulId}-${counterReq}" aria-describedby="inputFileAddon" aria-label="Upload" required>
                </div>
            </div>`;


            $('#tambah_req-' + modulId).append(newRequirement);
        });

        $(document).on('click', '.removeReqBtn', function () {
            let modulId = $(this).data('modul-id');
            let counterReq = $('#tambah_req-' + modulId + ' textarea').length;

            if (counterReq === 1) {
                alert(`Minimal harus ada 1 requirement untuk Modul ke-${modulId}`);
            } else {
                $('#tambah_req-' + modulId + ' .form-group:last-child').remove();
            }
        });

        // Other JavaScript logic for form handling...

        document.getElementById('submitButton').addEventListener('click', function (e) {
          e.preventDefault();
          // Lakukan apa yang Anda inginkan saat tombol "Submit" ditekan
          // Ini bisa termasuk pengiriman data ke rute /insertdata atau rute yang sesuai dengan fetch API.
          fetch('/insertdata', {
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

    });
</script>

@endsection
