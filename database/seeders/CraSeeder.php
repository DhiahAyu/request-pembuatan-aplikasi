<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formcras')->insert(
            [[
            'cr_analyst' =>'Nama CR Submit to Digiport',
            'originator_name' =>'Originator Submit to Digiport',
            'data_owner' =>'Data Owner Submit to Digiport',
            'date' =>'Date Submit to Digiport',
            'project_name' =>'Project Name Submit to Digiport',
            'impact_areas' =>'Impact Areas Submit to Digiport',
            'priority' =>'Priority Submit to Digiport',
            'justifcation_major' =>'Justifcation Major Submit to Digiport',
            'justifcation_minor' =>'Justifcation Minor Submit to Digiport',
            'general_context' =>'General Context Submit to Digiport',
            'pontential_cost' =>'Pontential Cost Submit to Digiport',
            'alternative_solutions' =>'Alternative Solutions Submit to Digiport',
            'support' =>'Support Submit to Digiport',
            'infrastructure' =>'Infrastructure Submit to Digiport',
            'additional' =>'Additional Submit to Digiport',
            'actioncra'=>'0',
            'kirimke'=>'Digiport'
            ],
            [
                'cr_analyst' =>'Nama CR Submit to Planning',
                'originator_name' =>'Originator Submit to Planning',
                'data_owner' =>'Data Owner Submit to Planning',
                'date' =>'Date Submit to Planning',
                'project_name' =>'Project Name Submit to Planning',
                'impact_areas' =>'Impact Areas Submit to Planning',
                'priority' =>'Priority Submit to Planning',
                'justifcation_major' =>'Justifcation Major Submit to Planning',
                'justifcation_minor' =>'Justifcation Minor Submit to Planning',
                'general_context' =>'General Context Submit to Planning',
                'pontential_cost' =>'Pontential Cost Submit to Planning',
                'alternative_solutions' =>'Alternative Solutions Submit to Planning',
                'support' =>'Support Submit to Planning',
                'infrastructure' =>'Infrastructure Submit to Planning',
                'additional' =>'Additional Submit to Planning',
                'actioncra'=>'0',
                'kirimke'=>'Planning'
            ],
            [
                'cr_analyst' =>'Nama CR Draft',
                'originator_name' =>'Originator Draft',
                'data_owner' =>'Data Owner Draft',
                'date' =>'Date Draft',
                'project_name' =>'Project Name Draft',
                'impact_areas' =>'Impact Areas Draft',
                'priority' =>'Priority Draft',
                'justifcation_major' =>'Justifcation Major Draft',
                'justifcation_minor' =>'Justifcation Minor Draft',
                'general_context' =>'General Context Draft',
                'pontential_cost' =>'Pontential Cost Draft',
                'alternative_solutions' =>'Alternative Solutions Draft',
                'support' =>'Support Draft',
                'infrastructure' =>'Infrastructure Draft',
                'additional' =>'Additional Draft',
                'actioncra'=>'1',
                'kirimke' => 'Draft'
            ]
        ]);
    }
}
