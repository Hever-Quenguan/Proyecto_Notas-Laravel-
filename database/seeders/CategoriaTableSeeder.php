<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categoria')->insert([
            ['nombre' => 'Categoria 1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Categoria 2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Categoria 3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Categoria 4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
