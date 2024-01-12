@extends('layout.admin')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$totalData}}</h3>

            <p>Total Data Masuk</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-box-arrow-in-down"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$totalApproved}} </h3>
            <p>Approved</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-check-lg"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>
                {{$totalRejected}}
            </h3>

            <p>Rejected</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-x-lg"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
                {{$totalPending}}
            </h3>
            <p>Pending</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-hourglass-bottom"></i>
          </div>
        </div>
    </div>
<div class="content">
    <div class="col-12 mt-4">
        <div class="card">
<div class="card-header border-0" style="background-color: #2a78ac">
    <div class="justify-content-between" style="text-justify:center;">
        <h3 class="text-center" style="color: #fffffff0"><strong>APPLICATION REQUEST ADMIN</strong></h3>
    </div>
</div>
<div class="card-body">
    <div class="d-flex">
        <table class="table table-bordered col-12">
            <thead class="thead" style="background-color: #5b60662a">
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
                   $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                @endphp
                @foreach ($data as $row)
                    @if(in_array($row->status, ['Pending', 'Approved', 'Rejected']))
                        <tr style="text-align: center; align-items: center;">
                            <th scope="row">{{$no++}}</th>
                            <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                            <td>{{$row->nama_aplikasi}}</td>
                            <td>{{$row->sponsor_proyek}}</td>
                            @if ($row->status=='Pending')
                                <td><h5><span class="badge badge-pill badge-warning"><i class="bi bi-clock" style="color: rgb(245, 240, 240)"></i></span></h5></td>
                            @endif
                            @if ($row->status=='Approved')
                                <td><h5><span class="badge badge-pill badge-success"><i class="bi bi-check2-circle"></i></span></h5></td>
                            @endif
                            @if ($row->status=='Rejected')
                                <td><h5><span class="badge badge-pill badge-danger"><i class="bi bi-x-circle"></i></span></h5></td>
                            @endif
                            <td>
                                {{-- @if ($row->status=='Approved'&& $row->formsfill == '4/3')
                                    <a href="/QC/{{ $row->id }}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-pen" style="color: #ffffff;"></i></a>
                                @endif --}}
                                @if ($row->status=='Approved'&& $row->formsfill == '4/3')
                                <a href="/viewqc/{{$row->cra->id}}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                {{-- <a href="/QC/{{ $row->id }}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-pen" style="color: #ffffff;"></i></a> --}}
                                @endif
                                @if ($row->status=='Approved'&& $row->formsfill == '2/3')
                                <a href="/viewcra/{{$row->cra->id}}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                {{-- <a href="/QC/{{ $row->id }}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-pen" style="color: #ffffff;"></i></a> --}}
                                @endif
                                @if ($row->status=='Approved'&& $row->formsfill == '1/3')
                                    <a href="/tambahdatacra/{{ $row->id }}" class="btn btn-success" style="border-radius: 10px"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> CRA</i></a>
                                @endif
                                @if ($row->status=='Approved'&& $row->formsfill == '2/3'||$row->formsfill == '3/3')
                                {{-- <a href="/viewcra/{{$row->cra->id}}" class="btn btn-info" style="border-radius: 10px"><i class="fas fa-solid fa-eye" style="color: #ffffff;"></i></a> --}}
                                {{-- <a href="/QC/{{ $row->id }}" class="btn btn-info"><i class="fas fa-pen" style="color: #ffffff;"></i></a> --}}
                                @endif
                                @if ($row->status=='Approved'&& $row->formsfill == '3/3')
                                <a href="/QC/{{ $row->id }}" class="btn btn-info"><i class="fas fa-plus" style="color: #ffffff;"> QC</i></a>
                                @endif
                                @if ($row->status=='Pending')
                                    <a href="{{ route('formrequestapprove', $row->id) }}" class="btn btn-success"><i class="bi bi-check-lg"></i></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $row->id }}"><i class="bi bi-x-lg"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                @endif
                                @if ($row->status=='Rejected') 
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
    </div>
    {{ $data->links() }}
</div>


<!--content-->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
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
    </div>
</div>
</div>
@endsection
