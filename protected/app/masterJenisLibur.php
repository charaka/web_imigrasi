<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class masterJenisLibur extends Model
{
    //
    use SoftDeletes;
    protected $table = 'master_jenis_liburs';
    protected $dates = ['deleted_at'];
    protected $fillable = ['jenis_libur'];
}
