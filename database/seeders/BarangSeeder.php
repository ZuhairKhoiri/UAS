<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'kode_barang' => '1111',
            'nama_barang' => 'Asus Tuf F15',
            'harga_barang' => '1000000',
            'jumlah_barang' => '1',
        ]);
    }
}
