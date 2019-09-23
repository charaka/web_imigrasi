<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori_page extends Model
{
    //
    use SoftDeletes;
    protected $table = 'kategori_pages';
    protected $dates = ['deleted_at'];
    protected $fillable = ['kategori_in', 'kategori_en', 'slug_in','slug_en','sort','icon','parent'];

}
