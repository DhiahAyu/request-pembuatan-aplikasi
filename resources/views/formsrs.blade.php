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
<h1 class="text-center p-2">Data Form Request Change Analysis</h1>

    <div class="container">
    <a href="/tambahsrs" class="btn btn-success mb-2">Tambah +</a>
        <div class="row">
          <div class="col">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" style="text-align: center;">#</th>
                  <th scope="col" style="text-align: center;">Nama Modul</th>
                  <th scope="col" style="text-align: center;">Requirement</th>
                  {{-- <th scope="col" style="text-align: center;">Data Owner</th>
                  <th scope="col" style="text-align: center;">Date CRA Assigned</th>
                  <th scope="col" style="text-align: center;">Project Name</th>
                  <th scope="col" style="text-align: center;">Impact Areas</th>
                  <th scope="col" style="text-align: center;">Priority</th>
                  <th scope="col" style="text-align: center;">Justification of change for major development</th>
                  <th scope="col" style="text-align: center;">Justification of change for minor development</th>
                  <th scope="col" style="text-align: center;">General Context for Data Integration</th>
                  <th scope="col" style="text-align: center;">Potential cost and extra time consideration?</th>
                  <th scope="col" style="text-align: center;">Alternative Solutions Considered</th>
                  <th scope="col" style="text-align: center;">Support from other parties</th>
                  <th scope="col" style="text-align: center;">Infrastructure and Security</th>
                  <th scope="col" style="text-align: center;">Additional Information/Comments</th> --}}
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @if(isset($data))
                @foreach ($data as $row)
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{$row->nama_modul}}</td>
                  <td>{{$row->requirement}}</td>       
                  {{-- <td>{{$row->data_owner}}</td>
                  <td>{{$row->date}}</td>
                  <td>{{$row->project_name}}</td>
                  <td>{{$row->impact_areas}}</td>
                  <td>{{$row->priority}}</td>
                  <td>{{$row->justifcation_major}}</td>
                  <td>{{$row->justifcation_minor}}</td>
                  <td>{{$row->general_context}}</td>       
                  <td>{{$row->pontential_cost}}</td>
                  <td>{{$row->alternative_solutions}}</td>
                  <td>{{$row->support}}</td>
                  <td>{{$row->infrastructure}}</td>
                  <td>{{$row->additional}}</td> --}}
                  {{-- <td style="width: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%px;">
                    <a href="/updaterequests/{{$row->id}}" class="btn btn-info mb-2"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                    <a href="/delete" class="btn btn-danger delete mb-2" data-id="{{$row->id}}" data-nama="{{$row->nama_aplikasi}}"><i class="fas fa-trash" style="color: #ffffff;"></i></a>
                  </td> --}}
                </tr>
                @endforeach
                @endif
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
    {{-- <script>
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

    </script> --}}
</div>
@endsection