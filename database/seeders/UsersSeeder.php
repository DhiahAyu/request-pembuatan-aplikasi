<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',                
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'role'=>'user',                
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'project',
                'email'=>'project@gmail.com',
                'role'=>'project',                
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'digiport',
                'email'=>'digiport@gmail.com',
                'role'=>'digiport',                
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'planning',
                'email'=>'planning@gmail.com',
                'role'=>'planning',                
                'password'=>bcrypt('12345'),
            ],
            
        ];

        foreach($userData as $key=> $val){
            User::create($val);
        }
    }
}
