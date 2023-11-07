<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>APLIKASI CRUD</title>
  </head>
  <body style="background: #454D55;color: rgb(227, 227, 227);";>
    <h1 class="text-center p-2 mb-3"> EDIT DATA FORM REQUEST</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card p-3" style="background: #343A40;color: rgb(227, 227, 227);";>
                    <div class="card-body">    
                        <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-2 text-center">FORMULIR PERMINTAAN PEMBANGUNAN APLIKASI TI</h5>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_aplikasi" class="form-control" id="floatingNamaapp" placeholder="NamaApp" value="{{$data->nama_aplikasi}}" style="background: #343A40;color: rgb(227, 227, 227);";>
                                <label for="floatingNamaapp">Nama Aplikasi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="sponsor_proyek" class="form-control" id="floatingSponsor" placeholder="NamaSponsor" value="{{$data->sponsor_proyek}}" style="background: #343A40;color: rgb(227, 227, 227);";>
                                <label for="floatingSponsor">Sponsor Proyek</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="latar_belakang" placeholder="Deskripsi Singkat Aplikasi" id="floatingLatarbelakang" style="height: 100px; background: #343A40;color: rgb(227, 227, 227);">{{$data->latar_belakang}}</textarea>
                                <label for="floatingLatarbelakang">Latar Belakang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="tujuan" class="form-control" id="floatingTujuan" placeholder="Tujuan" value="{{$data->tujuan}}" style="background: #343A40;color: rgb(227, 227, 227);";>
                                <label for="floatingTujuan">Tujuan</label>
                            </div>

                            <h5 class="mb-2 text-center">PERSYARATAN/FITUR/MODUL YANG DIINGINKAN</h5>
                            <div class="form mb-3">
                                <textarea class="form-control" name="wanted_feature" placeholder="Fitur Yang Diinginkan" id="floatingFitur" style="height: 100px; background: #343A40;color: rgb(227, 227, 227);">{{$data->wanted_feature}}</textarea>
                                <label for="floatingFitur"></label>
                            </div>
                            <h5 class="mb-2 text-center">FLOWCHART</h5>
                            <div class="input-group mb-3">
                                <input type="file" name="flowchart" class="form-control" id="inputFileFlowchart" aria-describedby="inputFileAddon" style="background: #343A40;color: rgb(227, 227, 227);";>
                                <span class="input-group-text" id="inputFileAddon">{{$data->flowchart}}</span>
                            </div>

                            <h5 class="mb-2 text-center">KONDISI SAAT INI</h5>
                            <div class="form mb-3">
                                <textarea class="form-control" name="current_condition" placeholder="Kondisi saat ini" id="floatingKondisi" style="height: 65px; background: #343A40;color: rgb(227, 227, 227);">{{$data->current_condition}}</textarea>
                                <label for="floatingKondisi"></label>
                            </div>
                            <h5 class="mb-2 text-center">KENDALA KHUSUS</h5>
                            <div class="form mb-3">
                                <textarea class="form-control" name="kendala" placeholder="Kendala" id="floatingKendala" style="height: 65px; background: #343A40;color: rgb(227, 227, 227);">{{$data->kendala}}</textarea>
                                <label for="floatingKendala"></label>
                            </div>
                            <h5 class="mb-2 text-center">RUANG LINGKUP</h5>
                            <div class="form mb-3">
                                <textarea class="form-control" name="ruang_lingkup" placeholder="Ruang Linkup Pengguna" id="floatingLingkup" style="height: 65px; background: #343A40;color: rgb(227, 227, 227);">{{$data->ruang_lingkup}}</textarea>
                                <label for="floatingLingkup"></label>
                            </div>
                            <h5 class="mb-2 text-center">UPLOAD DATA</h5>
                            <div class="input-group mb-3">
                                <input type="file" name="uploaddata" class="form-control" id="inputFileFlowchart" aria-describedby="inputFileAddon" style="background: #343A40;color: rgb(227, 227, 227);";>
                                <span class="input-group-text" id="inputFileAddon">{{$data->uploaddata}}</span>
                            </div>
                            <button type="submit" class="btn btn-success">Tambah +</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>
