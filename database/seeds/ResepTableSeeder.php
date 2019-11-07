<?php

use Illuminate\Database\Seeder;

class ResepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resep')->insert([
            'id_obat' => 1,
            'nama_resep' => 'resep sakit kepala',
            'jumlah_obat' => 1,
        ]);

        DB::table('resep')->insert([
            'id_obat' => 2,
            'nama_resep' => 'resep batuk',
            'jumlah_obat' => 2,
        ]);
    }
}
