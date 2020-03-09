<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['name'=>'Admin', 'photo'=>'/storage/profile_photo/1583731751.png' ,'email'=>'admin@gmail.com', 'password'=>Hash::make('123456789'), 'password_length'=>'9', 'storage_limit'=>'0']
        )->assignRole('Admin');
    }

