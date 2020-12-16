<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuaninvestasi extends Model
{
    //
    protected $table = 'pengajuaninvestasi';
    protected $fillable =['id','id_peternakan','nominal','saratperjanjian','id_peternak'];
    
    public function peternakan()
    {
        return $this->belongsTo('App\Peternakan','id_peternakan');
    }

    public function pengajuaninvestasi()
    {
        return $this->belongsTo('App\Pengajuaninvestasi','id_pengajuan');
    }
}
