@extends('layout.admin')

@section('content')

<div class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-0" style="background-color: #2a78ac">
                <div class="justify-content-between" style="text-justify:center;">
                    <h3 class="text-center" style="color: #fffffff0"><strong>HOME UNTUK ROLE PROJECT</strong></h3>
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
                                $no = ($data->currentPage() - 1) * $data->perPage() + 1;
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
                                            {{-- @if ($row->tot_progress== null)
                                            <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus " style="color: #ffffff;"> PIC</i></a>
                                            @endif --}}
                                            @if ($row->pic->isEmpty() || $row->pic->first()->name_pic == null)
                                                {{-- Your content when the condition is true --}}
                                                <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal-{{$row->id}}"><i class="fas fa-plus " style="color: #ffffff;"> PIC</i></a>
                                            @else
                                            <a href="/editprogress/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                            @endif
                                        <a href="/viewcra/{{$row->id}}" class="btn btn-info" style="vertical-align: center;"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                        
                                        {{-- <a href="/updaterequest/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a> --}}
                                        {{-- BTN EXPORT PDF --}}
                                        {{-- <a target="_blank" href="/download_pdf/{{$row->id}}" class="btn btn-success mb-1"><i class="fas fa-file-pdf" style="color: #ffffff;"></i></a> --}}
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Input Nama PIC</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('tambahpic', $row->id) }}" method="post">
                                                        @csrf
                                                        <div class="container mb-3" style="text-align: left;">
                                                            <button type="button" class="btn btn-primary btn-sm addpic">
                                                                <i class="fas fa-solid fa-plus" style="color: #ffffff;"></i>
                                                            </button>
                                                            
                                                            <button type="button" class="btn btn-primary btn-sm removepic">
                                                                <i class="fas fa-solid fa-minus"></i>
                                                            </button>                                                            
                                                        </div>
                                                        <div class="container" id="tambah_pic">
                                                            <div class="form-group mb-3" style="text-align: left;">
                                                                <label for="pic" >Nama PIC ke-1</label>
                                                                <input class="form-control" name="name_pic[]" id="name_pic-${counter_pic}" placeholder="Masukkan Nama PIC"></input>
                                                            </div>
                                                        </div>
                                                        {{-- <input type="text" name="name_pic[]">
                                                        <input type="text" name="name_pic[]">
                                                        <input type="text" name="name_pic[]"> --}}
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                            
                                </td>
                            </tr>
                            {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    let counter_pic = 1;

    $(document).ready(function () {
        // Use a class selector for the addpic and removepic buttons
        $('.addpic').click(function () {
            let modal = $(this).closest('.modal'); // Find the closest modal
            counter_pic++;

            let newInputan = `
                <div class="form-group mb-3" style="text-align: left;">
                    <label for="pic">Nama PIC ke-${counter_pic}</label>
                    <input class="form-control" name="name_pic[]" id="name_pic-${counter_pic}" placeholder="Masukkan Nama PIC">
                </div>`;

            modal.find('#tambah_pic').append(newInputan); // Find the tambah_pic within the specific modal
        });

        $('.removepic').click(function () {
            let modal = $(this).closest('.modal'); // Find the closest modal

            if (counter_pic === 1) {
                alert("At least you must have 1 pic");
            } else {
                modal.find('#name_pic-' + counter_pic).closest('.form-group').remove();
                counter_pic--;
            }
        });
    });
</script>




@endsection   