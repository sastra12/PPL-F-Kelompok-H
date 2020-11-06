<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biouser extends Model
{
    //
    protected $table ='biouser';
    protected $primaryKey = 'id';
    protected $fillable =['nik','alamat','rekening','notelepon','id_user'];

    public function users()
    {
        // return $this->belongsTo('App\User','id_user');
        return $this->belongsTo('App\User','id_user');
    }
}
