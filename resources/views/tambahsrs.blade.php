@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <h1> Form SRS</h1>
    <div class="container" style="margin: 2%">
        <div class="card col-10 mx-auto">
            <div class="card-header ui-sortable-handle">
                <!-- Button trigger pop up modul -->
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-solid fa-plus" style="color: #ffffff;"></i> Modul</a>
            </div>
            <div class="card-body">
                <form action="/insertdatasrs" method="POST">
                    @csrf
                    <table class="" width="100%" border="1">
                        <tr class="" style="align-items: center">
                            <td style="text-align: center;" width="25%"><strong class="">Modul ke-n</strong></td>
                            <td width="75%">
                                <div class="" width="75%">
                                    <div class="card card-primary collapsed-card" style="margin-top: 2%;margin-right: 2%;">
                                        <div class="card-header">
                                            <h3 class="card-title">Requirement ke-n</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse" style="margin-top:1%">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add New Modul</h3>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="col-3" for="nama_modul" style="text-align:center; vertical-align: middle; margin-top:1%;">Nama Modul</label>
                                                                <input type="text" class="form-control col-9" name="nama_modul" id="exampleInputPassword1">
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <div class="form-group mb-3 row" style="margin-top: 10px;" id="tambah_req">
                                                                <label class="col-3" for="requirement" style="text-align:center; vertical-align: middle;">Requirement ke-1</label>
                                                                <div class="col-9">
                                                                    <textarea class="form-control" name="requirement[]" id="message-text-1"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container  mb-3">
                                                            <button type="button" class="btn btn-success" id="addReq"><i class="fas fa-solid fa-plus" style="color: #ffffff;"></i></button>
                                                            <button type="button" class="btn btn-success" id="removeReq"><i class="fas fa-solid fa-minus"></i></button>
                                                        </div>
                                                        <div class="modal-footer mb-3">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" value="submit">Submit</button>
                                                        </div>
                                                        {{-- <div class="container">
                                                            <button type="button" class="btn btn-success" id="addReq"><i class="fas fa-solid fa-plus" style="color: #ffffff;"></i></button>
                                                            <button type="button" class="btn btn-success" id="removeReq"><i class="fas fa-solid fa-minus"></i></button>
                                                            <div class="form-group mb-3 row" style="margin-top: 10px;" id="tambah_req">
                                                                <label class="col-3" style="text-align:center; vertical-align: middle;">Requirement ke-1</label>
                                                                <div class="col-9">
                                                                    <textarea class="form-control" name="requirement[]" id="message-text"></textarea>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>   
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" value="submit">Submit</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let counter = 1;
        
            $(document).ready(function() {
                $('#addReq').click(function() {
                    counter++;
                    let newInputan = `
                        <div class="form-group mb-3 row" style="margin-top: 10px;">
                            <label class="col-3" style="text-align:center; vertical-align: middle;">Requirement ke- ${counter}</label>
                            <div class="col-9">
                                <textarea class="form-control" name="requirement[]" id="message-text-${counter}"></textarea>
                            </div>
                        </div>`;
                    
                    $('#tambah_req').append(newInputan);
                });
                
                $('#removeReq').click(function() {
                    if (counter === 1) {
                        alert("Minimal harus ada 1 requirement");
                    } else {
                        $(`#message-text-${counter}`).closest('.form-group').remove();
                        counter--;
                    }
                });
            });
        </script>
    @endsection