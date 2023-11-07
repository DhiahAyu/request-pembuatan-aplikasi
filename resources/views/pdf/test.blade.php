<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    </head>
    <style>
        div.title{
            background-color: #4472C4;
            color: white;
            font-family: sans-serif;
            font-size: calc(var(--scale-factor)*11.04px);
        }
        
        .content-container {
        text-align: center;
        }

        .image-container {
        width: 300px;
        height: 300px;
        margin: 0 auto;
        overflow: hidden; /* Ini akan memastikan gambar yang melebihi ukuran tidak ditampilkan */
        }

        .image-container img {
        max-width: 100%;
        max-height: 100%;
        margin: 5px auto 5px;
        display: block;
        margin: 0 auto;
        }
</style>
    <body>
        <table class="" width="100%" border="1">

            <tbody class="p-3">
                <tr>
                    <td colspan="2">
                        <div class="title bg-blue" align="center" role="presentation" dir="ltr"><strong>FORMULIR PERMINTAAN PEMBANGUNAN APLIKASI TI</strong></div>
                    </td>
                </tr>
                <tr class="p-2">
                    <td width="24%"><strong>Nama Aplikasi</strong></td>
                    <td width="76%"> {{$formrequest->nama_aplikasi}}</td>
                    <!-- <input required="" name="PROJECT_TITLE" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" value=""></td> -->
                </tr>
                <tr class="p-2">
                    <td width="24%"><strong>Sponsor Proyek</strong></td>
                    <td width="76%"> {{$formrequest->sponsor_proyek}}</td>
                    <!-- <input required="" name="PROJECT_TITLE" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" value=""></td> -->
                </tr>
                <tr class="p-2">
                    <td width="24%"><strong>Latar Belakang</strong></td>
                    <td width="76%">{{$formrequest->latar_belakang}}</td>
                    <!-- <input required="" name="PROJECT_TITLE" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" value=""></td> -->
                </tr>
                <tr class="p-2">
                    <td width="24%"><strong>Tujuan</strong></td>
                    <td width="76%">{{$formrequest->tujuan}}</td>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="" width="100%" border="1">
            <tbody class="p-3">
                <tr>
                    <td colspan="2">
                        <div class="title" align="center" role="presentation" dir="ltr"><strong>PERSYARATAN/FITUR/MODUL YANG DIINGINKAN</strong></div>
                    </td>
                </tr>
                <tr class="p-2">
                    <td width="100%">
                        {{$formrequest->wanted_feature}}
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="" width="100%" border="1">
            <tbody class="p-3">
                <tr>
                    <td colspan="2">
                        <div class="title" align="center" role="presentation" dir="ltr"><strong>FLOWCHART</strong></div>
                    </td>
                </tr>
                <tr class="p-2">
                    <td width="100%">
                        <div class="content-container">
                            <div class="image-container">
                            <img src="data:image/png;base64,{{ base64_encode($imageData) }}" alt="Flowchart Image">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="" width="100%" border="1">
            <tbody class="p-3">
                <tr>
                    <td colspan="2">
                        <div class="title" align="center" role="presentation" dir="ltr"><strong>KONDISI SAAT INI</strong></div>
                    </td>
                </tr>
                <tr class="p-2">
                    <td width="100%">
                        {{$formrequest->current_condition}}    
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="" width="100%" border="1">
            <tbody class="p-3">
                <tr>
                    <td colspan="2">
                        <div class="title" align="center" role="presentation" dir="ltr"><strong>KENDALA KHUSUS</strong></div>
                    </td>
                </tr>
                <tr class="p-2">
                    <td width="100%">
                        {{$formrequest->kendala}}    
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="" width="100%" border="1">
            <tbody class="p-3">
                <tr>
                    <td colspan="2">
                        <div class="title" align="center" role="presentation" dir="ltr"><strong>RUANG LINGKUP</strong></div>
                    </td>
                </tr>
                <tr class="p-2">
                    <td width="100%">
                    {{$formrequest->ruang_lingkup}}
                </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>