<?php

namespace App\Http\Controllers;

use App\kategori;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = kategori::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parent'] = $parent;
        $data['kategori'] = new kategori;
        $data['method'] = 'POST';
        $data['route'] = ['kategori.store'];

        return view('kategori.form')->with($data);
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
        $kategori = new kategori;
        $kategori->kategori_in = $request->kategori_in;
        $kategori->kategori_en = $request->kategori_en;
        $kategori->parent = $request->parent;
        $kategori->slug_in = str_slug($request->kategori_in);
        $kategori->slug_en = str_slug($request->kategori_en);

        if($kategori->save()){
            return redirect('kategori');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        //
        $parents = kategori::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parent'] = $parent;
        $data['kategori'] = $kategori;
        $data['method'] = 'PUT';
        $data['route'] = ['kategori.update',$kategori->id];

        return view('kategori.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        //
        $del = $kategori->delete();
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

    public function listing(Request $request){
        DB::statement(DB::raw('set @rownum = 0'));
        $data = kategori::leftJoin(DB::raw('(SELECT * FROM kategoris) AS b'), 
        function($join)
        {
           $join->on('kategoris.parent', '=', 'b.id');
        })
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'kategoris.id', 'kategoris.kategori_in', 'kategoris.kategori_en','kategoris.parent','b.kategori_in AS parent']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','
                <button class="btn btn-xs btn-warning btn-flat" onclick="show_form({{ $id }})" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></button>
            ')
        ->make(true);
    }

    // PUBLIC

    public function front($slug){
        return view('front.kategori.index');
    }
}
