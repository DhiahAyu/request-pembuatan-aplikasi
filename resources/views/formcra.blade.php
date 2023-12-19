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
        <div class="row">
          <div class="col">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" style="text-align: center;">#</th>
                  <th scope="col" style="text-align: center;">CR Analyst (CRA)</th>
                  <th scope="col" style="text-align: center;">Originator Name</th>
                  <th scope="col" style="text-align: center;">Data Owner</th>
                  <th scope="col" style="text-align: center;">Date CRA Assigned</th>
                  <th scope="col" style="text-align: center;">Project Name</th>
                  <th scope="col" style="text-align: center;">Impact Areas</th>
                  <th scope="col" style="text-align: center;">Priority</th>
                  <th scope="col" style="text-align: center;">Justification Major</th>
                  <th scope="col" style="text-align: center;">Justification Minor</th>
                  <th scope="col" style="text-align: center;">General Context</th>
                  <th scope="col" style="text-align: center;">Potential</th>
                  <th scope="col" style="text-align: center;">Alternative Solutions</th>
                  <th scope="col" style="text-align: center;">Support</th>
                  <th scope="col" style="text-align: center;">Akses User</th>
                  <th scope="col" style="text-align: center;">Topology Server</th>
                  <th scope="col" style="text-align: center;">Spesifikasi Server</th>
                  <th scope="col" style="text-align: center;">Software</th>
                  <th scope="col" style="text-align: center;">Tipe Data</th>
                  <th scope="col" style="text-align: center;">Komponen</th>
                  <th scope="col" style="text-align: center;">Frekuensi</th>
                  <th scope="col" style="text-align: center;">Lama Data</th>
                  <th scope="col" style="text-align: center;">Security</th>
                </tr>
              </thead>
              <tbody>
    @php
        $no = 1;
    @endphp
    @if(isset($data) && $data->count() > 0)
        @foreach ($data as $data)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $data->cr_analyst }}</td>
                <td>{{ $data->originator_name }}</td>
                <td>{{ $data->data_owner }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->project_name }}</td>
                <td>{{ $data->impact_areas }}</td>
                <td>{{ $data->priority }}</td>
                <td>{{ $data->justificationMajor }}</td>
                <td>{{ $data->justificationMinor }}</td>
                <td>{{ $data->general_context }}</td>
                <td>{{ $data->pontential_cost }}</td>
                <td>{{ $data->alternative_solutions }}</td>
                <td>{{ $data->support }}</td>
                <td>{{ $data->infrastructure }}</td>
                <td>{{ $data->additional }}</td>
                <td>{{ $data->akses_user }}</td>
                <td>{{ $data->topologi_server }}</td>
                <td>{{ $data->spesifikasi_server }}</td>
                <td>{{ $data->software }}</td>
                <td>{{ $data->tipe_data }}</td>
                <td>{{ $data->komponen_backup }}</td>
                <td>{{ $data->frekuensi_backup }}</td>
                <td>{{ $data->lama_backup }}</td>
                <td>{{ $data->security }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="27" class="text-center">No data available</td>
        </tr>
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