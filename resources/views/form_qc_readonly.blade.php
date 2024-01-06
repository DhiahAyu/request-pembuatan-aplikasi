@extends('layout.admin')

@section('content')

@if(Auth::check() && Auth::user()->role =='admin')
    <div style="text-align: right; margin-right: 3rem;">
        <a href="/admin">Home</a>
        <span style="vertical-align: middle; color:rgba(0, 0, 0, 0.600)"> / View Quality Control</span>
    </div>
@endif

<div class="content">
    <div class="col-12">
            <div class="content">
                            <div class="container">
                            <div class="row justify-content-center p-3">
                                    <div class="card p-4" style="background: #ffffff;color: rgba(16, 3, 3, 0.844);" border="1">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="p-2" align="center">
                                                                    <strong>Quality Control</strong>
                                                                </div>
                                                            </td>
                                                        </tr>
                                            <tr >
                                                <td colspan="2">
                                                    <div class="p-2" align="center">
                                                       RIWAYAT PERUBAHAN
                                                    </div>
                                                </td>
                                            </tr>
                                        <br>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tbody style="text-align: center; ">
                                                <tr style="text-align: center;vertical-align: middle;" width="24%">
                                                    <th scope="col">Versi</th>
                                                    <th scope="col">Dibuat Oleh</th>
                                                    <th scope="col">Tanggal Revisi Dokumen</th>
                                                    <th scope="col">Disetujui oleh</th>
                                                    <th scope="col">Tanggal Persetujuan</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                    <textarea class="form-control"  name="versi" class="form-control m-input" id="floatinVersi" placeholder="" style="height: 65px" value='' readonly>{{$data->qc->versi}}</textarea>
                                                </td>
                                                <td>
                                                    <textarea class="form-control"  name="dibuat" class="form-control m-input" id="floatiBuat" placeholder="" style="height: 65px" value='' readonly>{{$data->qc->dibuat}}</textarea>
                                                </td>
    
                                                <td>
                                                    {{-- <textarea class="form-control"  name="tglrevisi" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px"></textarea> --}}
                                                    <input type="text" class="form-control" name="tglrevisi" id="floatingTglrevisi" placeholder="" value="{{ old('tglrevisi') ?? $data->qc->tglrevisi }}" style="height: 65px" readonly/>
                                                </td>
                                                <td>
                                                    <textarea class="form-control"  name="disetujui" class="form-control m-input" id="floatingTglpersetujuan" placeholder="" style="height: 65px" value='' readonly>{{$data->qc->disetujui}}</textarea>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control"  name="tglpersetujuan" class="form-control m-input" id="floatingTglpersetujuan" placeholder="" value="{{ old('tglrevisi') ?? $data->qc->tglrevisi }}" style="height: 65px" readonly>
                                                </td>
                                                <td>
                                                    <textarea class="form-control"  name="keterangan" class="form-control m-input" id="floatingketerangan" placeholder="" style="height: 65px" value='' readonly>{{$data->qc->keterangan}}</textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <tbody style="text-align: center;">
                                                <tr class="p-2">
                                                    <td style="text-align: center; vertical-align: middle;" width="24%">
                                                        <strong>Nama Aplikasi</strong>
                                                    </td>                                            
                                                    <td width="76%">	
                                                        <textarea class="form-control" name="namaapp" class="form-control" id="floatingnamaapp" placeholder="(diisi dengan nama aplikasi yang akan diuji)" style="height: 65px" value='' readonly>{{$data->qc->namaapp}}</textarea>
                                                    </td>	
                                                </tr>
                                                <tr class="p-2">
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Versi Aplikasi</strong>
                                                    </td>
                                                    <td width="76%">
                                                        <textarea class="form-control" name="versiapp" class="form-control m-input" id="floatingversiapp" placeholder="(diisi dengan versi aplikasi yang akan diuji)" style="height: 65px" value='' readonly>{{$data->qc->versiapp}}</textarea>
                                                    </td>	
                                                </tr>
                                                <tr class="p-2">
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Release Aplikasi</strong>
                                                    </td>
                                                    <td width="76%">	
                                                        <textarea class="form-control" name="releaseapp" class="form-control m-input" id="floatingRelease" placeholder="(diisi dengan tahun rilis aplikasi yang akan diuji)" style="height: 65px" value='' readonly>{{$data->qc->releaseapp}}</textarea>
                                                    </td>	
                                                </tr>
                                                <tr class="p-2">
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Tanggal Pengujian</strong>
                                                    </td>
                                                    <td width="76%">
                                                        {{-- <textarea class="form-control"  name="tglpengujian" class="form-control m-input" id="floatingTglpengujian" placeholder="(diisi dengan tanggal pelaksanaan pengujian aplikasi)" value="{{old('tglpengujian')}}" style="height: 65px"></textarea> --}}
                                                        <input type="date" class="form-control"  name="tglpengujian" class="form-control m-input" id="floatingTglpengujian" placeholder="" value="{{ old('tglrevisi') ?? $data->qc->tglrevisi }}" style="height: 65px" readonly/>
                                                    </td>
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>    
                                        <table class="table table-bordered">
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <th scope="col">ID Test Case</th>
                                                    <th scope="col">Test Result</th>
                                                    <th scope="col">Catatan</th>
                                                </tr>
                                            </tbody>
                                            <tbody style="text-align: center;">
                                                @php
                                                $id_TC =1;
                                                @endphp
                                                @foreach ($data->moduls as $modul)
                                                    @foreach ($modul->requirements as $requirement)
                                                <tr>
                                                        <td width="40%">
                                                            REQ-{{ $id_TC++ }}
                                                            
                                                        </td>
                                                    {{-- <td>
                                                        <textarea name="catatan[]" class="form-control m-input" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px" readonly>{{$data->catatan}}</textarea>
                                                    </td> --}}
                                                    <td>
                                                        <p>
                                                            {{-- @if($data->qc && $data->qc->pengujians->isNotEmpty()) --}}
                                                                {{ $data->qc->pengujians->first()->test_result}}
                                                            {{-- @endif --}}
                                                        </p>
                                                        {{-- <input type="checkbox" name="test_result[]" id="passCheckbox" style="height: 45px" value="{{ old('pass') ?? $data->qc->tglrevisi }}" disabled onchange="updateCheckboxes('passCheckbox', 'failCheckbox')"> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="test_result[]" id="failCheckbox" style="height: 45px; " value="{{ old('fail') ?? $data->qc->tglrevisi }}" disabled onchange="updateCheckboxes('failCheckbox', 'passCheckbox')"> --}}

                                                    </td> 
                                                    <script>
                                                        function updateCheckboxes(checkedId, otherId) {
                                                            var checkedCheckbox = document.getElementById(checkedId);
                                                            var otherCheckbox = document.getElementById(otherId);
                                                            
                                                            if (checkedCheckbox.checked) {
                                                                otherCheckbox.disabled = true;
                                                            } else {
                                                                otherCheckbox.disabled = false;
                                                            }
                                                        }
                                                    </script>                                                                               
                                                    <td>
                                                        {{-- <textarea name="catatan[]" class="form-control m-input" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px" value='' readonly>{{$data->catatan}}</textarea> --}}
                                                        {{-- <textarea name="catatan[]" class="form-control m-input" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px" readonly>{{$data->qc->pengujians->catatan}}</textarea> --}}
                                                        {{-- <textarea class="form-control m-input" name="catatan[]" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px" disabled> --}}
                                                        {{-- {{ isset($_POST['catatan']) ? htmlspecialchars($_POST['catatan'][0]) : '' }} --}}
                                                        {{-- </textarea> --}}
                                                        <textarea name="catatan[]" class="form-control m-input" id="floatingcatatan" placeholder="(diisi dengan [X] apabila dari hasil pengetesan tidak ditemukan bug/error)" style="height: 65px" readonly>
                                                            @if($data->qc && $data->qc->pengujians->isNotEmpty())
                                                                @foreach($data->qc->pengujians as $pengujian)
                                                                    {{ $pengujian->catatan }}
                                                                    @if(!$loop->last)
                                                                        &#10; {{-- Line break HTML entity --}}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </textarea>                                            
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table> 
                                        <table class="table table-bordered">
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <th scope="col">Jumlah Test Case</th>
                                                    <th scope="col">Jumlah Test Case yang berhasil</th>
                                                    <th scope="col">Jumlah Test Case yang ditemukan error/ bug</th>
                                                </tr>
                                            </tbody>
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <td>
                                                        <textarea class="form-control"  name="jumlahcase" class="form-control m-input" id="floatingJumlahcase" placeholder="Diisi dengan jumlah test case" style="height: 65px" value='' readonly>{{$data->qc->jumlahcase}}</textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"  name="caseberhasil" class="form-control m-input" id="floatingCaseberhasil" placeholder="Diisi dengan jumlah test case yang berhasil" style="height: 65px" value='' readonly>{{$data->qc->caseberhasil}}</textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"  name="caseeror" class="form-control m-input" id="floatingCaseeror" placeholder="Diisi dengan jumlah temuan error/ bug (jika ada)" style="height: 65px" value='' readonly>{{$data->qc->caseeror}}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            </tbody>
                                            <tbody style="text-align: center;">
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered">
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <th scope="col">Jabatan Proyek</th>
                                                    <th scope="col">Nama & Jabatan</th>
                                                    <th scope="col">Tanda Tangan</th>
                                                </tr>
                                            </tbody>
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Ketua Tim Evaluasi</strong>
                                                    </td>
                                                    <td>	
                                                        <textarea class="form-control" name="namatimevaluasi" id="floatingnamajabatan" placeholder="Nama dan Jabatan" style="height: 65px" value='' readonly>{{$data->qc->namatimevaluasi}}</textarea>
                                                    </td>
                                                    <td>
                                                        @if ($data->qc->ttdtimevaluasi)
                                                            <img src="{{ asset( $data->qc->ttdtimevaluasi) }}" style="height: 45px">
                                                            {{-- <p>Current File: {{ $data->ttdtimevaluasi }}</p> --}}
                                                        @endif
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Quality Control</strong>
                                                    </td>
                                                    <td>	
                                                        <textarea class="form-control" name="namaqc" id="floatingKondisi" placeholder="Nama dan Jabatan" style="height: 65px" value='' readonly>{{$data->qc->namaqc}}</textarea>
                                                    </td> 
                                                    <td>
                                                        @if ($data->qc->ttdtimevaluasi)
                                                            <img src="{{ asset( $data->qc->ttdtimqc) }}" style="height: 45px">
                                                            {{-- <p>Current File: {{ $data->ttdtimevaluasi }}</p> --}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <table class="table table-bordered" style="margin-top: 1em;">
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <th scope="col">Jabatan Proyek</th>
                                                    <th scope="col"> <center> Nama & Jabatan </center></th>
                                                </tr>
                                            </tbody>
                                            <tbody style="text-align: center; ">
                                                <tr>
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Project Controller</strong>
                                                    </td>
                                                    <td>	
                                                        <textarea class="form-control" name="namapc" id="floatingKondisi" placeholder="Nama dan Jabatan"  style="height: 65px" value='' readonly>{{$data->qc->namapc}}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Quality Control</strong>
                                                    </td>
                                                    <td>	
                                                        <textarea class="form-control" name="namaqcc" id="floatingKondisi" placeholder="Nama Quality Control"  style="height: 65px" value='' readonly>{{$data->qc->namaqcc}}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <br>									
                                    </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    {{-- </body> --}}
            </html>  
        </div>
    </div>
</div>
@endsection