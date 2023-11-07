@extends('layout.admin')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
<!--content-->
<h1 class="text-center p-2">Data Form Request</h1>

    <div class="container">
    <a href="/tambahrequest" class="btn btn-success mb-2">Tambah +</a>
        <div class="row">
          <div class="col">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" style="text-align: center;">#</th>
                  <th scope="col" style="text-align: center;">Nama Aplikasi</th>
                  <th scope="col" style="text-align: center;">Sponsor Proyek</th>
                  <th scope="col" style="text-align: center;">Latar Belakang</th>
                  <th scope="col" style="text-align: center;">Tujuan</th>
                  <th scope="col" style="text-align: center;">Wanted Feature</th>
                  <th scope="col" style="text-align: center;">Flowchart</th>
                  <th scope="col" style="text-align: center;">Current Condition</th>
                  <th scope="col" style="text-align: center;">Kendala</th>
                  <th scope="col" style="text-align: center;">Ruang Lingkup</th>
                  <th scope="col" style="text-align: center;">Upload Data</th>
                  <th scope="col" style="text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{$row->nama_aplikasi}}</td>
                  <td>{{$row->sponsor_proyek}}</td>       
                  <td>{{$row->latar_belakang}}</td>
                  <td>{{$row->tujuan}}</td>
                  <td>{{$row->wanted_feature}}</td>
                  <td>
                    <div style="display: flex; align-items: center; justify-content: center; height: 100px;">
                      <img src="{{asset('gambarflowchart/'.$row->flowchart)}}" style="max-width: 60px; max-height: 100px;">
                    </div>
                  </td>
                  <td>{{$row->current_condition}}</td>
                  <td>{{$row->kendala}}</td>
                  <td>{{$row->ruang_lingkup}}</td>
                  <td>
                    <div style="display: flex; align-items: center; justify-content: center; height: 100px;">
                      <img src="{{asset('gambarflowchart/'.$row->uploaddata)}}" style="max-width: 60px; max-height: 100px;">
                    </div>
                  </td>
                  <td>
                    <a href="{{ route('formrequestapprove', $row->id) }}" class="btn btn-success mb-2">Approve</a>
                    <a href="{{ route('formrequestreject', $row->id) }}" class="btn btn-danger mb-2">Reject</a>
                  </td>
                  <td style="width: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%px;">
                    <a href="/updaterequest/{{$row->id}}" class="btn btn-info mb-2"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                    <a href="#" class="btn btn-danger delete mb-2" data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                    <a target="_blank" href="/download_pdf/{{$row->id}}" class="btn btn-success mb-1"><i class="fas fa-file-pdf" style="color: #ffffff;"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

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
</div>
