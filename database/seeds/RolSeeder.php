<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'name' => 'user',
            'descripcion' => 'Usuario normal, podrá hacer comentarios sobre los establecimientos y dar me gusta a los que quiera.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('rols')->insert([
            'name' => 'gerente',
            'descripcion' => 'Usuario normal, podrá hacer comentarios sobre los establecimientos y dar me gusta a los que quiera.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); DB::table('rols')->insert([
            'name' => 'admin',
            'descripcion' => 'Usuario normal, podrá hacer comentarios sobre los establecimientos y dar me gusta a los que quiera.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
