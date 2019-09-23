<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class page extends Model
{
    //
    use SoftDeletes;
    protected $table = 'pages';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_kategori','judul_in', 'judul_en', 'slug_in','slug_en', 'konten_in','konten_en','views','status','tanggal_publish'];
}
