<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPoli extends Model
{
    protected $table = 'transaksi_poli';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_petugas');
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class, 'id', 'id_pemeriksaan');
    }
}
