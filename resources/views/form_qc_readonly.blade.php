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
                                                   {{$data->versi}}
                                                </td>
                                                <td>
                                                   {{$data->dibuat}}
                                                </td>
    
                                                <td>
                                                    {{-- <textarea class="form-control"  name="tglrevisi" class="form-control m-input" id="floatingTglrevisi" placeholder="" value="{{old('tglrevisi')}}" style="height: 65px"></textarea> --}}
                                                    {{ $data->tglrevisi }}
                                                </td>
                                                <td>
                                                   {{$data->disetujui}}
                                                </td>
                                                <td>
                                                   {{ $data->tglrevisi }}
                                                </td>
                                                <td>
                                                    {{$data->keterangan}}
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
                                                     {{$data->namaapp}}
                                                    </td>	
                                                </tr>
                                                <tr class="p-2">
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Versi Aplikasi</strong>
                                                    </td>
                                                    <td width="76%">
                                                        {{$data->versiapp}}
                                                    </td>	
                                                </tr>
                                                <tr class="p-2">
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Release Aplikasi</strong>
                                                    </td>
                                                    <td width="76%">	
                                                        {{$data->releaseapp}}
                                                    </td>	
                                                </tr>
                                                <tr class="p-2">
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Tanggal Pengujian</strong>
                                                    </td>
                                                    <td width="76%">
                                                        
                                                        {{  $data->tglrevisi }}
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
                                                        $id_TC = 1;
                                                    @endphp
                                                    @foreach ($data->pengujians as $pengujian)
                                                        <tr>
                                                            <td width="40%">
                                                                REQ-{{ $id_TC++ }}
                                                            </td>
                                                            <td>
                                                                <p>
                                                                    {{ $pengujian->test_result }}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                {{ $pengujian->catatan }}
                                                            </td>
                                                        </tr>
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
                                                    <td>{{$data->jumlahcase}}</textarea>
                                                    </td>
                                                    <td>{{$data->caseberhasil}}</textarea>
                                                    </td>
                                                    <td>{{$data->caseeror}}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered">
                                            <tbody style="text-align: center;">
                                                <tr>
                                                    <th scope="col">Nomor</th>
                                                    <th scope="col">Aspek Infrastruktur</th>
                                                    <th scope="col">Hasil Tes</th>
                                                    <th scope="col">Catatan</th>
                                                </tr>
                                            </tbody>
                                                <tbody style="text-align: center;">
                                                    @php
                                                        $id_TC = 1;
                                                    @endphp
                                                    @foreach ($data->penginfrastrukturs as $penginfrastrukturs)
                                                        <tr>
                                                            {{-- <td width="40%">
                                                                Nomor-{{ $id_TC++ }}
                                                            </td> --}}
                                                            <td>
                                                                <p>
                                                                    {{ $penginfrastrukturs->nomor }}
                                                                </p>
                                                            </td>

                                                            <td>
                                                                {{ $penginfrastrukturs->aspekinfrastruktur }}
                                                            </td>
                                                            <td>
                                                                {{ $penginfrastrukturs->hasiltes }}
                                                            </td>
                                                            <td>
                                                                {{ $penginfrastrukturs->catatann }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </tbody>
                                            </table>
                                            <table class="table table-bordered" style="margin-top: 1em;">
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
                                                    <td>	{{$data->namatimevaluasi}}</textarea>
                                                    </td>
                                                    <td>
                                                        @if ($data->ttdtimevaluasi)
                                                            <img src="{{ asset( $data->ttdtimevaluasi) }}" style="height: 45px">
                                                            {{-- <p>Current File: {{ $data->ttdtimevaluasi }}</p> --}}
                                                        @endif
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Quality Control</strong>
                                                    </td>
                                                    <td>	{{$data->namaqc}}</textarea>
                                                    </td> 
                                                    <td>
                                                        @if ($data->ttdtimevaluasi)
                                                            <img src="{{ asset( $data->ttdtimqc) }}" style="height: 45px">
                                                            {{-- <p>Current File: {{ $data->ttdtimevaluasi }}</p> --}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
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
                                                    <td>	{{$data->namapc}}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;vertical-align: middle;" width="24%">
                                                        <strong>Quality Control</strong>
                                                    </td>
                                                    <td>	{{$data->namaqcc}}</textarea>
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