<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statistik extends Model
{
    //
    protected $table = 'statistiks';
    protected $fillable = ['id_kategori', 'bulan', 'tahun','jml','total_respon'];

    public function kategori_statistik()
    {
        return $this->belongsTo('App\kategori_statistik','id_kategori','id');
    }
}
