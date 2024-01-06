@extends('layout.admin')

@section('content')

<div class="content">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0" style="background-color: #2a78ac">
                        <div class="justify-content-between" style="text-justify:center;">
                            <h3 class="text-center" style="color: #fffffff0"> <strong>HALAMAN HOME UNTUK ROLE PLANNING</strong></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <table class="table"  style="width: 100%">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Application Name</th>
                                        <th scope="col">Data Owner</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                                    @endphp
                                    @foreach ($data as $row)
                                    @if ($row->kirimke === 'planning')
                                    <tr style="text-align: center; align-items: center; vertical-align:middle;">
                                        <th scope="row" style="text-align: center; align-items: center; vertical-align:middle;">{{$no++}}</th>
                                        <td style="text-align: center; align-items: center; vertical-align:middle;">{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                        <td style="text-align: center; align-items: center; vertical-align:middle;">{{$row->rfc->nama_aplikasi}}</td>
                                        <td style="text-align: center; align-items: center; vertical-align:middle;">{{$row->rfc->sponsor_proyek}}</td>
                                        <td style="text-align: center; align-items: center; vertical-align:middle;">
                                            <a href="/viewcra/{{$row->id}}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                            @if ($row->rfc->formsfill == '2/3')
                                                <a href="/tambahsrs/{{$row->rfc->id}}" class="btn btn-success" style="border-radius: 10px"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> SRS</i></a>
                                            @else
                                                <label>SRS Telah Di kirim</label>
                                            @endif
                                            {{-- @if ($row->rfc->status=='Approved'&& $row->rfc->formsfill == '3/3')
                                            <label>SRS Telah Di kirim</label>
                                            @endif --}}
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                    </div>
                        </div>
                    </div>
                    @endsection
                </div>
            </div>
        </div>