<?php

namespace App\Http\Controllers;

use App\post_file;
use Illuminate\Http\Request;

class PostFileController extends Controller
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
     * @param  \App\post_file  $post_file
     * @return \Illuminate\Http\Response
     */
    public function show(post_file $post_file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post_file  $post_file
     * @return \Illuminate\Http\Response
     */
    public function edit(post_file $post_file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post_file  $post_file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post_file $post_file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post_file  $post_file
     * @return \Illuminate\Http\Response
     */
    public function destroy(post_file $post_file)
    {
        //
        $del = $post_file->delete();
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
