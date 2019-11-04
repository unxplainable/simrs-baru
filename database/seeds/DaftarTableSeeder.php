<?php

use Illuminate\Database\Seeder;

class DaftarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar')->insert([
            'id_pasien' => 1,
            'id_poli' => 1,
            'id_role_pembayaran' => 2,
        ]);
        DB::table('daftar')->insert([
            'id_pasien' => 2,
            'id_poli' => 1,
            'id_role_pembayaran' => 2,
        ]);
    }
}
