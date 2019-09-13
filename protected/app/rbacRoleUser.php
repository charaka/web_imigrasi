<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacRoleUser extends Model
{
    //
    protected $table = 'rbac_role_users';
    protected $fillable = ['id', 'id_user', 'role_id'];

    
}
