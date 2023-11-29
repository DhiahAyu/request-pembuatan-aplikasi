@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h1 class="text-center" style="margin-top: 1em">APPLICATION REQUEST ADMIN</h1>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="card col-10 mx-auto">
                    {{-- <div class="card-header ui-sortable-handle">
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                </li>
                            </ul>
                        </div> 
                    </div> --}}
                    <div class="card-body">
                        <table class="table"  style="width: 100%">
                            <thead>
                                <tr style="text-align: center">
                                    <th scope="col">No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Application Name</th>
                                    <th scope="col">Data Owner</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $row)
                                @if(in_array($row->status, ['Pending', 'Approved', 'Rejected']))
                                <tr style="text-align: center; align-items: center;">
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                    <td>{{$row->nama_aplikasi}}</td>
                                    <td>{{$row->sponsor_proyek}}</td>
                                    @if ($row->status=='Pending')
                                        <td><h5><span class="badge badge-pill badge-warning">{{$row->status}}</span></h5></td>
                                    @endif
                                    @if ($row->status=='Approved')
                                        <td><h5><span class="badge badge-pill badge-success">{{$row->status}}</span></h5></td>
                                    @endif
                                    @if ($row->status=='Rejected')
                                        <td><h5><span class="badge badge-pill badge-danger">{{$row->status}}</span></h5></td>
                                    @endif
                                    <td>
                                        @if ($row->status=='Approved'&& $row->formsfill == '1/3')
                                        <a href="/tambahdatacra/{{ $row->id }}" class="btn btn-success"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> CRA</i></a>
                                        @endif
                                        @if ($row->status=='Approved'&& $row->formsfill == '2/3'||$row->formsfill == '3/3')
                                        <h6>CRA telah dikirim ke unit lain</h6>
                                        {{-- <a href="" class="btn btn-success"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> CRA Telah di buat</i></a> --}}
                                        @endif
                                        @if ($row->status=='Pending')
                                        <a href="{{ route('formrequestapprove', $row->id) }}" class="btn btn-success">Approve</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Rejected</button>
                                        {{-- <a href="{{ route('formrequestreject', $row->id) }}" class="btn btn-danger">Reject</a> --}}
                                        @endif
                                        @if ($row->status=='Rejected') 
                                            {{-- <a href="#" class="btn btn-info"><span class="material-icons">note_add</span></a> --}}
                                            {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="material-icons">note_add</span></button> --}}
                                            <button type="button" class="btn btn-info view-modal-btn" data-bs-toggle="modal" data-bs-target="#viewModal{{ $row->id }}" data-rejected-message="{{ $row->pesan }}">
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
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <!-- Modal Submit Pesan Reject -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Rejected Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('formrequestreject', $row->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="rejectedMessage">Rejected Message:</label>
                            <textarea class="form-control" name="rejected_message" id="rejectedMessage" placeholder="Masukkan Alasan kenapa Request Ditolak" style="width: 100%; height: 100%;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
<!--content-->

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
</div>
