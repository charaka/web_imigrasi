<?php

namespace App\Http\Controllers;

use App\User;
use App\rbacRole;
use App\rbacRoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use DB;
use DataTables;

class RbacUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rbacUser.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['rbac_user'] = new User;
        $data['role'] = rbacRole::all();
        return view('rbacUser.create')->with($data);
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



    	$user = new User;

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
    	$role = $request->role_id;
    	if($user->save()){
    		$rolex = new rbacRoleUser;
    		if(!empty($role)){
    			foreach ($role as $key => $value) {
    				$rolex->id_user = $user->id;
    				$rolex->role_id = $value;
    				$rolex->save();
    			}
    		}else{

    		}
    	}

    	return redirect('rbac_user');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rbacUser  $rbacUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }


    public function listing(Request $request){
    	DB::statement(DB::raw('set @rownum = 0'));
        $data = USer::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id', 'name', 'email']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("rbac_user/$id") }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("rbac_user/$id/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->rawColumns(['action'])
        ->make(true);
    }
}
