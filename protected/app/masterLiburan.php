<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class masterLiburan extends Model
{
    //
    use SoftDeletes;
    protected $table = 'master_liburans';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_liburan', 'jenis_libur', 'tgl_libur','flag'];

    public function jenis_liburan()
    {
        return $this->belongsTo('App\masterJenisLibur','jenis_libur','id');
    }
}
