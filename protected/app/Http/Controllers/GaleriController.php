<?php

namespace App\Http\Controllers;

use App\galeri;
use App\detail_galeri;
use Illuminate\Http\Request;

use DB;
use DataTables;
use Session;
class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $data['galeri'] = $galeri;
        $data['details'] = detail_galeri::where('id_galeri',$galeri->id)->get();
        return view('galeri.show')->with($data);
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
        $data['id'] = $galeri->id;
        $data['galeri'] = $galeri;
        $data['details'] = detail_galeri::where('id_galeri',$galeri->id)->get();
        return view('galeri.edit')->with($data);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(galeri $galeri)
    {
        //
        $del = $galeri->delete();
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
        $data = galeri::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id', 'judul_in', 'judul_en','konten_in','konten_en','status']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("galeri/$id") }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("galeri/$id/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->addcolumn('status_id','<label class="switch"><input type="checkbox" onclick="aktif_post({!! $id !!})" {{ ($status==1?"checked":"") }}><span class="slider"></span></label>')
        ->rawColumns(['konten_in','action','status_id'])
        ->make(true);
    }

    public function galeri_all(Request $request){
        $data['datas'] = galeri::join('detail_galeris AS b','b.id_galeri','=','galeris.id')
                        ->groupBy('galeris.id')
                        ->select(['galeris.judul_en','galeris.judul_in','galeris.slug_en','galeris.slug_in','galeris.id','b.file'])
                        ->where('status',1)->orderBy('galeris.id','DESC')
                        ->paginate(4);
        return view('front.galeri.index')->with($data);
    }

    public function front($slug){
        $slug_lang = 'galeris.slug_'.Session::get('lang');
        $get = galeri::whereHas('detail_galeri', function ($query) use ($slug,$slug_lang) {
                $query->where($slug_lang, '=', $slug);
            })->where('status',1)->orderBy('galeris.id','DESC')->first();
        $lains = galeri::join('detail_galeris AS b','b.id_galeri','=','galeris.id')
                        ->groupBy('galeris.id')
                        ->where($slug_lang, '<>', $slug)
                        ->select(['galeris.judul_en','galeris.judul_in','galeris.slug_en','galeris.slug_in','galeris.id','b.file'])
                        ->paginate(8);
        $data['datas'] = $get;
        $data['lains'] = $lains;
        return view('front.galeri.galeri')->with($data);
    }

    public function aktif_post(Request $request){
        $cek = galeri::where('id',$request->id)->first();
        $stat = "";
        if($cek->status==1){
            $stat = 0;
        }else if($cek->status==0){
            $stat = 1;
        }
        $updt = galeri::where('id', $request->id)
          ->update(['status' => $stat]);

        if($updt){
            $arr = array(
                "submit"=>1,
                "msg" => "Berhasil Memperbaharui Data"
            );
        }else{
            $arr = array(
                "submit"=>0,
                "msg" => "Gagal Memperbaharui Data"
            );
        }

        echo json_encode($arr);
    }
}
