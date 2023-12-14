    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <style>
            body {
                background: #454D55;
                color: #E3E3E3;
            }

            .card {
                background: #343A40;
                color: #E3E3E3;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center p-2 mb-3" style="color: white;">Progress of Application</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 style="color: white;">Nama Aplikasi : {{$data->rfc->nama_aplikasi}}</h5>
                            <h5 style="color: white;">PIC : </h5>
                            <form action="{{ route('update.progress', ['id' => $data->id]) }}" method="post">
                                @csrf
                                <table class="table table-bordered" style="margin-top: 1em;">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th scope="col" style="color: white;">No</th>
                                            <th scope="col" style="color: white;">Deskripsi Menu</th>
                                            <th scope="col" style="color: white;">Kebutuhan Fungsional</th>
                                            <th scope="col" style="color: white;">Mockup</th>
                                            <th scope="col" style="color: white;">Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data->moduls as $modul)
                                            @foreach ($modul->requirements as $requirement)
                                                <tr style="text-align: center; align-items: center;vertical-align: middle;">
                                                    @if ($loop->first)
                                                        <th rowspan="{{ count($modul->requirements) }}" style="color: white;">{{$no++}}</th>
                                                        <td rowspan="{{ count($modul->requirements) }}" style="color: white;">{{ $modul->nama }}</td>
                                                    @endif
                                                    <td style="color: white;">{{ $requirement->requirement }}</td>
                                                    <td>
                                                        @if ($requirement->mockup)
                                                            <img src="{{ asset($requirement->mockup) }}" alt="Mockup Image" width="100">
                                                        @else
                                                            No Mockup
                                                        @endif
                                                    </td>
                                                    <td style="color: white; width: 13%">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" name="progress[{{ $requirement->id }}]" pattern="\d*" oninput="this.value = this.value.replace(/\D/g, '')" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
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