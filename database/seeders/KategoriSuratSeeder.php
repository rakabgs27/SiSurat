<?php

namespace Database\Seeders;

use App\Models\KategoriSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriSurat::create([
            'nama_kategori' => 'Pengumuman',
            'keterangan' => 'Surat-surat yang terkait dengan pengumuman.',
        ]);

        KategoriSurat::create([
            'nama_kategori' => 'Undangan',
            'keterangan' => 'Undangan rapat, koordinasi, dsb.',
        ]);
    }
}
