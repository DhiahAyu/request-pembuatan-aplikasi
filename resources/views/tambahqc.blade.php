@extends('layout.admin')

@section('content')

    <div class="content-wrapper" style="margin-top: 3%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card p-3">
                        <div class="card-body">  
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="p-2" align="center">
                                            <strong>Quality Control</strong>
                                        </div>
                                    </td>
                                </tr>
                                <form action="/insertqc" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="srs_id" value="{{ $formrequest->id}}">
                                <tr>
                                    <td colspan="2">
                                        <div class="p-2" align="center">
                                           RIWAYAT PERUBAHAN
                                        </div>
                                    </td>
                                </tr>
                                <table class="table table-bordered">
                                    <thead>
                                    
                                        <tr style="text-align: center;vertical-align: middle;" width="24%">
                                            <th scope="col">Versi</th>
                                            <th scope="col">Dibuat Oleh</th>
                                            <th scope="col">Tanggal Revisi Dokumen</th>
                                            <th scope="col">Disetujui oleh</th>
                                            <th scope="col">Tanggal Persetujuan</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <textarea class="form-control"  name="versi" class="form-control m-input" id="floatinVersi" placeholder="" value="{{old('versi')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="dibuat" class="form-control m-input" id="floatiBuat" placeholder="" value="{{old('dibuat')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>

                                            <td>
                                                {{-- <textarea class="form-control"  name="tglrevisi" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px"></textarea> --}}
                                                <input type="date" class="form-control"  name="tglrevisi" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px">
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="disetujui" class="form-control m-input" id="floatingTglpersetujuan" placeholder="" value="{{old('disetujui')}}" style="height: 65px" ></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="date" class="form-control"  name="tglpersetujuan" class="form-control m-input" id="floatingTglpersetujuan" placeholder="" value="{{old('tglpersetujuan')}}" style="height: 65px">
                                                {{-- <textarea class="form-control"  name="tglpersetujuan" class="form-control m-input" id="floatingTglpersetujuanr" placeholder="" value="{{old('tglpersetujuan')}}" style="height: 65px"></textarea> --}}
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="keterangan" class="form-control m-input" id="floatingketerangan" placeholder="" value="{{old('keterangan')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="p-2">
                                            <td style="text-align: center; vertical-align: middle;" width="24%">
                                                <strong>Nama Aplikasi</strong>
                                            </td>                                            
                                            <td width="76%">	
                                                <textarea class="form-control" name="namaapp" class="form-control" id="floatingnamaapp" placeholder="(diisi dengan nama aplikasi yang akan diuji)" value="{{old('namaapp')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>	
                                        </tr>
                                        <tr class="p-2">
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Versi Aplikasi</strong>
                                            </td>
                                            <td width="76%">
                                                <textarea class="form-control" name="versiapp" class="form-control m-input" id="floatingversiapp" placeholder="(diisi dengan versi aplikasi yang akan diuji)" value="{{old('versiapp')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>	
                                        </tr>
                                        <tr class="p-2">
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Release Aplikasi</strong>
                                            </td>
                                            <td width="76%">	
                                                <textarea class="form-control" name="releaseapp" class="form-control m-input" id="floatingRelease" placeholder="(diisi dengan tahun rilis aplikasi yang akan diuji)" value="{{old('releaseapp')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>	
                                        </tr>
                                        <tr class="p-2">
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Tanggal Pengujian</strong>
                                            </td>
                                            <td width="76%">
                                                <textarea class="form-control"  name="tglpengujian" class="form-control m-input" id="floatingTglpengujian" placeholder="(diisi dengan tanggal pelaksanaan pengujian aplikasi)" value="{{old('tglpengujian')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Test Case</th>
                                            <th scope="col">Pass</th>
                                            <th scope="col">Fail</th>
                                            <th scope="col">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $id_TC =1;
                                        @endphp
                                        @foreach ($formrequest->moduls as $modul)
                                            @foreach ($modul->requirements as $requirement)
                                        <tr>
                                            <td width="40%">
                                                REQ-{{ $id_TC++ }}
                                                
                                            </td>
                                            <td>
                                                <input type="checkbox" name="pass[]" id="passCheckbox" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px"> 
                                                @error('dibuat')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="checkbox" name="fail[]" id="failCheckbox" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px">
                                                @error('dibuat')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>                                            
                                            <td>
                                                <textarea name="catatan[]" class="form-control m-input" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" value="{{old('jumlahcase')}}" style="height: 65px"></textarea>
                                                {{-- <textarea class="form-control m-input" name="catatan[]" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px"> --}}
                                                    {{-- {{ isset($_POST['catatan']) ? htmlspecialchars($_POST['catatan'][0]) : '' }} --}}
                                                </textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jumlah Test Case</th>
                                            <th scope="col">Jumlah Test Case yang berhasil</th>
                                            <th scope="col">Jumlah Test Case yang ditemukan error/ bug</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <textarea class="form-control"  name="jumlahcase" class="form-control m-input" id="floatingJumlahcase" placeholder="Diisi dengan jumlah test case" value="{{old('jumlahcase')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="caseberhasil" class="form-control m-input" id="floatingCaseberhasil" placeholder="Diisi dengan jumlah test case yang berhasil" value="{{old('caseberhasil')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="caseeror" class="form-control m-input" id="floatingCaseeror" placeholder="Diisi dengan jumlah temuan error/ bug (jika ada)" value="{{old('caseeror')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <td width="76%">	
                                            <div class="container mb-3">
                                                <button type="button" class="btn btn-success" id="addpenginfra">
                                                    <i class="fas fa-solid fa-plus" style="color: #ffffff;"></i>
                                                </button>
                                                <button type="button" class="btn btn-success" id="removepenginfra">
                                                    <i class="fas fa-solid fa-minus"></i>
                                                </button>
                                            </div>
                                            {{-- <div class="container" id="tambah_major"> --}}
                                            <div class="container" id="tambah_penginfra">
                                                <!-- Modul elements will be dynamically added here -->
                                            </div>
                                        </td>	
                                    </td>
                                        {{-- <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Aspek Infrastruktur</th>
                                            <th scope="col">Hasil Pengetesan </th>
                                            <th scope="col">Catatan</th>
                                        </tr> --}}
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td>
                                                <textarea class="form-control"  name="nomor" class="form-control m-input" id="floatingnomor" placeholder="Nomor" value="{{old('nomor')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="aspekinfrastruktur" class="form-control m-input" id="floatingaspekinfrastruktur" placeholder="Diisi dengan jumlah aspek infrastruktur yang tertuang dalam dokumen SRS" value="{{old('aspekinfrastruktur')}}" value="" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="hasiltes" class="form-control m-input" id="floatinghasiltes" placeholder="Sesuai/Tidak Sesuai"  value="{{old('hasiltes')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="form-control"  name="catatann" class="form-control m-input" id="floatingcatatann" placeholder="Diisi dengan catatan penyesuaian spesifikasi (jika ada)"  value="{{old('catatann')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jabatan Proyek</th>
                                            <th scope="col">Nama & Jabatan</th>
                                            <th scope="col">Tanda Tangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Ketua Tim Evaluasi</strong>
                                            </td>
                                            <td>	
                                                <textarea class="form-control" name="namatimevaluasi" id="floatingnamajabatan" placeholder="Nama dan Jabatan" value="{{old('namatimevaluasi')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="file" name="ttdtimevaluasi" id="ttd" value="{{old('ttdtimevaluasi')}}">
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Quality Control</strong>
                                            </td>
                                            <td>	
                                                <textarea class="form-control" name="namaqc" id="floatingKondisi" placeholder="Nama dan Jabatan" value="{{old('namaqc')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="file" name="ttdtimqc" id="ttd" value="{{old('ttdtimqc')}}">
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                    <table class="table table-bordered" style="margin-top: 1em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jabatan Proyek</th>
                                            <th scope="col"> <center> Nama & Jabatan </center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Project Controller</strong>
                                            </td>
                                            <td>	
                                                <textarea class="form-control" name="namapc" id="floatingKondisi" placeholder="Nama dan Jabatan"  value="{{old('namapc')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;" width="24%">
                                                <strong>Quality Control</strong>
                                            </td>
                                            <td>	
                                                <textarea class="form-control" name="namaqcc" id="floatingKondisi" placeholder="Nama Quality Control"  value="{{old('namaqcc')}}" style="height: 65px"></textarea>
                                                @error('dibuat')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row"> 
                                    <div class="col-xl-6 mb-4">
                                        <button type="submit" class="btn btn-success" style="width: 205%">Submit</button>
                                    </div>
                                </div>
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

<script>
    let counterpenginfra = 0;

    $(document).ready(function () {
        $('#addpenginfra').click(function () {
            counterpenginfra++;
            let newInputan = `
                <div class="form-group mb-3" id="penginfra-${counterpenginfra}">
                    <label for="penginfra">penginfra ke- ${counterpenginfra}</label>
                    <div class="row">
                        <div class="col">
                            <label for="floatingnomor">Nomor</label>
                            <textarea class="form-control" name="nomor[]" id="floatingnomor" placeholder="Nomor" style="height: 65px"></textarea>
                        </div>
                        <div class="col">
                            <label for="floatingaspekinfrastruktur">Aspek Infrastruktur</label>
                            <textarea class="form-control" name="aspekinfrastruktur[]" id="floatingaspekinfrastruktur" placeholder="Diisi dengan jumlah aspek infrastruktur yang tertuang dalam dokumen SRS" style="height: 65px"></textarea>
                        </div>
                        <div class="col">
                            <label for="floatinghasiltes">Hasil Tes</label>
                            <textarea class="form-control" name="hasiltes[]" id="floatinghasiltes" placeholder="Sesuai/Tidak Sesuai" style="height: 65px"></textarea>
                        </div>
                        <div class="col">
                            <label for="floatingcatatann">Catatan</label>
                            <textarea class="form-control" name="catatann[]" id="floatingcatatann" placeholder="Diisi dengan catatan penyesuaian spesifikasi (jika ada)" style="height: 65px"></textarea>
                        </div>
                    </div>
                </div>`;
            $('#tambah_penginfra').append(newInputan);
        });

        $('#removepenginfra').click(function () {
            if (counterpenginfra === 1) {
                alert("At least you must have 1 penginfra");
            } else {
                $('#penginfra-' + counterpenginfra).remove();
                counterpenginfra--;
            }
        });
    });
</script>
    <script>
         document.getElementById('submitButton').addEventListener('click', function (e) {
          e.preventDefault();
          fetch('/insertqc', {
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
    </script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</div>
@endsection
