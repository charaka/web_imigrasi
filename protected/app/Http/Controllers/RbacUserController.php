<?php

namespace App\Http\Controllers;

use App\rbacUser;
use Illuminate\Http\Request;

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rbacUser  $rbacUser
     * @return \Illuminate\Http\Response
     */
    public function show(rbacUser $rbacUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rbacUser  $rbacUser
     * @return \Illuminate\Http\Response
     */
    public function edit(rbacUser $rbacUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rbacUser  $rbacUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rbacUser $rbacUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rbacUser  $rbacUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(rbacUser $rbacUser)
    {
        //
    }
}
