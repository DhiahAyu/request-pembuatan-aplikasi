@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <h1> Form SRS</h1>
    <div class="container" style="margin: 2%">
        <div class="card col-10 mx-auto">
            <div class="card-body">
                {{-- -----input form SRS----- --}}
                <form action="{{ route('modul.store') }}" method="POST" id="modulForm">
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
                <div class="form-group mb-3">
                    <label for="nama_modul">Nama Modul ke- ${countermodul}</label>
                    <input type="text" class="form-control" name="modul[${countermodul}][nama_modul]" id="nama_modul-${countermodul}">
                    <div class="container mb-3">
                        <button type="button" class="btn btn-success" id="addReq-${countermodul}"><i class="fas fa-solid fa-plus" style="color: #ffffff;"></i></button>
                        <button type="button" class="btn btn-success" id="removeReq-${countermodul}"><i class="fas fa-solid fa-minus"></i></button>
                    </div>
                    <div class="form-group mb-3 row" style="margin-top: 10px;" id="tambah_req-${countermodul}">
                        <label class="col-3" style="text-align:center; vertical-align: middle;">Requirement ke- 1</label>
                        <div class="col-9">
                            <textarea class="form-control" name="modul[${countermodul}][requirements][][requirement]" id="message-text-${countermodul}-1"></textarea>
                        </div>
                    </div>
                </div>`;
            $('#tambah_modul').append(newInputan);
        });

        $('#removeNamaModul').click(function () {
            if (countermodul === 1) {
                alert("Minimal harus ada 1 nama_modul");
            } else {
                $('#nama_modul-' + countermodul).closest('.form-group').remove();
                $('#tambah_req-' + countermodul).remove(); // Remove associated Requirement elements
                countermodul--;
            }
        });

        $(document).on('click', '[id^=addReq-]', function () {
            let id = this.id.split('-')[1];
            let counterReq = $('#tambah_req-' + id + ' textarea').length + 1;

            let newRequirement = `
                <div class="form-group mb-3 row" style="margin-top: 10px;">
                    <label class="col-3" style="text-align:center; vertical-align: middle;">Requirement ke- ${counterReq}</label>
                    <div class="col-9">
                        <textarea class="form-control" name="modul[${id}][requirements][][requirement]" id="message-text-${id}-${counterReq}"></textarea>
                    </div>
                </div>`;

            $('#tambah_req-' + id).append(newRequirement);
        });

        $(document).on('click', '[id^=removeReq-]', function () {
            let id = this.id.split('-')[1];
            let counterReq = $('#tambah_req-' + id + ' textarea').length;

            if (counterReq === 1) {
                alert(`Minimal harus ada 1 requirement untuk Modul ke-${id}`);
            } else {
                $('#tambah_req-' + id + ' .form-group:last-child').remove();
            }
        });
        // Other JavaScript logic for form handling...

    });
</script>

@endsection
