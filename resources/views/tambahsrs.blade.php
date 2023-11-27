@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <h1> Form SRS</h1>
    <div class="container" style="margin: 2%">
        <div class="card col-10 mx-auto">
            <div class="card-body">
                {{-- -----input form SRS----- --}}
                <form action="{{ route('modul.store') }}" method="POST" id="modulForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_id" value="{{ $formRequest->id }}">
                    <div class="container mb-3">
                        <button type="button" class="btn btn-success" id="addNamaModul"><i class="fas fa-solid fa-plus" style="color: #ffffff;"> Modul</i></button>
                        <button type="button" class="btn btn-success" id="removeNamaModul"><i class="fas fa-solid fa-minus"></i></button>
                    </div>
                    <div class="container" id="tambah_modul">
                        <!-- Modul elements will be dynamically added here -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" value="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let countermodul = 1;

    $(document).ready(function () {
        $('#addNamaModul').click(function () {
            countermodul++;
            let newInputan = `
                <div class="form-group mb-3" id="modul-${countermodul}">
                    <label for="nama_modul">Nama Modul ke- ${countermodul}</label>
                    <input type="text" class="form-control" name="modul[${countermodul}][nama_modul]" id="nama_modul-${countermodul}">
                    <div class="container mb-3">
                        <button type="button" class="btn btn-success addReqBtn" data-modul-id="${countermodul}"><i class="fas fa-solid fa-plus" style="color: #ffffff;"></i></button>
                        <button type="button" class="btn btn-success removeReqBtn" data-modul-id="${countermodul}"><i class="fas fa-solid fa-minus"></i></button>
                    </div>
                    <div class="form-group mb-3 row" style="margin-top: 10px;" id="tambah_req-${countermodul}">
                        <!-- Requirement elements will be dynamically added here -->
                    </div>
                </div>`;
            $('#tambah_modul').append(newInputan);
        });

        $('#removeNamaModul').click(function () {
            if (countermodul === 0) {
                alert("Minimal harus ada 1 nama_modul");
            } else {
                $('#modul-' + countermodul).remove();
                countermodul--;
            }
        });

        $(document).on('click', '.addReqBtn', function () {
            let modulId = $(this).data('modul-id');
            let counterReq = $('#tambah_req-' + modulId + ' textarea').length + 1;

            let newRequirement = `
                <div class="form-group mb-3 row" style="margin-top: 10px;">
                    <label class="col-3" style="text-align:center; vertical-align: middle;">Requirement ke- ${counterReq}</label>
                    <div class="col-9">
                        <textarea class="form-control" name="modul[${id}][requirements][][requirement]" id="message-text-${id}-${counterReq}"></textarea>
                    </div>
                </div>`;

            $('#tambah_req-' + id).append(newRequirement);
        });

        $(document).on('click', '.removeReqBtn', function () {
            let modulId = $(this).data('modul-id');
            let counterReq = $('#tambah_req-' + modulId + ' textarea').length;

            if (counterReq === 1) {
                alert(`Minimal harus ada 1 requirement untuk Modul ke-${modulId}`);
            } else {
                $('#tambah_req-' + modulId + ' .form-group:last-child').remove();
            }
        });

        // Other JavaScript logic for form handling...

    });
</script>


@endsection
