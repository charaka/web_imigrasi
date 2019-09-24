<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detail_galeri extends Model
{
    //
    use SoftDeletes;
    protected $table = 'detail_galeris';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_galeri', 'file', 'jenis'];

    public function galeri()
    {
        return $this->belongsTo('App\galeri','id_galeri','id');
    }
}
