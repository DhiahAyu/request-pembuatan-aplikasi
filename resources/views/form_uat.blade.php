@extends('layout.admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        function updateLiveDate() {
            var currentDate = moment().format('DD/MM/YYYY');
            // Select all elements with class 'live-date' and update their content
            document.querySelectorAll('.live-date').forEach(function (element) {
                element.innerHTML = currentDate;
            });
        }
        setInterval(updateLiveDate, 1000); // Update every second
        updateLiveDate();
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
    <div class="card-body">
        <div class="row justify-content-center">
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
                    <table class="table table-bordered col-12">
                        <thead class="thead-light">
                            <tr>
                                <th style="vertical-align: middle;">Versi</th>
                                <th style="vertical-align: middle;">Dibuat oleh</th>
                                <th style="vertical-align: middle;">Tanggal Revisi Dokumen</th>
                                <th style="vertical-align: middle;">Di Setujui Oleh</th>
                                <th style="vertical-align: middle;">Tanggal Persetujian</th>
                                <th style="vertical-align: middle;">Keterangan</th>
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
                                <td style="vertical-align: middle;">
                                    <input type="date" name="tanggal_revisi" class="form-control m-input" id="textDisetujuioleh" placeholder="Nama yang Menyetujui" value="{{old('')}}" style="height: 65px;"></input>
                                </td>
                                <td>
                                    <input type="text" name="textDisetujuioleh" class="form-control m-input" id="textDisetujuioleh" placeholder="Nama yang Menyetujui" value="{{old('')}}" style="height: 65px;"></input>
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="tanggal_persetujuan" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('')}}" style="height: 65px">
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
                        <table class="table table-bordered col-12">
                            <thead class="thead-light" style="vertical-align: middle; text-align:center;">
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;">N.A</th>
                                    <th rowspan="2" style="vertical-align: middle;">ID Test Case</th>
                                    <th rowspan="2" style="vertical-align: middle;">Nama Modul/Menu</th>
                                    <th rowspan="2" style="vertical-align: middle;">Nama Sub Modul/Sub Menu</th>
                                    <th rowspan="2" style="vertical-align: middle;">Tahapan Scenario</th>
                                    <th colspan="2" style="vertical-align: middle;">Test Result</th>
                                    <th rowspan="2" style="vertical-align: middle;">Tester</th>
                                    <th rowspan="2" style="vertical-align: middle;">Signature</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;">Pass</th>
                                    <th style="vertical-align: middle;">Fail</th>
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
                                            <input type="text" class="form-control" name="textNA[]" id="textNA" placeholder="Masukkan N.A" style="height: 65px;"></input>
                                        </td>
                                        <td>
                                            REQ-{{ $id_TC }}
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
                                            <input type="checkbox" name="testresult[]" id="pass[]" value="Pass" style="height: 65px">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="testresult[]" id="fail[]" value="Fail" style="height: 65px"> 
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
                                    @php
                                    $id_TC++;
                                    @endphp
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                    <h4>User Acceptance Lainnya</h4>
                </div>
                <table class="table table-bordered col-12">
                    <thead class="thead-light" style="vertical-align: middle; text-align:center;">
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">ID Test Case</th>
                            <th rowspan="2" style="vertical-align: middle;">Nama Modul/Menu</th>
                            <th rowspan="2" style="vertical-align: middle;">Nama Sub Modul/Sub Menu</th>
                            <th rowspan="2" style="vertical-align: middle;">Tahapan Scenario</th>
                            <th colspan="2" style="vertical-align: middle;">Test Result</th>
                            <th rowspan="2" style="vertical-align: middle;">Tester</th>
                            <th rowspan="2" style="vertical-align: middle;">Signature</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle;">Pass</th>
                            <th style="vertical-align: middle;">Fail</th>
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
                                    REQ-{{ $id_TC }}
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
                                    <input type="checkbox" name="testresultUAL[]" id="passUAL[]" value="Pass" style="height: 65px">
                                </td>
                                <td>
                                    <input type="checkbox" name="testresultUAL[]" id="failUAL[]" value="Fail" style="height: 65px"> 
                                </td>
                                {{-- <td>
                                    <textarea name="txareaPassUAL[]" class="form-control m-input" id="txareaPassUAL" placeholder="" value="{{old('txareaPass')}}" style="height: 65px;"></textarea>
                                </td>
                                <td>
                                    <textarea name="txareaFailUAL[]" class="form-control m-input" id="txareaFailUAL" placeholder="" value="{{old('txareaFail')}}" style="height: 65px;"></textarea>
                                </td> --}}
                                <td>
                                    <textarea name="txareaTesterUAL[]" class="form-control m-input" id="txareaTesterUAL" placeholder="" value="{{old('txareaTester')}}" style="height: 65px;"></textarea>
                                </td>
                                <td>
                                    <div>
                                        <input type="file" name="customFileUAL[]" class="form-control-sm" id="customFileUAL" />
                                    </div>
                                </td>
                            </tr>
                            @php
                            $id_TC++;
                            @endphp
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div style="vertical-align: middle; text-align:center; margin-top:20px;">
                    <h4>Catatan Testing</h4>
                    <table class="table table-bordered col-12">
                        <thead class="thead-light">
                            <tr>
                                <th class="col-2" style="vertical-align: middle;">ID Test Case</th>
                                <th style="vertical-align: middle;">Catatan</th>
                                <th style="vertical-align: middle;">User</th>
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
                    <table class="table table-bordered col-12">
                        <thead class="thead-light">
                            <tr>
                                <th class="col-2" style="vertical-align: middle;">Jumlah Test Case</th>
                                <th style="vertical-align: middle;">Jumlah Test Case yang berhasil</th>
                                <th style="vertical-align: middle;">Jumlah Test Case yang ditemukan error/ bug</th>
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
                    <table class="table table-bordered col-12">
                        <thead class="thead-light">
                            <tr>
                                <th class="col-2" style="vertical-align: middle;">Jabatan Projek</th>
                                <th style="vertical-align: middle;">Nama & Jabatan</th>
                                <th style="vertical-align: middle;">Tanda tangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="vertical-align: middle;">Penanggung Jawab Proyek</th>
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
                                    <label id="example-label">Tanggal : <input type="date" class="form-control"  name="tanggalttdpjp" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px">                                    </span></label>
                                    <div>
                                        <label class="form-label" for="customFilePJP">Masukkan Tanda Tangan</label>
                                        <input name="customFilePJP" type="file" class="form-control" id="customFilePJP" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;">Ketua Tim Evaluasi</th>
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
                                    <label id="example-label">Tanggal : <input type="date" class="form-control"  name="tanggalttdkte" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px"></label>
                                    <div>
                                        <label class="form-label" for="customFileKTE">Masukkan Tanda Tangan</label>
                                        <input name="customFileKTE" type="file" class="form-control" id="customFileKTE" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;">Sponsor Proyek</th>
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
                                    <label id="example-label">Tanggal : <input type="date" class="form-control"  name="tanggalttddsp" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px"></label>
                                    <div>
                                        <label class="form-label" for="customFileSP">Masukkan Tanda Tangan</label>
                                        <input name="customFileSP" type="file" class="form-control" id="customFileSP" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;">Bussiness Analyst</th>
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
                                    <label id="example-label">Tanggal : <input type="date" class="form-control"  name="tanggalttdba" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px"></label>
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
                        <table class="table table-bordered col-12">
                            <thead class="thead-light">
                                <tr>
                                    <th class="col-4" style="vertical-align: middle;">Jabatan Proyek</th>
                                    <th style="vertical-align: middle;">Jumlah Test Case yang berhasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="vertical-align: middle;">Project Controller</th>
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
                                    <th style="vertical-align: middle;">Programmer dan atau Software Developer</th>
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
                                    <th style="vertical-align: middle;">Tester</th>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passCheckboxes = document.querySelectorAll('input[name^="testresult"][value="Pass"]');
            var failCheckboxes = document.querySelectorAll('input[name^="testresult"][value="Fail"]');
        
            passCheckboxes.forEach(function (passCheckbox) {
                passCheckbox.addEventListener('change', function () {
                    // Jika checkbox "Pass" dipilih, nonaktifkan checkbox "Fail" yang bersangkutan
                    var correspondingFailCheckbox = passCheckbox.closest('tr').querySelector('input[name^="testresult"][value="Fail"]');
                    correspondingFailCheckbox.disabled = passCheckbox.checked;
                });
            });
        
            failCheckboxes.forEach(function (failCheckbox) {
                failCheckbox.addEventListener('change', function () {
                    // Jika checkbox "Fail" dipilih, nonaktifkan checkbox "Pass" yang bersangkutan
                    var correspondingPassCheckbox = failCheckbox.closest('tr').querySelector('input[name^="testresult"][value="Pass"]');
                    correspondingPassCheckbox.disabled = failCheckbox.checked;
                });
            });
        });
    </script>    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passCheckboxes = document.querySelectorAll('input[name^="testresultUAL"][value="Pass"]');
            var failCheckboxes = document.querySelectorAll('input[name^="testresultUAL"][value="Fail"]');
    
            passCheckboxes.forEach(function (passCheckbox) {
                passCheckbox.addEventListener('change', function () {
                    // Jika checkbox "Pass" dipilih, nonaktifkan checkbox "Fail" yang bersangkutan
                    var correspondingFailCheckbox = passCheckbox.closest('tr').querySelector('input[name^="testresultUAL"][value="Fail"]');
                    correspondingFailCheckbox.disabled = passCheckbox.checked;
                });
            });
    
            failCheckboxes.forEach(function (failCheckbox) {
                failCheckbox.addEventListener('change', function () {
                    // Jika checkbox "Fail" dipilih, nonaktifkan checkbox "Pass" yang bersangkutan
                    var correspondingPassCheckbox = failCheckbox.closest('tr').querySelector('input[name^="testresultUAL"][value="Pass"]');
                    correspondingPassCheckbox.disabled = failCheckbox.checked;
                });
            });
        });
    </script>
    
    @endsection