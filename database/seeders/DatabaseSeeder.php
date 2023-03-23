<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Produk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Kategori::create([
            'nama'=>'Makanan',
        ]);

        Kategori::create([
            'nama'=>'Minuman'
        ]);

        Produk::create([
            'nama'=>'Borobudur',
            'harga'=>'2500',
            'deskripsi'=>'Makanan Ringan Bisa untuk teman makan anda',
            'kategori_id'=>'1'
        ]);

        Produk::create([
            'nama'=>'Yakult',
            'harga'=>'2000',
            'deskripsi'=>'Minuman sehat dan baik untuk usus',
            'kategori_id'=>'2'
        ]);

        Produk::create([
            'nama'=>'Biskuat',
            'harga'=>'1500',
            'deskripsi'=>'Menjaga stamina tubuh',
            'kategori_id'=>'1'
        ]);
    }
}
