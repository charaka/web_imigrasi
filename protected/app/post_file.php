<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post_file extends Model
{
    //
    use SoftDeletes;
    protected $table = 'post_files';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_post', 'file', 'jenis'];

    public function post()
    {
        return $this->belongsTo('App\post','id_post','id');
    }
}
