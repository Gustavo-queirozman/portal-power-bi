<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetTokenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('password_reset_tokens')->insert([
            'id' => 1,
            'email' => 'suporteti3@unimednet.com.br',
            'token' => '$2y$10$opsbS878z4OPY5ACihPfPeoNHa6Hc/ab3y6czVb..56KZ7UGNB/Gq',
            'created_at' => '2023-05-15 11:04:17',
        ]);
    }
}
