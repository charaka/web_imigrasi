<?php

namespace App\Http\Controllers;

use App\page_file;
use Illuminate\Http\Request;

class PageFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\page_file  $page_file
     * @return \Illuminate\Http\Response
     */
    public function show(page_file $page_file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\page_file  $page_file
     * @return \Illuminate\Http\Response
     */
    public function edit(page_file $page_file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\page_file  $page_file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, page_file $page_file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\page_file  $page_file
     * @return \Illuminate\Http\Response
     */
    public function destroy(page_file $page_file)
    {
        //
        $del = $page_file->delete();
        if($del){
            $arr = array(
                'submit' => 1,
                'msg' => 'Berhasil Menghapus Data'
            );
        }else{
            $arr = array(
                'submit' => 0,
                'msg' => 'Gagal Menghapus Data'
            );
        }

        echo json_encode($arr);
    }
}
