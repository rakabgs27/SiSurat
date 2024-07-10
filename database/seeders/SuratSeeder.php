<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Surat::create([
            'nomor_surat' => '001/ABC/2024',
            'judul_surat' => 'Pengumuman Libur',
            'file_surat' => 'file_surat/CV RAKA BAGAS FITRIANSYAH TERBARU V2.pdf',
            'id_kategori_surat' => 1,
        ]);

        Surat::create([
            'nomor_surat' => '002/DEF/2024',
            'judul_surat' => 'Undangan Rapat',
            'file_surat' => 'file_surat/CV RAKA BAGAS FITRIANSYAH TERBARU V2.pdf',
            'id_kategori_surat' => 2,
        ]);
    }
}
