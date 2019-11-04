<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiInap extends Model
{
    protected $table = 'transaksi_inap';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_petugas');
    }

    public function rawatInap()
    {
        return $this->hasOne(RawatInap::class, 'id', 'id_rawat_inap');
    }
}
