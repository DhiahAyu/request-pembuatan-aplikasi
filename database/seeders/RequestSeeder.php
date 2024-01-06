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
            'current_condition' =>'Kondisi submited',
            'kendala' =>'Kendala submited',
            'ruang_lingkup' =>'Ruang Lingkup submited',
            'status' => 'Pending',
            'action' => 'submit',
            'formsfill' => '1/3',
        ],[
            'nama_aplikasi' =>'App Draft',
            'sponsor_proyek' =>'Sponsor Draft',
            'latar_belakang' =>'Latar Belakang Draft',
            'tujuan' =>'Tujuan Draft',
            'wanted_feature' =>'Fitur Draft',
            'current_condition' =>'Kondisi Draft',
            'kendala' =>'Kendala Draft',
            'ruang_lingkup' =>'Ruang Lingkup Draft',
            'status' => 'Not Yet Submitted',
            'action' => 'saveDraft',
            'formsfill' => '1/3',
        ],[
            'nama_aplikasi' =>'App Approve',
            'sponsor_proyek' =>'Sponsor Approve',
            'latar_belakang' =>'Latar Belakang Approve',
            'tujuan' =>'Tujuan Approve',
            'wanted_feature' =>'Fitur Approve',
            'current_condition' =>'Kondisi Approve',
            'kendala' =>'Kendala Approve',
            'ruang_lingkup' =>'Ruang Lingkup Approve',
            'status' => 'Approved',
            'action' => 'submit',
            'formsfill' => '1/3',
        ],[
            'nama_aplikasi' =>'App Rejected',
            'sponsor_proyek' =>'Sponsor Rejected',
            'latar_belakang' =>'Latar Belakang Rejected',
            'tujuan' =>'Tujuan Rejected',
            'wanted_feature' =>'Fitur Rejected',
            'current_condition' =>'Kondisi Rejected',
            'kendala' =>'Kendala Rejected',
            'ruang_lingkup' =>'Ruang Lingkup Rejected',
            'status' => 'Rejected',
            'action' => 'submit',
            'formsfill' => '1/3',
        ]]);
    }
}
