@extends('layout.admin')

@section('content')

<div class="card-header border-0">
    <div class="justify-content-between" style="text-justify:center;">
        <h1 class="text-center"><strong>HALAMAN HOME UNTUK ROLE DIGITAL AIRPORT</strong></h1>
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
                    $no = 1;
                @endphp
                @foreach ($data as $row)
                @if ($row->kirimke === 'Digiport')
                <tr style="text-align: center; align-items: center;">
                    <th scope="row" style="text-align: center; align-items: center; vertical-align:middle;">{{$no++}}</th>
                    <td style="text-align: center; align-items: center; vertical-align:middle;">{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                    <td style="text-align: center; align-items: center; vertical-align:middle;">{{$row->rfc->nama_aplikasi}}</td>
                    <td style="text-align: center; align-items: center; vertical-align:middle;">{{$row->rfc->sponsor_proyek}}</td>
                    <td style="text-align: center; align-items: center; vertical-align:middle;">
                        <a href="/viewcra/{{$row->id}}" class="btn btn-info"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                        {{-- BTN EXPORT PDF --}}
                        {{-- <a target="_blank" href="/download_pdf/{{$row->id}}" class="btn btn-success mb-1"><i class="fas fa-file-pdf" style="color: #ffffff;"></i></a> --}}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection