<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            "Aksesoris",
            "Elektronik",
            "Furniture",
            "Teknologi",
            "Pakaian",
            "Make Up"
        ];

        foreach ($jenis as $i) {
            DB::table('jenis')->insert([
                'nama' => $i
            ]);
        }
    }
}
