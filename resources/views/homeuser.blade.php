@extends('layout.admin')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <h1 class="text-center" style="margin-top: 1em">APPLICATION REQUEST</h1>
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="card col-10 mx-auto">
                    <div class="card-header ui-sortable-handle">
                        <a href="/tambahrequest" class="btn btn-success mb-2" style="margin-top: 5px"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> RFC</i></a>   
                        {{-- <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
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
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $row)
                                <tr style="text-align: center; align-items: center;">
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                    <td>{{$row->nama_aplikasi}}</td>
                                    <td>{{$row->sponsor_proyek}}</td>
                                    @if ($row->status=='Not Yet Submitted')
                                        <td><h5><span class="badge badge-pill badge-info" style="">Draft</span></h5></td>
                                    @endif
                                    @if ($row->status=='Pending')
                                        <td><h5><span class="badge badge-pill badge-warning" style="">{{$row->status}}</span></h5></td>
                                    @endif
                                    @if ($row->status=='Approved')
                                        <td><h5><span class="badge badge-pill badge-success">{{$row->status}}</span></h5></td>
                                    @endif
                                    @if ($row->status=='Rejected')
                                        <td><h5><span class="badge badge-pill badge-danger">{{$row->status}}</span></h5></td>
                                    @endif
                                    <td>
                                        <h1></h1>
                                        @if ($row->status=='Not Yet Submitted')
                                            <a href="/updaterequest/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                            <a href="#" class="btn btn-danger delete  data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                                        @endif
                                        @if ($row->status=='Approved')
                                            <a href="#" class="btn btn-success"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> SRS</i></a>
                                        @endif
                                        @if ($row->status=='Pending')
                                            <a href="/updaterequest/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                            <a href="#" class="btn btn-danger delete  data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                                        @endif
                                        @if ($row->status=='Rejected')
                                            <a href="/updaterequest/{{$row->id}}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                            <a href="#" class="btn btn-danger delete " data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                                        @endif
                                        {{-- BTN EXPORT PDF --}}
                                        {{-- <a target="_blank" href="/download_pdf/{{$row->id}}" class="btn btn-success mb-1"><i class="fas fa-file-pdf" style="color: #ffffff;"></i></a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
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
