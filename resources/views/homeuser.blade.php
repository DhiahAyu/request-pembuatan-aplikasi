@extends('layout.admin')

@section('content')
<div class="content">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0" style="background-color: #2a78ac">
                        <div class="justify-content-between" style="text-justify:center;">
                            <h3 class="text-center" style="color: #fffffff0"><strong>APPLICATION REQUEST</strong></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="/tambahrequest" class="btn btn-success mb-2" style="margin-top: 5px; border-radius: 10px;"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> RFC</i></a>
                        <div class="d-flex">
                            <table class="table table-bordered col-12">
                                <thead class="thead-light">
                                    <tr style="text-align: center">
                                        <th scope="col" style="vertical-align: middle;">No</th>
                                        <th scope="col" style="vertical-align: middle;">Date</th>
                                        <th scope="col" style="vertical-align: middle;">Application Name</th>
                                        <th scope="col" style="vertical-align: middle;">Data Owner</th>
                                        <th scope="col" style="vertical-align: middle;">Status</th>
                                        <th scope="col" style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                                    @endphp
                                    @foreach ($data as $row)
                                    <tr style="text-align: center; vertical-align: middle;">
                                        <th scope="row" style="vertical-align: middle;">{{$no++}}</th>
                                        <td style="vertical-align: middle;">{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                        <td style="vertical-align: middle;">{{$row->nama_aplikasi}}</td>
                                        <td style="vertical-align: middle;">{{$row->sponsor_proyek}}</td>
                                        @if ($row->status=='Not Yet Submitted')
                                            <td style="vertical-align: middle;">
                                                <h5><span class="badge badge-pill badge-info"><i class="bi bi-file-earmark"></i></span></h5>
                                            </td>
                                        @endif
                                        @if ($row->status=='Pending')
                                            <td style="vertical-align: middle;">
                                                <h5><span class="badge badge-pill badge-warning"><i class="bi bi-clock" style="color: rgb(245, 240, 240)"></i></span></h5>
                                            </td>
                                        @endif
                                        @if ($row->status=='Approved')
                                            <td style="vertical-align: middle;">
                                                <h5><span class="badge badge-pill badge-success"><i class="bi bi-check2-circle"></i></span>
                                                </h5></td>
                                        @endif
                                        @if ($row->status=='Rejected')
                                            <td style="vertical-align: middle;">
                                                <h5><span class="badge badge-pill badge-danger"><i class="bi bi-x-circle"></i></span></h5>
                                            </td>
                                        @endif
                                        <td style="vertical-align: middle;">
                                            @if ($row->status=='Not Yet Submitted')
                                                <a href="/updaterequest/{{$row->id}}" class="btn btn-info btn-sm"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                                <a href="#" class="btn btn-danger delete btn-sm" data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                                            @endif
                                            @if ($row->status=='Approved'&& $row->formsfill == '4/3')
                                            <a href="/UAT/{{$row->id}}" class="btn btn-info btn-sm"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                            {{-- <a href="" class="btn btn-success"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> CRA Telah di buat</i></a> --}}
                                            @endif
                                            @if ($row->status=='Pending')
                                                <a href="/updaterequest/{{$row->id}}" class="btn btn-info btn-sm"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                                <a href="#" class="btn btn-danger delete btn-sm" data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                                            @endif
                                            @if ($row->status=='Rejected')
                                                {{-- <a href="/updaterequest/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a> --}}
                                                <a href="#" class="btn btn-danger delete btn-sm" data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                                                <button type="button" class="btn btn-secondary view-modal-btn btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $row->id }}" data-rejected-message="{{ $row->pesan }}">
                                                    <i class="fas fa-solid fa-eye" style="color: #ffffff;"></i>
                                                </button> 
                                            @endif
                                             <!-- Modal -->
                                             <div class="modal fade" id="viewModal{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rejected Reason</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p>{{$row->pesan}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            {{-- BTN EXPORT PDF --}}
                                            {{-- <a target="_blank" href="/download_pdf/{{$row->id}}" class="btn btn-success mb-1"><i class="fas fa-file-pdf" style="color: #ffffff;"></i></a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                    </div>
                        </div>
                    </div>
                    
                        <!-- Optional JavaScript; choose one of the two! -->
                    
                        <!-- Option 1: Bootstrap Bundle with Popper -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <!-- Option 2: Separate Popper and Bootstrap JS -->
                        <!--
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                        -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $('.delete').click(function(){
                            var requestid = $(this).attr('data-id');
                            var namaapp = $(this).attr('data-nama');
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert data " + namaapp + "!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to the delete page with the requestid
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    );
                                    setTimeout(function() {
                                        window.location = "/deletedata/" + requestid;
                                    }, 2000);
                                } else {
                                    Swal.fire("Data " + namaapp + " Tidak jadi dihapus");
                                }
                            });
                        });
                        </script>
                    @endsection
                </div>
            </div>
        </div>
