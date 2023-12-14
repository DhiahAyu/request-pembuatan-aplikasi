<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://example.com/fontawesome/v6.5.1/js/all.js" data-auto-replace-svg="nest"></script>
    <script>
        function updateLiveDate() {
            var currentDate = moment().format('DD/MM/YYYY');
            // Select all elements with class 'live-date' and update their content
            document.querySelectorAll('.live-date').forEach(function (element) {
                element.innerHTML = currentDate;
            });
        }

        setInterval(updateLiveDate, 1000); // Update every second
    </script>
    <script>
        $(document).ready(function () {
            let counterRiwayat = 1; // Initialize counter to 1 since you already have one row

            $('#addriwayat').click(function () {
                counterRiwayat++;
                let newInputan = `
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="textVersi" placeholder="Versi" value="{{old('textVersi')}}" style="height: 65px;">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="textPembuat" placeholder="Nama Pembuat Dokumen" value="{{old('textPembuat')}}" style="height: 65px;">
                        </td>
                        <td>
                            <label class="live-date"></label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="textDisetujuioleh" placeholder="Nama yang Menyetujui" value="{{old('textDisetujuioleh')}}" style="height: 65px;">
                        </td>
                        <td>
                            <textarea class="form-control" id="textTanggalPersetujuan" placeholder="Masukkan Tanggal Persetujuan Dokumen" value="{{old('textTanggalPersetujuan')}}" style="height: 65px;"></textarea>
                        </td>
                        <td>
                            <textarea class="form-control" id="txareaKeterangan" placeholder="Masukkan Keterangan" value="{{old('txareaKeterangan')}}" style="height: 65px;"></textarea>
                        </td>
                    </tr>`;
                $('#tambah_riwayat').append(newInputan);
            });

            $('#removeriwayat').click(function () {
                if (counterRiwayat === 1) {
                    alert("At least you must have 1 justification major");
                } else {
                    $('#tambah_riwayat tr:last').remove(); // Remove the last row
                    counterRiwayat--;
                }
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function () {
            let counterUAT = 1; // Initialize counter to 1 since you already have one row

            $('#adduat').click(function () {
                counterUAT++;
                let newInputan = `
                <tr>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textNA" placeholder="Massukkan N.A" value="{{old('textNA')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        REQ-${counterUAT}
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textNamaModul" placeholder="Masukkan Nama Modul" value="{{old('textNamaModul')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textNamaSubModul" placeholder="Masukkan Tahapan Skenario" value="{{old('textNamaSubModul')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaSkenario" placeholder="Masukkan Tahapan Skenario" value="{{old('txareaSkenario')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaPass" placeholder="" value="{{old('txareaPass')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaFail" placeholder="" value="{{old('txareaFail')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaTester" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaTester" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                    </td>
                </tr>`;
                $('#tambah_uat').append(newInputan);
            });

            $('#removeuat').click(function () {
                if (counterUAT === 1) {
                    alert("At least you must have 1 justification major");
                } else {
                    $('#tambah_uat tr:last').remove(); // Remove the last row
                    counterUAT--;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            let counterUAL = 1; // Initialize counter to 1 since you already have one row

            $('#addual').click(function () {
                counterUAL++;
                let newInputan = `
                <tr>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textIdTestCase" placeholder="Masukkan ID Test Case" value="{{old('textIdTestCase')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        REQ-${counterUAL}
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textNamaSubModul" placeholder="Masukkan Tahapan Skenario" value="{{old('textNamaSubModul')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaSkenario" placeholder="Masukkan Tahapan Skenario" value="{{old('txareaSkenario')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaPass" placeholder="" value="{{old('txareaPass')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaFail" placeholder="" value="{{old('txareaFail')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaTester" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="txareaTester" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                    </td>
                </tr>`;
                $('#tambah_ual').append(newInputan);
            });

            $('#removeual').click(function () {
                if (counterUAL === 1) {
                    alert("At least you must have 1 justification major");
                } else {
                    $('#tambah_ual tr:last').remove(); // Remove the last row
                    counterUAL--;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            let counterCatatan = 1; // Initialize counter to 1 since you already have one row

            $('#addCatatan').click(function () {
                counterCatatan++;
                let newInputan = `
                <tr>
                    <td>
                        REQ-${counterCatatan}
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textCatatan" placeholder="Masukkan Nama Modul" value="{{old('textCatatan')}}" style="height: 65px;"></textarea>
                    </td>
                    <td>
                        <textarea class="form-control" class="form-control m-input" id="textUser" placeholder="Masukkan Tahapan Skenario" value="{{old('textUser')}}" style="height: 65px;"></textarea>
                    </td>
                </tr>`;
                $('#tambah_catatan').append(newInputan);
            });

            $('#removeCatatan').click(function () {
                if (counterCatatan === 1) {
                    alert("At least you must have 1 justification major");
                } else {
                    $('#tambah_catatan tr:last').remove(); // Remove the last row
                    counterCatatan--;
                }
            });
        });
    </script> --}}

    <body>
        <div class="content-wrapper" style="margin: 1%">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-13" style="margin-top: 45px">
                        <div class="card p-3">
                            <div class="card-body">
                                <form action="/insertdatauat" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $formrequest->request_id }}">
                                <div>
                                    <h1 style="vertical-align: middle; text-align:center; margin-bottom:40px"><strong>User Acceptance Test</strong></h1>
                                </div>
                                <div style="vertical-align: middle; text-align:center;">
                                    <h4>Riwayat Perubahan</h4>
                                    <div class="container mb-3" style="text-align: left">
                                        <button type="button" class="btn btn-success" id="addriwayat">
                                            <i class="fas fa-solid fa-plus" style="color: #ffffff;"></i>
                                        </button>
                                        <button type="button" class="btn btn-success" id="removeriwayat">
                                            <i class="fas fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                    <table class="table-bordered col-12" border="3">
                                        <thead>
                                            <tr>
                                                <th class="col-1">Versi</th>
                                                <th>Dibuat oleh</th>
                                                <th>Tanggal Revisi Dokumen</th>
                                                <th>Di Setujui Oleh</th>
                                                <th>Tanggal Persetujian</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tambah_riwayat">
                                            <tr>
                                                <td>
                                                    <input type="text" name="textVersi" class="form-control m-input" id="textVersi" placeholder="Versi" value="{{old('textVersi')}}" style="height: 65px;"></input>
                                                </td>
                                                <td>
                                                    <input type="text" name="textPembuat" class="form-control m-input" id="textPembuat" placeholder="Nama Pembuat Dokumen" value="{{old('textPembuat')}}" style="height: 65px;"></input>
                                                </td>
                                                <td>
                                                    <label class="live-date"></label>
                                                </td>
                                                <td>
                                                    <input type="text" name="textDisetujuioleh" class="form-control m-input" id="textDisetujuioleh" placeholder="Nama yang Menyetujui" value="{{old('textDisetujuioleh')}}" style="height: 65px;"></input>
                                                </td>
                                                <td>
                                                    <textarea name="textTanggalPersetujuan" class="form-control m-input"  id="textTanggalPersetujuan" placeholder="Masukkan Tanggal Persetujuan Dokumen" value="{{old('textTanggalPersetujuan')}}" style="height: 65px;"></textarea>
                                                </td>
                                                <td>
                                                    <textarea name="txareaKeterangan" class="form-control m-input" id="txareaKeterangan" placeholder="Masukkan Keterangan" value="{{old('txareaKeterangan')}}" style="height: 65px;"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                                        <h4>User Acceptance Test</h4>
                                        <table class="table-bordered" border="3">
                                            <thead style="vertical-align: middle; text-align:center;">
                                                <tr>
                                                    <th rowspan="2">N.A</th>
                                                    <th rowspan="2">ID Test Case</th>
                                                    <th rowspan="2">Nama Modul/Menu</th>
                                                    <th rowspan="2">Nama Sub Modul/Sub Menu</th>
                                                    <th rowspan="2">Tahapan Scenario</th>
                                                    <th colspan="2">Test Result</th>
                                                    <th rowspan="2">Tester</th>
                                                    <th rowspan="2">Signature</th>
                                                </tr>
                                                <tr>
                                                    <th>Pass</th>
                                                    <th>Fail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $id_TC =1;
                                                @endphp
                                                @foreach ($formrequest->moduls as $modul)
                                                @foreach ($modul->requirements as $requirement)
                                                    <tr>
                                                        <td>
                                                            <textarea class="form-control" name="textNA[]" id="textNA" placeholder="Masukkan N.A" style="height: 65px;"></textarea>
                                                        </td>
                                                        <td>
                                                            REQ-{{ $id_TC++ }}
                                                        </td>
                                                        <td>
                                                            {{ $modul->nama }}
                                                        </td>
                                                        <td>
                                                            {{ $requirement->requirement }}
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control m-input" name="txareaSkenario[]" id="txareaSkenario" placeholder="Masukkan Tahapan Skenario" value="{{old('txareaSkenario')}}" style="height: 65px;"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control m-input" name="txareaPass[]" id="txareaPass" placeholder="" value="{{old('txareaPass')}}" style="height: 65px;"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control m-input" name="txareaFail[]" id="txareaFail" placeholder="" value="{{old('txareaFail')}}" style="height: 65px;"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control m-input" name="txareaTester[]" id="txareaTester" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="file" name="customFileUAT[]" class="form-control-sm" id="customFileUAT" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                                    <h4>User Acceptance Lainnya</h4>
                                </div>
                                <table class="table-bordered" border="3">
                                    <thead style="vertical-align: middle; text-align:center;">
                                        <tr>
                                            <th rowspan="2">ID Test Case</th>
                                            <th rowspan="2">Nama Modul/Menu</th>
                                            <th rowspan="2">Nama Sub Modul/Sub Menu</th>
                                            <th rowspan="2">Tahapan Scenario</th>
                                            <th colspan="2">Test Result</th>
                                            <th rowspan="2">Tester</th>
                                            <th rowspan="2">Signature</th>
                                        </tr>
                                        <tr>
                                            <th>Pass</th>
                                            <th>Fail</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tambah_ual" style="vertical-align: middle; text-align:center;">
                                        @php
                                            $id_TC =1;
                                        @endphp
                                        @foreach ($formrequest->moduls as $modul)
                                        @foreach ($modul->requirements as $requirement)
                                            <tr>
                                                <td>
                                                    REQ-{{ $id_TC++ }}
                                                </td>
                                                <td>
                                                    {{ $modul->nama }}
                                                </td>
                                                <td>
                                                    {{ $requirement->requirement }}
                                                </td>
                                                <td>
                                                    <textarea name="txareaSkenarioUAL[]" class="form-control m-input" id="txareaSkenarioUAL" placeholder="Masukkan Tahapan Skenario" value="{{old('txareaSkenario')}}" style="height: 65px;"></textarea>
                                                </td>
                                                <td>
                                                    <textarea name="txareaPassUAL[]" class="form-control m-input" id="txareaPassUAL" placeholder="" value="{{old('txareaPass')}}" style="height: 65px;"></textarea>
                                                </td>
                                                <td>
                                                    <textarea name="txareaFailUAL[]" class="form-control m-input" id="txareaFailUAL" placeholder="" value="{{old('txareaFail')}}" style="height: 65px;"></textarea>
                                                </td>
                                                <td>
                                                    <textarea name="txareaTesterUAL[]" class="form-control m-input" id="txareaTesterUAL" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="file" name="customFileUAL[]" class="form-control-sm" id="customFileUAL" />
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                                    <h4>Catatan Testing</h4>
                                    <table class="table-bordered col-12" border="3">
                                        <thead>
                                            <tr>
                                                <th class="col-2">ID Test Case</th>
                                                <th>Catatan</th>
                                                <th>User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $id_TC =1;
                                            @endphp
                                            @foreach ($formrequest->moduls as $modul)
                                                @foreach ($modul->requirements as $requirement)
                                                <tr>
                                                    <td>
                                                        REQ-{{ $id_TC++ }}
                                                    </td>
                                                    <td>
                                                        <textarea name="textCatatan[]" class="form-control m-input" id="textCatatan" placeholder="Masukkan Nama Modul" value="{{old('textCatatan')}}" style="height: 65px;"></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="textUser[]" class="form-control m-input" id="textUser" placeholder="Masukkan Tahapan Skenario" value="{{old('textUser')}}" style="height: 65px;"></textarea>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                                    <h4>Ringkasan Jumlah Error</h4>
                                    <table class="table-bordered col-12" border="3">
                                        <thead>
                                            <tr>
                                                <th class="col-2">Jumlah Test Case</th>
                                                <th>Jumlah Test Case yang berhasil</th>
                                                <th>Jumlah Test Case yang ditemukan error/ bug</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="textJmlTest" class="form-control m-input" id="textJmlTest" placeholder="Masukkan Jumlah Test Case" value="{{old('textJmlTest')}}" style="height: 65px;"></input>
                                                </td>
                                                <td>
                                                    <input type="text" name="textTestBerhasil" class="form-control m-input" id="textTestBerhasil" placeholder="Masukkan Jumlah Test Case yang berhasil" value="{{old('textTestBerhasil')}}" style="height: 65px;"></input>
                                                </td>
                                                <td>
                                                    <input type="text" name="textTestError" class="form-control m-input" id="textTestError" placeholder="Masukkan Jumlah Test Case yang berhasil" value="{{old('textTestError')}}" style="height: 65px;"></input>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                                    <h4>Persetujuan Dokumen User Acceptance Test</h4>
                                    <table class="table-bordered col-12" border="3">
                                        <thead>
                                            <tr>
                                                <th class="col-2">Jabatan Projek</th>
                                                <th>Nama & Jabatan</th>
                                                <th>Tanda tangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Penanggung Jawab Proyek</th>
                                                <td style="padding: 10px">
                                                    <div class="form-floating mb-3">
                                                        <input type="teks" name="namaPenanggungJawab" class="form-control" id="namaPenanggungJawab" placeholder="Nama">
                                                        <label for="namaPenanggungJawab">Nama</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="teks" name="jabatanPenanggungJawab" class="form-control" id="jabatanPenanggungJawab" placeholder="Jabatan">
                                                        <label for="jabatanPenanggungJawab">Jabatan</label>
                                                    </div>
                                                </td>
                                                <td style="padding: 10px; text-align:left; vertical-align:text-top;">
                                                    <label id="example-label">Tanggal : <span class="live-date"></span></label>
                                                    <div>
                                                        <label class="form-label" for="customFilePJP">Masukkan Tanda Tangan</label>
                                                        <input name="customFilePJP" type="file" class="form-control" id="customFilePJP" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Ketua Tim Evaluasi</th>
                                                <td style="padding: 10px">
                                                    <div class="form-floating mb-3">
                                                        <input name="namaKetuaEvaluasi" type="teks" class="form-control" id="namaKetuaEvaluasi" placeholder="Nama">
                                                        <label for="namaKetuaEvaluasi">Nama</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="jabatanKetuaEvaluasi" type="teks" class="form-control" id="jabatanKetuaEvaluasi" placeholder="Jabatan">
                                                        <label for="jabatanKetuaEvaluasi">Jabatan</label>
                                                    </div>
                                                </td>
                                                <td style="padding: 10px; text-align:left; vertical-align:text-top;">
                                                    <label id="example-label">Tanggal : <span class="live-date"></span></label>
                                                    <div>
                                                        <label class="form-label" for="customFileKTE">Masukkan Tanda Tangan</label>
                                                        <input name="customFileKTE" type="file" class="form-control" id="customFileKTE" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sponsor Proyek</th>
                                                <td style="padding: 10px">
                                                    <div class="form-floating mb-3">
                                                        <input name="namaSP" type="teks" class="form-control" id="namaSP" placeholder="Nama">
                                                        <label for="namaSP">Nama</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="jabatanSP" type="teks" class="form-control" id="jabatanSP" placeholder="Jabatan">
                                                        <label for="jabatanSP">Jabatan</label>
                                                    </div>
                                                </td>
                                                <td style="padding: 10px; text-align:left; vertical-align:text-top;">
                                                    <label id="example-label">Tanggal : <span class="live-date"></span></label>
                                                    <div>
                                                        <label class="form-label" for="customFileSP">Masukkan Tanda Tangan</label>
                                                        <input name="customFileSP" type="file" class="form-control" id="customFileSP" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Bussiness Analyst</th>
                                                <td style="padding: 10px">
                                                    <div class="form-floating mb-3">
                                                        <input name="namaBA" type="teks" class="form-control" id="namaBA" placeholder="Nama">
                                                        <label for="namaBA">Nama</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="jabatanBA" type="teks" class="form-control" id="jabatanBA" placeholder="Jabatan">
                                                        <label for="jabatanBA">Jabatan</label>
                                                    </div>
                                                </td>
                                                <td style="padding: 10px; text-align:left; vertical-align:text-top;">
                                                    <label id="example-label">Tanggal : <span class="live-date"></span></label>
                                                    <div>
                                                        <label class="form-label" for="customFileBA">Masukkan Tanda Tangan</label>
                                                        <input name="customFileBA" type="file" class="form-control" id="customFileBA" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="text-align: center;">
                                    <div style="display: inline-block; text-align: center; vertical-align: middle;">
                                        <h4>Anggota Tim Proyek</h4>
                                        <table class="table-bordered" border="3">
                                            <thead>
                                                <tr>
                                                    <th class="col-4">Jabatan Proyek</th>
                                                    <th>Jumlah Test Case yang berhasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Project Controller</th>
                                                    <td style="padding: 10px">
                                                        <div class="form-floating mb-3">
                                                            <input name="namaPC" type="teks" class="form-control" id="namaPC" placeholder="Nama">
                                                            <label for="namaPC">Nama</label>
                                                        </div>
                                                        <div class="form-floating">
                                                            <input name="jabatanPC" type="teks" class="form-control" id="jabatanPC" placeholder="Jabatan">
                                                            <label for="jabatanPC">Jabatan</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Programmer dan atau Software Developer</th>
                                                    <td style="padding: 10px">
                                                        <div class="form-floating mb-3">
                                                            <input name="namaProgrammer" type="teks" class="form-control" id="namaProgrammer" placeholder="Nama">
                                                            <label for="namaProgrammer">Nama</label>
                                                        </div>
                                                        <div class="form-floating">
                                                            <input name="jabatanProgrammer" type="teks" class="form-control" id="jabatanProgrammer" placeholder="Jabatan">
                                                            <label for="jabatanProgrammer">Jabatan</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tester</th>
                                                    <td style="padding: 10px">
                                                        <div class="form-floating mb-3">
                                                            <input name="namaTester" type="teks" class="form-control" id="namaTester" placeholder="Nama">
                                                            <label for="namaTester">Nama</label>
                                                        </div>
                                                        <div class="form-floating">
                                                            <input name="jabatanTester" type="teks" class="form-control" id="jabatanTester" placeholder="Jabatan">
                                                            <label for="jabatanTester">Jabatan</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div style="width: 100%; height: 100%; margin-top:15px;">
                                    <button type="submit" class="btn btn-success" value="submit" style="width: 100%; height: 100%;">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>