@extends('layout.admin')

@section('content')

<div class="content">
    <div class="col-12">
        <h4 class="text-left p-2 mb-3" style="color: #343a40e2;"> <strong>Progress of Application</strong></h4>
        <div class="card">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                
                <style>
                    body {
                        background: #FFFFFF;
                        color: #000000;
                    }
            
                .card {
                    background: #FFFFFF;
                    color: #000000;
                }
            </style>
            </head>
            <body>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 mt-4">
                        {{-- <div class="card p-3">
                            <div class="card-body"> --}}
                                <h5 style="color: #343A40;">Nama Aplikasi : {{$data->rfc->nama_aplikasi}}</h5>
                                {{-- &nbsp; --}}
                                {{-- <h5 style="color: #343A40;">PIC : </h5> --}}
                                <form action="{{ route('update.progress', ['id' => $data->id]) }}" method="post">
                                    @csrf
                                    <table class="table table-bordered" style="margin-top: 1em;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Deskripsi Menu</th>
                                                <th>Kebutuhan Fungsional</th>
                                                <th>Mockup</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data->moduls as $modul)
                                                @foreach ($modul->requirements as $requirement)
                                                    <tr>
                                                        @if ($loop->first)
                                                            <td rowspan="{{ count($modul->requirements) }}">{{$no++}}</td>
                                                            <td rowspan="{{ count($modul->requirements) }}">{{ $modul->nama }}</td>
                                                        @endif
                                                        <td>{{ $requirement->requirement }}</td>
                                                        <td>
                                                            @if ($requirement->mockup)
                                                                <img src="{{ asset($requirement->mockup) }}"
                                                                    alt="Mockup Image" width="100">
                                                            @else
                                                                No Mockup
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    name="progress[{{ $requirement->id }}]"
                                                                    pattern="\d*" oninput="this.value = this.value.replace(/\D/g, '')"
                                                                    required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <tr style="text-align: center; align-items: center;vertical-align: middle;">
                                                <td colspan="4">Rata Rata</td>
                                                <td colspan="4"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div style="width: 100%; padding:10px;">
                                        <button type="submit" class="btn btn-success" style="width: 100%;">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </body>
            </html>  
        </div>
    </div>
</div>
@endsection
