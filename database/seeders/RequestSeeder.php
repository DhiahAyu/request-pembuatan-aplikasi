<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('formrequests')->insert([[
            'nama_aplikasi' =>'App submited',
            'sponsor_proyek' =>'Sponsor submited',
            'latar_belakang' =>'Latar Belakang submited',
            'tujuan' =>'Tujuan submited',
            'wanted_feature' =>'Fitur submited',
            'flowchart' =>'Flowchart submited',
            'current_condition' =>'Kondisi submited',
            'kendala' =>'Kendala submited',
            'ruang_lingkup' =>'Ruang Lingkup submited',
            'uploaddata' =>'Upload Data submited',
            'status' => 'Pending',
            'action' => 'submit',
        ],[
            'nama_aplikasi' =>'App Draft',
            'sponsor_proyek' =>'Sponsor Draft',
            'latar_belakang' =>'Latar Belakang Draft',
            'tujuan' =>'Tujuan Draft',
            'wanted_feature' =>'Fitur Draft',
            'flowchart' =>'Flowchart Draft',
            'current_condition' =>'Kondisi Draft',
            'kendala' =>'Kendala Draft',
            'ruang_lingkup' =>'Ruang Lingkup Draft',
            'uploaddata' =>'Upload Data Draft',
            'status' => 'Not Yet Submitted',
            'action' => 'saveDraft',
        ],[
            'nama_aplikasi' =>'App Approve',
            'sponsor_proyek' =>'Sponsor Approve',
            'latar_belakang' =>'Latar Belakang Approve',
            'tujuan' =>'Tujuan Approve',
            'wanted_feature' =>'Fitur Approve',
            'flowchart' =>'Flowchart Approve',
            'current_condition' =>'Kondisi Approve',
            'kendala' =>'Kendala Approve',
            'ruang_lingkup' =>'Ruang Lingkup Approve',
            'uploaddata' =>'Upload Data Approve',
            'status' => 'Approved',
            'action' => 'submit',
        ],[
            'nama_aplikasi' =>'App Rejected',
            'sponsor_proyek' =>'Sponsor Rejected',
            'latar_belakang' =>'Latar Belakang Rejected',
            'tujuan' =>'Tujuan Rejected',
            'wanted_feature' =>'Fitur Rejected',
            'flowchart' =>'Flowchart Rejected',
            'current_condition' =>'Kondisi Rejected',
            'kendala' =>'Kendala Rejected',
            'ruang_lingkup' =>'Ruang Lingkup Rejected',
            'uploaddata' =>'Upload Data Rejected',
            'status' => 'Rejected',
            'action' => 'submit',
        ]]);
    }
}
