@extends('layout.admin')

@section('content')
<div class="card-header border-0">
    <div class="justify-content-between" style="text-justify:center;">
        <h1 class="text-center"><strong>HOME UNTUK ROLE PROJECT</strong></h1>
    </div>
</div>
<div class="card-body">
    <div class="d-flex">
        <table class="table table-bordered"  style="width: 100%">
            <thead class="thead-light">
                <tr style="text-align: center;">
                    <th scope="col" style="vertical-align: middle;">No</th>
                    <th scope="col" style="vertical-align: middle;">Date</th>
                    <th scope="col" style="vertical-align: middle;">Application Name</th>
                    <th scope="col" style="vertical-align: middle;">Data Owner</th>
                    <th scope="col" style="vertical-align: middle;">Progress</th>
                    <th scope="col" style="vertical-align: middle;">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $row)
                {{-- @if ($row->kirimke === 'Planning||Digiport') --}}
                <tr style="text-align: center; align-items: center;">
                    <th scope="row"  style="text-align: center; align-items: center;vertical-align: middle;">{{$no++}}</th>
                    <td style="text-align: center; align-items: center;vertical-align: middle;">{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                    <td style="text-align: center; align-items: center;vertical-align: middle;">{{$row->rfc->nama_aplikasi}}</td>
                    <td style="text-align: center; align-items: center;vertical-align: middle;">{{$row->rfc->sponsor_proyek}}</td>
                    <td style="text-align: center; align-items: center;vertical-align: middle;">
                        @if ($row->tot_progress === null)
                            <div>
                                <label>Belum Ada Progress</label>
                            </div>
                        @else
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$row->tot_progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row->tot_progress}}%">{{$row->tot_progress}}%</div>
                            </div>
                        @endif
                    </td>
                    <td style="vertical-align: middle;">
                        <div style="display: flex; gap: 5px;">
                            <a href="/viewcra/{{$row->id}}" class="btn btn-info"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                            <a href="/editprogress/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
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
    </div>
</div>
@endsection