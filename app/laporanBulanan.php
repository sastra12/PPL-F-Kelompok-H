<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanBulanan extends Model
{
    protected $table = 'laporan_bulanan';
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    protected $filltable = 'id_laporan', 'pemasukan', 'ket_masuk','ftbkt_in', 'pengeluaran', 'ket_keluar', 'ftbkt_out';
=======
    protected $filltable =['id_laporan', 'pemasukan', 'ket_masuk','ftbkt_in', 'pengeluaran', 'ket_keluar', 'ftbkt_out'];
>>>>>>> Stashed changes
    public function prosesinvestasi(){
        return $this->hasOne('App\Prosesinvestasi');
    }
=======
    protected $filltable =['id_laporan', 'id_user', 'pemasukan', 'ket_masuk','ftbkt_in', 'pengeluaran', 'ket_keluar', 'ftbkt_out'];
    public function prosesinvestasi(){
        return $this->hasOne('App\Prosesinvestasi');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
>>>>>>> Stashed changes
}
