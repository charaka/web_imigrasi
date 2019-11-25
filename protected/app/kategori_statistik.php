<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class kategori_statistik extends Model
{
    //
    use SoftDeletes;
    protected $table = 'kategori_statistiks';
    protected $dates = ['deleted_at'];
    protected $fillable = ['kategori_in', 'kategori_en', 'slug_in','slug_en','parent'];

    public function parents()
    {
        return $this->belongsTo('App\kategori','parent','id');
    }
}
