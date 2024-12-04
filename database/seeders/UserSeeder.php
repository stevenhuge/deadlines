<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'=>'Ridho Karunia Setiawan',
                'email'=>'awan@gmail.com',
                'password'=>Hash::make('123'),
                'role'=>'admin'
            ],
            [
                'name'=>'Bagas Surya',
                'email'=>'bagas@gmail.com',
                'password'=>Hash::make('123'),
                'role'=>'client'
            ],
            [
                'name'=>'Ahmad Lutfi',
                'email'=>"ahmad@gmail.com",
                'passowrd'=>Hash::make('123'),
                'role'=>'superadmin'
            ]
        ]);
    }
}
