<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\rbacPermissions;
use App\rbacPermissionRole;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function navigation($items,$isTree='',$userPermission){
        
        $test = '<ul class="'.($isTree==1?'treeview-menu':'sidebar-menu').'">';
           foreach($items as $item){
                $rbacPermissionRole = rbacPermissionRole::where('role_id','=',$userPermission)->join('rbac_permissions as r','r.id','=','rbac_permission_roles.permission_id')->where('rbac_permission_roles.permission_id','=',$item->id)->orderBy('r.weight','asc')->first();
                $rbacPermissionRoleCount = rbacPermissionRole::where('role_id','=',$userPermission)->join('rbac_permissions as r','r.id','=','rbac_permission_roles.permission_id')->where('rbac_permission_roles.permission_id','=',$item->id)->orderBy('r.weight','asc')->count();
                if($rbacPermissionRoleCount>0){
                    $test .= '<li class="'.($isTree!=1 && $item->slug=='#'?'treeview ':'').'">
                    <a data-id="'.$item->weight.'" href="'.URL($item->slug).'" '.$item->attribute.' > <i class="'.$item->icon.'"></i> <span>'.$item->menu.'</span>'.(count($item['children'])>0?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'').'</a>'.(count($item['children'])>0 ? $this->navigation($item['children'],"1",$userPermission) :'').'
                    </li>';
                }
           }
        $test .= '</ul>';
        return $test;
    }

    public function getRole(){
        $items = rbacPermissions::tree();
        return $items;
    }
    
    public function index()
    {


        $data = session()->all();

        $id = Auth::user()->id; 

        $user_role = User::find($id);

       
        
        if(empty(Session::get('user_role_active'))){
            $userRole = $user_role->role_user->first()->id;
        }else{
            $userRole = Session::get('user_role_active');    
        }

        $permissionx = rbacPermissionRole::where('role_id',$userRole)->get();
        $permissions = array();
        foreach ($permissionx as $key => $value) {
            array_push($permissions, str_replace('/', '', $value->permissions->slug));
        }

        session(['permissions' => $permissions]);
        session(['user_role' => $user_role->role_user]);
        session(['user_role_active' => $userRole ]);
        //exit();
        $navigation = $this->navigation($this->getRole(),'',$userRole);
        session(['navigation' => $navigation]);
        /*dd($navigation);*/
        /*dd($user->role_user);
        exit();*/
        return view('home');
    }

    function change_role(Request $request){
        session(['user_role_active' => $request->id]);
        
        $permissionx = rbacPermissionRole::where('role_id',$request->id)->get();
        $permissions = array();
        foreach ($permissionx as $key => $value) {
            array_push($permissions, str_replace('/', '', $value->permissions->slug));
        }

        $navigation = $this->navigation($this->getRole(),'',$request->id);
        session(['permissions' => $permissions]);
        session(['navigation' => $navigation]);
        if($navigation){
            $arr = array("submit"=>1);
        }else{
            $arr = array("submit"=>0);
        }

        echo json_encode($arr);
    }
}
