<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats';

    protected $fillable = [
        'nomor_surat',
        'judul_surat',
        'file_surat',
        'id_kategori_surat',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'id_kategori_surat');
    }
}


