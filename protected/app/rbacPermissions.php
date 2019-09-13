<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacPermissions extends Model
{
    //
    protected $table = 'rbac_permissions';
    protected $fillable = ['id', 'menu', 'slug', 'icon', 'parent','depth', 'attribute', 'wight'];

    public function parents(){
    	return $this->hasOne('\App\rbacPermissions', 'id','parent');
    }

    public function children() {
        return $this->hasMany('App\rbacPermissions', 'parent', 'id');
    }   

    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent', '=', '0')->orderBy('weight','asc')->get();
    }
}
