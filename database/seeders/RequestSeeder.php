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
        DB::table('formrequests')->insert([
            'nama_aplikasi' =>'App1',
            'sponsor_proyek' =>'Sponsor1',
            'latar_belakang' =>'Latar Belakang 1',
            'tujuan' =>'Tujuan 1',
            'wanted_feature' =>'Fitur 1',
            'flowchart' =>'Flowchart 1',
            'current_condition' =>'Kondisi 1',
            'kendala' =>'Kendala 1',
            'ruang_lingkup' =>'Ruang Lingkup 1',
            'uploaddata' =>'Upload Data 1'
        ]);
    }
}
