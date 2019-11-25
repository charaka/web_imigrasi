<?php

namespace App\Http\Controllers;

use App\statistik;
use App\kategori_statistik;
use Illuminate\Http\Request;

use DB;
use DataTables;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('statistik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kat = 1;
        $data['is_edit'] = 0;
        $data['statistik'] = new statistik;
        $data['kategori_statistik'] = kategori_statistik::where('parent',$kat)->get();
        return view('statistik.create')->with($data);
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
        //dd($request->all());exit();
        $bln_thn = explode("/",$request->bln_thn);

        // dd($bln_thn);exit();
        $bulan = $bln_thn[0];
        $tahun = $bln_thn[1];

        foreach ($request->id_kategori as $key => $value) {
            $statistik = new statistik;

            $statistik->id_kategori = $value;
            $statistik->bulan = $bulan;
            $statistik->tahun = $tahun;
            $statistik->jml = $request->jml[$key];

            $statistik->save();
        }

        return redirect('statistik');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function show(statistik $statistik,$bulan,$tahun)
    {
        //
        $get = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query){
                $query->where('parent',1);
            })
        ->get();
        $htm = "";
        $i = 1;
        foreach ($get as $key => $value) {
            $htm .= "<tr>";
            $htm .= "<td>".$i."</td>";
            $htm .= "<td>".$value->kategori_statistik->kategori_in."</td>";
            $htm .= "<td>".$value->jml."</td>";
            $htm .= "</tr>";
            $i++;
        }

        $stats = array();

        foreach ($get as $row) {
            array_push($stats, '["'.$row->kategori_statistik->kategori_in.'",'.$row->jml.']');
        }

        //print_r($stats);

        $data['stats'] = implode(",",$stats);
        $data['tabel'] = $htm;
        $data['bulan'] = $bulan;
        $data['bulan_text'] = $this->bulan($bulan);
        $data['tahun'] = $tahun;
        return view('statistik.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function edit(statistik $statistik,$bulan,$tahun)
    {
        //
        $kat = 1;
        $data['is_edit'] = 1;
        $data['statistik'] = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query) use ($kat){
                $query->where('parent',$kat);
            })->get();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        // $data['kategori_statistik'] = kategori_statistik::where('parent',$kat)->get();
        return view('statistik.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, statistik $statistik,$bulan,$tahun)
    {
        //
        //
        //dd($request->all());exit();

        $bln_thn = explode("/",$request->bln_thn);

        // dd($bln_thn);exit();
        $bulan = $bln_thn[0];
        $tahun = $bln_thn[1];

        foreach ($request->id as $key => $value) {
            $statistik = statistik::find($request->id[$key]);

            $statistik->bulan = $bulan;
            $statistik->tahun = $tahun;
            $statistik->jml = $request->jml[$key];

            $statistik->save();
        }

        return redirect('statistik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(statistik $statistik,$bulan,$tahun)
    {
        //
        $del = DB::table('statistiks')->where('bulan',$bulan)->where('tahun',$tahun)->delete();

        if($del){
            $arr = array("submit"=>1);
        }else{
            $arr = array("submit"=>0);
        }

        echo json_encode($arr);
    }

    function bulan($bulan){
        $arr = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        return $arr[$bulan-1];
    }

    public function listing(Request $request){
        DB::statement(DB::raw('set @rownum = 0'));
        $data = statistik::groupBy('bulan')
        ->groupBy('tahun')
        ->whereHas('kategori_statistik',function($query){
            $query->where('parent',1);
        })
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'bulan','tahun']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('bulan',function($data) {
            return $this->bulan($data->bulan);
        })
        ->addcolumn('action','
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("statistik/".$bulan."/".$tahun) }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("statistik/".$bulan."/".$tahun."/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $bulan }},{{ $tahun }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->make(true);
    }
}
