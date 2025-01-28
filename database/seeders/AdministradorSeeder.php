<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('admin')->insert([
            'nome'=> 'Administrador',
            'email' => 'admin.biblioteca@et.edu.br.com',
            'senha' => 123456,
            'created_at'=> now(),
            'updated_at' => now(),
        ]);
    }
}
