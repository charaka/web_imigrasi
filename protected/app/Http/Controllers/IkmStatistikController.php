<?php

namespace App\Http\Controllers;

use App\ikm_statistik;
use App\statistik;
use App\kategori_statistik;
use Illuminate\Http\Request;

use DB;
use DataTables;

class IkmStatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ikm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kat = 2;
        $data['is_edit'] = 0;
        $data['statistik'] = new statistik;
        $data['kategori_statistik'] = kategori_statistik::where('parent',$kat)->get();
        return view('ikm.create')->with($data);
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
            $statistik->total_respon = $request->total_respon[$key];

            $statistik->save();
        }

        return redirect('ikm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ikm_statistik  $ikm_statistik
     * @return \Illuminate\Http\Response
     */
    public function show(ikm_statistik $ikm_statistik,$bulan,$tahun)
    {
        //
        $get = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query){
                $query->where('parent',2);
            })
        ->get();
        //dd($get);
        $htm = "";
        foreach ($get as $key => $value) {
            $htm .= "<tr >";
            $htm .= "<td rowspan='7' style='text-align:center;vertical-align:middle;font-size:20pt'>".$value->jml."</td>";
            $htm .= "<td>JUMLAH RESPONDEN ".$value->total_respon."</td>";
            $htm .= "<tr>";
            $htm .= "<tr><td><b>INTERVAL NILAI</b></td></tr>";
            $htm .= "<tr><td>25.00 - 64.99 : TIDAK BAIK</td></tr>";
            $htm .= "<tr><td>65.00 - 76.60 : KURANG BAIK</td></tr>";
            $htm .= "<tr><td>76.61 - 88.30 : BAIK</td></tr>";
            $htm .= "<tr><td>88.31 - 100 : SANGAT BAIK</td></tr>";
        }

        $data['tabel'] = $htm;
        $data['bulan'] = $bulan;
        $data['bulan_text'] = $this->bulan($bulan);
        $data['tahun'] = $tahun;
        return view('ikm.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ikm_statistik  $ikm_statistik
     * @return \Illuminate\Http\Response
     */
    public function edit(ikm_statistik $ikm_statistik,$bulan,$tahun)
    {
        //
        $kat = 2;
        $data['is_edit'] = 1;
        $data['statistik'] = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query) use ($kat){
                $query->where('parent',$kat);
            })->get();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        // $data['kategori_statistik'] = kategori_statistik::where('parent',$kat)->get();
        return view('ikm.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ikm_statistik  $ikm_statistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ikm_statistik $ikm_statistik)
    {
        //

        $bln_thn = explode("/",$request->bln_thn);

        // dd($bln_thn);exit();
        $bulan = $bln_thn[0];
        $tahun = $bln_thn[1];

        foreach ($request->id as $key => $value) {
            $statistik = statistik::find($request->id[$key]);

            $statistik->bulan = $bulan;
            $statistik->tahun = $tahun;
            $statistik->jml = $request->jml[$key];
            $statistik->total_respon = $request->total_respon[$key];

            $statistik->save();
        }

        return redirect('ikm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ikm_statistik  $ikm_statistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(ikm_statistik $ikm_statistik,$bulan,$tahun)
    {
        //
        $kat = 2;
        $del = statistik::where('bulan',$bulan)->where('tahun',$tahun)->whereHas('kategori_statistik',function($query) use ($kat){
                $query->where('parent',$kat);
            })->delete();

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
            $query->where('parent',2);
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
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("ikm/".$bulan."/".$tahun) }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("ikm/".$bulan."/".$tahun."/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $bulan }},{{ $tahun }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->make(true);
    }
}
