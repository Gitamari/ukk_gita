<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foto = [
            [
                'judulFoto' => 'Gita',
                'deskripsi' => 'Test Seeder Fotos',
                'tanggalUnggah' => '2022-01-01',
                'lokasiFile' => '127.0.0.1:8000/storage/potos/6287135.png',
                'album_id' => 1,
                'user_id' => 1,
            ],
        ];
        DB::table('foto')->insert($foto);
    }
}
