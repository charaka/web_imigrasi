<?php

namespace App\Http\Controllers;

use App\rbacRole;
use App\rbacPermissions;
use Illuminate\Http\Request;

use DB;
use DataTables;
class RbacRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //
        return view('rbacRoles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['rbacRole'] = new rbacRole;
        return view('rbacRoles.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = new rbacRole;
        $role->role_title = $request->role_title;
        $role->role_slug = str_slug($request->role_title);
        $role->description = $request->description;
        $role->is_active = 1;

        $role->save();

        return redirect('rbac_role');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rbacRole  $rbacRole
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $data['rbac_role'] = rbacRole::find($id);
        $data['rbac_permission'] = DB::table('rbac_permissions AS a')
                ->leftJoin('rbac_permission_roles AS b','a.id','=','b.permission_id')
                ->leftJoin(DB::raw('(SELECT * FROM rbac_permission_roles AS z WHERE z.role_id='.$id.') AS q') ,'a.id','=','q.permission_id')
                ->select(['b.permission_id','q.role_id','a.menu','a.id'])
                ->groupBy('a.id')
                ->get();
        $data['id'] = $id;
        return view('rbacRoles.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rbacRole  $rbacRole
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $data['rbacRole'] = rbacRole::find($id);
        return view('rbacRoles.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rbacRole  $rbacRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $role = rbacRole::find($id);
        $role->role_title = $request->role_title;
        $role->role_slug = str_slug($request->role_title);
        $role->description = $request->description;
        $role->is_active = 1;

        $role->save();

        return redirect('rbac_role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rbacRole  $rbacRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(rbacRole $rbacRole)
    {
        //
    }

    public function listing(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = rbacRole::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id','role_title', 'description','role_slug']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','<div class="btn-group"><a class="btn btn-xs btn-flat btn-info" title="Edit Data" href="{{ url("rbac_role/".$id) }}" ><span class="fa fa-info-circle"></span></a> <a class="btn btn-warning btn-flat btn-xs" title="Edit Data" href="{!! url("rbac_role/$id/edit") !!}"><span class="fa fa-edit"></span></a></div>')
        ->rawColumns(['action'])
        ->make(true);
    }

    public function aktif_role(Request $request){
        $sel = DB::table('rbac_permission_roles AS a')
                ->where('permission_id',$request->permission_id)
                ->where('role_id',$request->role_id)->first();
        if(empty($sel)){
            $upd = DB::table('rbac_permission_roles')->insert(
                array(
                    'permission_id'=>$request->permission_id,
                    'role_id'=>$request->role_id
                )
            );
        }else{
            $upd = DB::table('rbac_permission_roles')
            ->where('permission_id',$request->permission_id)
            ->where('role_id',$request->role_id)->delete();
        }

        if($upd){
            $arr = array('submit'=>1);
        }else{
            $arr = array('submit'=>0);
        }

        echo json_encode($arr);
    }

}
