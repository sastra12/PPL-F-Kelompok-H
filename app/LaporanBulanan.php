<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanBulanan extends Model
{
    protected $table = 'laporanbulanan';
    protected $fillable =['id','id_proses','pemasukan','keteranganpemasukan','pengeluaran','keteranganpengeluaran'
    ,'keuntungan','fotobukti'];

    public function prosesinvestasi(){
    	return $this->belongsTo('App\Prosesinvestasi');
    }

}
