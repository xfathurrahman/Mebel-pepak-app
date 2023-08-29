<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username'     => 'Super Admin',
            'name'         => 'Pemilik Mebel Pepak',
            'email'        => 'superadmin@mebelpepak.com',
            'level'        => '1',
            'birth_date'   => '1999-06-06',
            'gender_id'    => '1',
            'password'     => bcrypt('12345678'),
            'phone_number' => '081234567890',
            'address'      => 'Jl. Ring Road Utara, Jombor Lor, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta',
        ]);
    }
}
