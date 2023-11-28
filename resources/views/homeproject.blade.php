@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <h1 class="text-center" style="margin-top: 1em">HALAMAN HOME UNTUK ROLE PROJECT</h1>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="card col-10 mx-auto">
                        <div class="card-body">
                            <table class="table"  style="width: 100%">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Application Name</th>
                                        <th scope="col">Data Owner</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $row)
                                    {{-- @if ($row->kirimke === 'Planning||Digiport') --}}
                                    <tr style="text-align: center; align-items: center;">
                                        <th scope="row">{{$no++}}</th>
                                        <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                        <td>{{$row->rfc->nama_aplikasi}}</td>
                                        <td>{{$row->rfc->sponsor_proyek}}</td>
                                        <td>
                                            {{-- {{$row->data_owner}} --}}
                                            blm ada atributnya di tabel FormRequest
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <a href="/viewcra/{{$row->id}}" class="btn btn-info"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                                <a href="" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                                {{-- <a href="/updaterequest/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a> --}}
                                                {{-- BTN EXPORT PDF --}}
                                                {{-- <a target="_blank" href="/download_pdf/{{$row->id}}" class="btn btn-success mb-1"><i class="fas fa-file-pdf" style="color: #ffffff;"></i></a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
@endsection