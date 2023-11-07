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
            [
            'cr_analyst' =>'CR 1',
            'originator_name' =>'Originator 1',
            'data_owner' =>'Data Owner 1',
            'date' =>'Date 1',
            'project_name' =>'Project Name 1',
            'impact_areas' =>'Impact Areas 1',
            'priority' =>'Priority 1',
            'justifcation_major' =>'Justifcation Major 1',
            'justifcation_minor' =>'Justifcation Minor 1',
            'general_context' =>'General Context 1',
            'pontential_cost' =>'Pontential Cost 1',
            'alternative_solutions' =>'Alternative Solutions 1',
            'support' =>'Support 1',
            'infrastructure' =>'Infrastructure 1',
            'additional' =>'Additional 1'

            ]
        );
    }
}
