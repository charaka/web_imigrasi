<?php

namespace App\Http\Controllers;

use App\detail_galeri;
use Illuminate\Http\Request;

class DetailGaleriController extends Controller
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
     * @param  \App\detail_galeri  $detail_galeri
     * @return \Illuminate\Http\Response
     */
    public function show(detail_galeri $detail_galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_galeri  $detail_galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_galeri $detail_galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_galeri  $detail_galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_galeri $detail_galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_galeri  $detail_galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_galeri $detail_galeri)
    {
        //
        $del = $detail_galeri->delete();
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
