@extends('layout.admin')

@section('content')
  <div style="margin: 60px">
    <h1 class="text-center p-2 mb-3"> FORM REQUEST</h1>
    <div class="container">
      <div class="row justify-content-center">
      <form action="/insertdata" method="POST" enctype="multipart/form-data">
        @csrf
        <h5 class="mb-2 text-center">FORMULIR PERMINTAAN PEMBANGUNAN APLIKASI TI</h5>
          <div class="form-floating mb-3">
            <input type="text" name="nama_aplikasi" class="form-control" id="floatingNamaapp" placeholder="Nama Aplikasi" value="{{old('nama_aplikasi')}}">
            <label for="floatingNamaapp">NAMA APLIKASI</label>
            @error('nama_aplikasi')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="sponsor_proyek" class="form-control" id="floatingSponsor" value="{{old('sponsor_proyek')}}" placeholder="Nama Sponsor Proyek Pejabat Kerja Unit Pemohon">
          <label for="floatingSponsor">SPONSOR PROYEK</label>
            @error('sponsor_proyek')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" name="latar_belakang" placeholder="Deskripsi Singkat Latar Belakang Pembuatan Aplikasi" id="floatingLatarbelakang" style="height: 100px">{{ old('latar_belakang') }}</textarea>
            <label for="floatingLatarbelakang">LATAR BELAKANG</label>
            @error('latar_belakang')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>        
        <div class="form-floating mb-3">
            <input type="text" name="tujuan" class="form-control" value="{{old('tujuan')}}" id="floatingTujuan" placeholder="Tujuan Dari Pembangunan Aplikasi">
            <label for="floatingTujuan">TUJUAN</label>
            @error('tujuan')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>

          <h5 class="mb-2 text-center">PERSYARATAN/FITUR/MODUL YANG DIINGINKAN</h5>
          <div class="form mb-3">
          <textarea class="form-control" name="wanted_feature" placeholder="Fitur Yang Diinginkan Untuk Pembangunan Aplikasi" id="floatingFitur" style="height: 100px">{{ old('wanted_feature') }}</textarea>
          @error('wanted_feature')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h5 class="mb-2 text-center">FLOWCHART</h5>
        <div class="input-group mb-3" >
          <input type="file" name="flowchart[]" multiple class="form-control" id="inputFileFlowchart" aria-describedby="inputFileAddon" aria-label="Upload" value="{{old('flowchart')}}">
        </div>
        @error('flowchart')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        <h5 class="mb-2 text-center">KONDISI SAAT INI</h5>
        <div class="form mb-3">
          <textarea class="form-control" name="current_condition" placeholder="Kondisi Saat Ini Sebelum System Diimplementasikan" id="floatingKondisi" style="height: 65px" value="{{old('current_condition')}}"></textarea>
          @error('current_condition')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h5 class="mb-2 text-center">KENDALA KHUSUS</h5>
        <div class="form mb-3">
          <textarea class="form-control" name="kendala" placeholder="Jika Ada Isilah Kendala Khusus Apabila Aplikasi Diimplementasikan" id="floatingKendala" style="height: 65px" value="{{old('kendala')}}"></textarea>
          @error('kendala')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h5 class="mb-2 text-center">RUANG LINGKUP</h5>
        <div class="form mb-3">
          <textarea class="form-control" name="ruang_lingkup" placeholder="Ruang Lingkup Pengguna, Sistem, dan Implementasi Pembangunan Aplikasi yang Diinginkan" id="floatingLingkup" style="height: 65px" value="{{old('ruang_lingkup')}}"></textarea>
          @error('ruang_lingkup')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h5 class="mb-2 text-center">UPLOAD DATA</h5>
        <div class="input-group mb-3" >
          <input type="file" name="uploaddata[]" multiple class="form-control" id="inputFileUploaddata" aria-describedby="inputFileAddon" aria-label="Upload" style="width: 100%; margin-bottom:6px;" value="{{old('uploaddata')}}">
          @error('uploaddata')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <input type="hidden" name="action" id="formAction" value="">
        <div class="row" style="width: 100%; margin-top:6px;">	
          <div class="col-6 mb-4">
            <button type="submit" class="btn btn-info" name="action" value="saveDraft" style="width: 100%">Save Draft</button>
          </div>
          <div class="col-6 mb-4">
            <button type="submit" class="btn btn-success" name="action" value="submit" style="width: 100%">Submit</button>
          </div>								
  </div>
      </form>
      </div>
      </div>
      </div>
      </div>
    </div>

    
    <script>
      document.getElementById('submitButton').addEventListener('click', function (e) {
          e.preventDefault();
          // Lakukan apa yang Anda inginkan saat tombol "Submit" ditekan
          // Ini bisa termasuk pengiriman data ke rute /insertdata atau rute yang sesuai dengan fetch API.
          fetch('/insertdata', {
            method: 'POST',
            body: new FormData(document.querySelector('form')),
          })
          .then(response => {
            if (response.ok) {
              // Proses response jika berhasil, seperti menampilkan pesan sukses
              alert('Data berhasil disubmit');
            } else {
              // Proses response jika terjadi kesalahan
              alert('Terjadi kesalahan saat submit data');
            }
          });
      });
      document.getElementById('saveDraftButton').addEventListener('click', function (e) {
          e.preventDefault();
          // Lakukan apa yang Anda inginkan saat tombol "Save Draft" ditekan
          // Ini bisa termasuk pengiriman data ke rute yang berbeda atau menyimpan sebagai draft dengan JavaScript.
          // Contoh menggunakan fetch API:
          fetch('/saveasdraft', {
            method: 'POST',
            body: new FormData(document.querySelector('form')),
          })
          .then(response => {
            if (response.ok) {
              // Proses response jika berhasil, seperti menampilkan pesan sukses
              alert('Data disimpan sebagai draft');
            } else {
              // Proses response jika terjadi kesalahan
              alert('Terjadi kesalahan saat menyimpan sebagai draft');
            }
          });
      });
    </script>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</div>
@endsection
