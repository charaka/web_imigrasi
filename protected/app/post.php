<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    //
    use SoftDeletes;
    protected $table = 'posts';
    protected $dates = ['deleted_at'];
    protected $fillable = ['judul_in', 'judul_en', 'slug_in','slug_en', 'konten_in','konten_en','views','status','cover','tanggal_publish','id_kategori'];

    public function kategori()
    {
        return $this->belongsTo('App\kategori','id_kategori','id');
    }
}
