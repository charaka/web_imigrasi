<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacPermissionRole extends Model
{
    //
    protected $table = 'rbac_permission_roles';
    protected $fillable = ['permission_id', 'role_id'];

    public function permissions(){
        return $this->belongsTo('App\rbacPermissions','permission_id','id');
    }
}
