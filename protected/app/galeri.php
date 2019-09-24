<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class galeri extends Model
{
    //
    use SoftDeletes;
    protected $table = 'galeris';
    protected $dates = ['deleted_at'];
    protected $fillable = ['judul_in', 'judul_en', 'slug_in','slug_en', 'konten_in','konten_en','parent'];

    public function detail_galeri()
    {
        return $this->hasMany('App\detail_galeri','id_galeri','id');
    }
}
