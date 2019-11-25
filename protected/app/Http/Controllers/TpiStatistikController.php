<?php

namespace App\Http\Controllers;

use App\tpi_statistik;
use App\kategori_statistik;
use App\statistik;
use Illuminate\Http\Request;


use DB;
use DataTables;
class TpiStatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tpi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kat = 3;
        $data['is_edit'] = 0;
        $data['statistik'] = new statistik;
        $get = kategori_statistik::where('parent',$kat)->get();

        $frm = "";

        foreach ($get as $key => $value) {
        	$frm .= "<row>";
        	$frm .= "<h4>".$value->kategori_in."</h4><hr>";
        	$get2 = kategori_statistik::where('parent',$value->id)->get();
        	$frm .= "<row>";
        	foreach ($get2 as $key2 => $row) {
        		$frm .= '<div class="col-md-10">
				          <label>Statistik</label>
				          <input type="text" name="kategori[]" class="form-control" readonly value="'.$row->kategori_in.'">
				          <input type="hidden" name="id_kategori[]" class="form-control" value="'.$row->id.'">
				        </div>
				        <div class="col-md-2">
				          <label>Jumlah</label>
				          <input type="text" name="jml[]" class="form-control">
				        </div>';
        	}
        	$frm .= "</row><br><br>";
        	$frm .= "</row>";
        }

        //dd($frm);exit();
        $data['frm'] = $frm;
        return view('tpi.create')->with($data);
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

            $statistik->save();
        }

        return redirect('tpi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tpi_statistik  $tpi_statistik
     * @return \Illuminate\Http\Response
     */
    public function show(tpi_statistik $tpi_statistik,$bulan,$tahun)
    {
        //
        $head = kategori_statistik::where('parent',3)->get();
        //dd($get);
        $htm = "";
        $htm .= "<row><div class='col-md-12'>";
        foreach ($head as $key => $value) {
          $htm .= "<h4>".$value->kategori_in."</h4><hr>";
          $get = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query) use ($value){
                $query->where('parent',$value->id);
            })->get();
            $htm .= '<table class="table table-bordered table-condensed">';
            $htm .= '<thead>';
            $htm .= '<tr>';
            $htm .= '<th>Statistik</th>';
            $htm .= '<th>Jumlah</th>';
            $htm .= '</tr>';
            $htm .= '</thead>';
            $htm .= '<tbody>';
            foreach ($get as $key => $row) {
            	$htm .= '<tr>';
            	$htm .= '<td>'.$row->kategori_statistik->kategori_in.'</td>';
            	$htm .= '<td>'.$row->jml.'</td>';
            	$htm .= '</tr>';
            }
            $htm .= '</tbody>';
            $htm .= '</table>';
        }
        $htm .= "</row></div>";

        $data['tabel'] = $htm;
        $data['bulan'] = $bulan;
        $data['bulan_text'] = $this->bulan($bulan);
        $data['tahun'] = $tahun;
        return view('tpi.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tpi_statistik  $tpi_statistik
     * @return \Illuminate\Http\Response
     */
    public function edit(tpi_statistik $tpi_statistik,$bulan,$tahun)
    {
        //
        $data['kat'] = 3;
        $data['is_edit'] = 1;

        $data['statistik'] = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query){
                $query->where('parent',11)
                ->orWhere('parent',12);
            })->get();

        $head = kategori_statistik::where('parent',3)->get();
        //dd($get);
        $htm = "";
        $htm .= "<row><div class='col-md-12'>";
        foreach ($head as $key => $value) {
          $htm .= "<h4>".$value->kategori_in."</h4><hr>";
          $get = statistik::where('bulan',$bulan)->where('tahun',$tahun)
            ->whereHas('kategori_statistik',function($query) use ($value){
                $query->where('parent',$value->id);
            })->get();
            $htm .= "<row>";
        	foreach ($get as $key2 => $row) {
        		$htm .= '<div class="col-md-10">
				          <label>Statistik</label>
				          <input type="text" name="kategori[]" class="form-control" readonly value="'.$row->kategori_statistik->kategori_in.'">
				          <input type="hidden" name="id[]" class="form-control" value="'.$row->id.'">
				        </div>
				        <div class="col-md-2">
				          <label>Jumlah</label>
				          <input type="text" name="jml[]" class="form-control" value="'.$row->jml.'">
				        </div>';
        	}
        	$htm .= "</row><br><br>";
        }
        $htm .= "</row></div>";

        $data['frm'] = $htm;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        return view('tpi.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tpi_statistik  $tpi_statistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tpi_statistik $tpi_statistik,$bulan,$tahun)
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

            $statistik->save();
        }

        return redirect('tpi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tpi_statistik  $tpi_statistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(tpi_statistik $tpi_statistik)
    {
        //
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
            $query->where('parent',11)
            		->orWhere('parent',12);
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
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("tpi/".$bulan."/".$tahun) }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("tpi/".$bulan."/".$tahun."/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $bulan }},{{ $tahun }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->make(true);
    }
}
