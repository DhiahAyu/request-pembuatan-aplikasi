@extends('layout.admin')

@section('content')

<div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
        </div>
<h1 class="text-center p-2">Quality Control</h1>

    <div class="container">
    <a href="/tambahdataqc" class="btn btn-success mb-2">Tambah +</a>
        <div class="row">
          <div class="col">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" style="text-align: center;">#</th>
                  <th scope="col" style="text-align: center;">Versi</th>
                  <th scope="col" style="text-align: center;">Dibuat oleh</th>
                  <th scope="col" style="text-align: center;">Tanggal Revisi Dokumen</th>
                  <th scope="col" style="text-align: center;">Disetujui Oleh</th>
                  <th scope="col" style="text-align: center;">Tanggal Persetujuan</th>
                  <th scope="col" style="text-align: center;">Keterangan</th>
                  <th scope="col" style="text-align: center;">Nama Aplikasi</th>
                  <th scope="col" style="text-align: center;">Versi Aplikasi</th>
                  <th scope="col" style="text-align: center;">Release Aplikasi</th>
                  <th scope="col" style="text-align: center;">Tanggal Pengujian</th>
                  <th scope="col" style="text-align: center;">ID Test Case</th>
                  <th scope="col" style="text-align: center;">Pass</th>
                  <th scope="col" style="text-align: center;">Fail</th>
                  <th scope="col" style="text-align: center;">Catatan</th>
                  <th scope="col" style="text-align: center;">Jumlah Test Case</th>
                  <th scope="col" style="text-align: center;">Jumlah Test Case yang berhasil</th>
                  <th scope="col" style="text-align: center;">Jumlah Test Case yang ditemukan error/bug</th>
                  <th scope="col" style="text-align: center;">Nomor</th>
                  <th scope="col" style="text-align: center;">Aspek Infrastruktur</th>
                  <th scope="col" style="text-align: center;">Hasil Pengetesan</th>
                  <th scope="col" style="text-align: center;">Catatan</th>
                  <th scope="col" style="text-align: center;">Nama Ketua Tim Evaluasi</th>
                  <th scope="col" style="text-align: center;">Nama QC</th>
                  <th scope="col" style="text-align: center;">TTD Ketua Tim Evaluasi</th>
                  <th scope="col" style="text-align: center;">TTD QC</th>
                  <th scope="col" style="text-align: center;">Nama Project Controller</th>
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
                  <td>{{$row->versi}}</td>
                  <td>{{$row->dibuat}}</td>
                  <td>{{$row->tglrevisi}}</td>       
                  <td>{{$row->disetujui}}</td>
                  <td>{{$row->tglpersetujuan}}</td>
                  <td>{{$row->keterangan}}</td>
                  <td>{{$row->namaapp}}</td>
                  <td>{{$row->versiapp}}</td>
                  <td>{{$row->releaseapp}}</td>
                  <td>{{$row->tglpengujian}}</td>
                  <td>{{$row->idcase}}</td>       
                  <td>{{$row->pass}}</td>
                  <td>{{$row->fail}}</td>
                  <td>{{$row->catatan}}</td>
                  <td>{{$row->jumlahcase}}</td>
                  <td>{{$row->caseberhasil}}</td>
                  <td>{{$row->caseeror}}</td>
                  <td>{{$row->nomor}}</td>
                  <td>{{$row->aspekinfrastruktur}}</td>
                  <td>{{$row->hasiltes}}</td>       
                  <td>{{$row->catatann}}</td>
                  <td>{{$row->namatimevaluasi}}</td>
                  <td>{{$row->namaqc}}</td>
                  <td>
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $row->ttdtimevaluasi) }}" alt="ttdtimevaluasi"  style="max-width: 60px; max-height: 100px;">
                    </div>
                  </td>
                  <td>
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $row->ttdtimqc) }}" alt="ttdtimqc"  style="max-width: 60px; max-height: 100px;">
                    </div>
                  </td>
                  <td>{{$row->namapc}}</td>
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