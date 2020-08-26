<?php

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'email' => 'admin@bodegon.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
