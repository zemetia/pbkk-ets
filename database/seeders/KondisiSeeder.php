<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kondisi = [
            "Baik",
            "Layak",
            "Rusak",
        ];

        foreach ($kondisi as $i) {
            DB::table('kondisis')->insert([
                'nama' => $i
            ]);
        }
    }
}
