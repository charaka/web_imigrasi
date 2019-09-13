<?php

namespace App\Http\Controllers;

use App\masterJenisLibur;
use Illuminate\Http\Request;

use DB;
use DataTables;

class MasterJenisLiburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('masterJenisLiburan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['masterJenisLibur'] = new masterJenisLibur;
        return view('masterJenisLiburan.create')->with($data);
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
        /*dd($request->all());
        exit();*/
        $masterJenisLibur = new masterJenisLibur;


        $masterJenisLibur->jenis_libur = $request->jenis_libur;

        if($masterJenisLibur->save()){
            return redirect('master_jenis_libur');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\masterJenisLibur  $masterJenisLibur
     * @return \Illuminate\Http\Response
     */
    public function show(masterJenisLibur $masterJenisLibur)
    {
        //
        $data['masterJenisLibur'] = $masterJenisLibur;
        return view('masterJenisLiburan.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\masterJenisLibur  $masterJenisLibur
     * @return \Illuminate\Http\Response
     */
    public function edit(masterJenisLibur $masterJenisLibur)
    {
        //
        $data['masterJenisLibur'] = $masterJenisLibur;
        return view('masterJenisLiburan.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\masterJenisLibur  $masterJenisLibur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masterJenisLibur $masterJenisLibur)
    {
        //
        $masterJenisLibur->jenis_libur = $request->jenis_libur;

        if($masterJenisLibur->save()){
            return redirect('master_jenis_libur');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\masterJenisLibur  $masterJenisLibur
     * @return \Illuminate\Http\Response
     */
    public function destroy(masterJenisLibur $masterJenisLibur)
    {
        //
        $del = $masterJenisLibur->delete();
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
        $data = masterJenisLibur::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id','jenis_libur']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','<div class="btn-group"><a class="btn btn-xs btn-flat btn-info" title="Show Data" href="{{ url("master_jenis_libur/".$id) }}" ><span class="fa fa-info-circle"></span></a> <a class="btn btn-warning btn-flat btn-xs" title="Edit Data" href="{!! url("master_jenis_libur/$id/edit") !!}"><span class="fa fa-edit"></span></a> <button class="btn btn-danger btn-flat btn-xs" title="Delete Data" href="javascript:;" onclick=delete_data({{ $id }})><span class="fa fa-trash"></span></button></div>')
        ->rawColumns(['action'])
        ->make(true);
    }
}
