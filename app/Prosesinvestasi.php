<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosesinvestasi extends Model
{
    //
    protected $table = 'prosesinvestasi';
    protected $fillable =['id','id_pengajuan','bukti','pesan'];

    public function peternakan(){
        return $this->belongsTo('App\Peternakan');
    }
}
