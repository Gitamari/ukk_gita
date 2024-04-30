<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'namaAlbum' => 'Test Album',
                'deskripsi' => 'Album Kenangan Bersama Latif',
                'tanggalDibuat' => '2022-01-01',
                'user_id' => 1,
            ]
        ];

        DB::table('album')->insert($posts);
    }
}
