<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    protected $table = 'tbl_surat';
    protected $fillable = ['nomor_surat', 'id_takah', 'tahun', 'tanggal', 'kepada', 'perihal', 'tembusan', 'keterangan', 'pembuat'];

    public function takahs()
    {
        return $this->belongsTo('App\Models\Takah', 'id_takah', 'id');
    }
}
