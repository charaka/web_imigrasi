<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
    protected $table = 'menus';
    protected $fillable = ['id', 'menu_in', 'menu_en', 'model','slug_in','slug_en','id_element', 'parent_id', 'url','depth','sort','icon'];
}
