<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Luiz Gustavo Silva Queiroz',
            'username' => 'Gustavo.Queiroz',
            'email' => 'suporteti3@unimednet.com.br',
            'password' => '$2y$10$rKdwp4R8o29z.iAMthLc/eSGfvZKafrHRB9ReuWkAGJKNPAtX2IZ.', // já criptografado
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
