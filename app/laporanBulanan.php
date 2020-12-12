<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanBulanan extends Model
{
    protected $table = 'laporan_bulanan';
    protected $filltable = 'id_laporan', 'pemasukan', 'ket_masuk','ftbkt_in', 'pengeluaran', 'ket_keluar', 'ftbkt_out';
    public function prosesinvestasi(){
        return $this->hasOne('App\Prosesinvestasi');
    }
}
