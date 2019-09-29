<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class page_file extends Model
{
    //
    use SoftDeletes;
    protected $table = 'page_files';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_page', 'file', 'jenis'];

    public function page()
    {
        return $this->belongsTo('App\page','id_page','id');
    }
}
