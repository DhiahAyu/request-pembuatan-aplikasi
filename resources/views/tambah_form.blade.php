<!-- resources/views/tambah_form.blade.php -->

@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </div>

    <!--content-->
    <h1 class="text-center p-2">Tambah Data</h1>

    <div class="container">
        <form action="{{ route('tambah.simpan') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="namamoduls" class="form-label">Nama Modul</label>
                <input type="text" class="form-control" id="namamoduls" name="namamoduls" required>
            </div>
            <div class="mb-3">
                <label for="requirement" class="form-label">Requirement</label>
                <input type="text" class="form-control" id="requirement" name="requirement" required>
            </div>
            <!-- Tambahkan input untuk kolom lain jika diperlukan -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

</div>

@endsection
