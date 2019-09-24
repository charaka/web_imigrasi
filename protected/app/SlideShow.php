<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlideShow extends Model
{
    //
    use SoftDeletes;
    protected $table = 'slide_shows';
    protected $dates = ['deleted_at'];
    protected $fillable = ['judul_in', 'judul_en','deskripsi_in','deskripsi_en','image','status_id'];

}
