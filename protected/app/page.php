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

    public function kategori()
    {
        return $this->belongsTo('App\kategori_page','id_kategori','id');
    }

    public function files(){
    	return $this->hasMany('App\page_file','id_page','id')->where('jenis',1);
    }
    public function gambars(){
    	return $this->hasMany('App\page_file','id_page','id')->where('jenis',2);
    }
    public function videos(){
    	return $this->hasMany('App\page_file','id_page','id')->where('jenis',3);
    }
}
