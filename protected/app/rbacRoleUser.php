<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacRoleUser extends Model
{
    //
    protected $table = 'rbac_role_users';
    protected $fillable = ['id', 'id_user', 'role_id'];

    public function role_user(){
        return $this->belongsTo('App\User','id','id_user');
    }

    public function role(){
        return $this->belongsTo('App\rbacRole','role_id','id');
    }
}
