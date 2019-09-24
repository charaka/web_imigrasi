<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    //
    use SoftDeletes;
    protected $table = 'kategoris';
    protected $dates = ['deleted_at'];
    protected $fillable = ['kategori_in', 'kategori_en', 'slug_in','slug_en','parent'];

    public function parents()
    {
        return $this->belongsTo('App\kategori','parent','id');
    }
}
