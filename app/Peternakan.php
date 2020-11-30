<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peternakan extends Model
{
    //
    protected $table = 'peternakan';
    protected $fillable =['id_user','namapeternakan','alamatpeternakan','jmlkambingdewasa','jmlkambinganakan','namagambar'];
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function pengajuaninvestasi(){
        return $this->hasOne('App\Pengajuaninvestasi','id_peternakan');
    }
}
