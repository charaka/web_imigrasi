<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    //
    protected $table = 'm_icon';
    public $primaryKey = 'id';
    protected $fillable = ['icon'];
}
