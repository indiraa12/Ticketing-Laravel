<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "role_id" => 1,
                "name" => "Administrator",
                "username" => "admin",
                "password" => bcrypt("password"),
                "alamat_penumpang" => "-",
                "tgl_lahir" => "-",
                "jenis_kelamin" => "-",
                "telepon" => "-",
                "remember_token" => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
