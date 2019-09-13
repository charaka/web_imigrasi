<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\masterLiburan;
use App\masterJenisLibur;
use DataTables;
use DB;

class MasterLiburanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('masterLiburan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['masterLiburan'] = new masterLiburan;
        $data['jenis_libur'] = masterJenisLibur::all();

        return view('masterLiburan.create')->with($data);
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
        $masterLiburan = new masterLiburan;

        $masterLiburan->nama_libur = $request->nama_libur;
        $masterLiburan->jenis_libur = $request->jenis_libur;
        $masterLiburan->tgl_libur = $this->texttodate($request->tgl_libur);
        
        if($masterLiburan->save()){
            return redirect('master_liburan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\masterLiburan  $masterLiburan
     * @return \Illuminate\Http\Response
     */
    public function show(masterLiburan $masterLiburan)
    {
        //
        $data = array(
            'nama_libur' => $masterLiburan->nama_libur,
            'jenis_libur' => $masterLiburan->jenis_liburan->jenis_libur,
            'tgl_libur' => $this->datetotext($masterLiburan->tgl_libur),
        );
        return view('masterLiburan.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\masterLiburan  $masterLiburan
     * @return \Illuminate\Http\Response
     */
    public function edit(masterLiburan $masterLiburan)
    {
        //
        $data = array(
            'jenis_libur' => masterJenisLibur::all(),
            'masterLiburan' => $masterLiburan,
            'id' => $masterLiburan->id
        );
        return view('masterLiburan.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\masterLiburan  $masterLiburan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masterLiburan $masterLiburan)
    {
        //

        $masterLiburan->nama_libur = $request->nama_libur;
        $masterLiburan->jenis_libur = $request->jenis_libur;
        $masterLiburan->tgl_libur = $this->texttodate($request->tgl_libur);
        
        if($masterLiburan->save()){
            return redirect('master_liburan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\masterLiburan  $masterLiburan
     * @return \Illuminate\Http\Response
     */
    public function destroy(masterLiburan $masterLiburan)
    {
        //
        $del = $masterLiburan->delete();
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
        $data = kategori::join('master_jenis_liburs AS b','master_liburans.jenis_libur','=','b.id')
                    ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'master_liburans.id','master_liburans.nama_libur', 'b.jenis_libur','master_liburans.tgl_libur']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','<div class="btn-group"><a class="btn btn-xs btn-flat btn-info" title="Show Data" href="{{ url("master_liburan/".$id) }}" ><span class="fa fa-info-circle"></span></a> <a class="btn btn-warning btn-flat btn-xs" title="Edit Data" href="{!! url("master_liburan/$id/edit") !!}"><span class="fa fa-edit"></span></a> <button class="btn btn-danger btn-flat btn-xs" title="Delete Data" href="javascript:;" onclick=delete_data({{ $id }})><span class="fa fa-trash"></span></button></div>')
        ->rawColumns(['action'])
        ->make(true);
    }
}
