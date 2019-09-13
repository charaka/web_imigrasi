<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacRole extends Model
{
    //
    protected $table = 'rbac_roles';
    protected $fillable = ['id', 'role_title', 'description', 'role_slug', 'is_active'];

    /*public function rbac_permissions(){
    	return $this->hasMany('\App\rbacPermissions', 'id','parent');
    }*/
}
