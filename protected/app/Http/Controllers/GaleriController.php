<?php

namespace App\Http\Controllers;

use App\galeri;
use App\detail_galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('galeri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['galeri'] = new galeri;
        return view('galeri.create')->with($data);
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
        $galeri = new galeri;

        $galeri->judul_in = $request->judul_in;
        $galeri->judul_en = $request->judul_en;
        $galeri->slug_in = str_slug($request->judul_in);
        $galeri->slug_en = str_slug($request->judul_en);
        $galeri->konten_in = $request->konten_in;
        $galeri->konten_en = $request->konten_en;

        $save = $galeri->save();

        if($save){
            $galeri_lampiran = $request->file('galeri_lampiran');
            if(!empty($galeri_lampiran)){
                foreach ($galeri_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/post_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $detail_galeri = new detail_galeri;
                        $detail_galeri->id_galeri = $galeri->id;
                        $detail_galeri->file = $filePath;
                        $detail_galeri->jenis = 1;
                        $detail_galeri->save();
                    }else{

                    }

                }
            }else{

            }
        }

        return redirect('galeri');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(galeri $galeri)
    {
        //
    }
}
