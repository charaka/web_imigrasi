<?php

namespace App\Http\Controllers;

use App\menu;
use App\page;
use App\post;
use App\galeri;
use App\kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $headers = menu::where('parent_id','=',0)->pluck('menu_in','id');
        $header = array();
        foreach ($headers->toArray() as $key => $obj) {
            $header[$key] = $obj;
        }
        $data['header'] = $header;
        $data['menu'] = new menu;
        return view('menu.create')->with($data);
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
        //
        /*print_r($request->all());
        exit();*/
        $model = $request->model;
        $posting = $request->posting;
        $getSlug ="";
        $sort = menu::count();

        if($model=="kategori"){
            $getSlug = kategori::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }else if($model=="post"){
            $getSlug = post::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }else if($model=="pages"){
          $getSlug = page::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }else{
            $getSlug = galeri::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }
        $data = array(
            'menu_in'=>$request->menu_in,
            'menu_en'=>$request->menu_en,
            'model'=>$model,
            'slug_in'=>(!empty($getSlug->slug_in)?$getSlug->slug_in:''),
            'slug_en'=>(!empty($getSlug->slug_en)?$getSlug->slug_en:''),
            'id_element'=>$posting,
            'parent_id'=>($request->posisi==0||$request->posisi==''?0:($request->submenu?$request->submenu:$request->posisi)),
            'depth'=>($request->posisi==0||$request->posisi==''?0:($request->submenu?2:1)),
            'url'=>$request->url,
            'sort'=>$sort+1
        );

        $ins = menu::create($data);

        if($ins){
            session()->flash('success', 'Berhasil Menyimpan Post');
            return redirect('menu');
        }else{
            session()->flash('error', 'Gagal Menyimpan Post');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        //
        return view('menu.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu $menu)
    {
        //
        $model = $request->model;
        $posting = $request->posting;
        $getSlug ="";
        $sort = menu::count();

        if($model=="kategori"){
            $getSlug = kategori::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }else if($model=="post"){
            $getSlug = post::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }else if($model=="pages"){
          $getSlug = page::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }else{
            $getSlug = galeri::where('id','=',$posting)->select('slug_in','slug_en')->first();
        }
        
        $menu->menu_in = $request->menu_in;
        $menu->menu_en = $request->menu_en;
        $menu->model = $model;
        $menu->slug_in = (!empty($getSlug->slug_in)?$getSlug->slug_in:'');
        $menu->slug_en = (!empty($getSlug->slug_en)?$getSlug->slug_en:'');
        $menu->id_element = $posting;
        $menu->parent_id = ($request->posisi==0||$request->posisi==''?0:($request->submenu?$request->submenu:$request->posisi));
        $menu->depth = ($request->posisi==0||$request->posisi==''?0:($request->submenu?2:1));
        $menu->url = $request->url;
        $menu->sort = $sort+1;
        

        $ins = $menu->save();

        if($ins){
            session()->flash('success', 'Berhasil Menyimpan Post');
            return redirect('menu');
        }else{
            session()->flash('error', 'Gagal Menyimpan Post');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        //
    }

    public function gen_menu() {
        $arrs = menu::orderBy('sort','ASC')->get();
        echo $this->build_menu1($arrs);
    }

    public function build_menu1($arrs,$parent=0, $level=0, $first=1){
        
        $init = '
            <ol class="'.($first==1?'sortable ui-sortable':'').'">';
        foreach ($arrs as $key=>$arr) {
            if ($arr->parent_id == $parent) {
                $init .= '
                <li id="list_'.$arr->id.'">
                <div>
                    <span class="disclose"><span></span></span>'.$arr->menu_in.'<span style="float: right;margin-top:-2px"></span> 
                    <div class="btn-group pull-right" style="padding:0;border:none;margin-top:-1px">
                        <a class="btn btn-xs btn-flat btn-info" title="Edit Data" href="'.url("menu/".$arr->id).'" >
                            <span class="fa fa-info-circle"></span></a> 
                        <a class="btn btn-warning btn-flat btn-xs" title="Edit Data" href="'.url("menu/".$arr->id."/edit").'"><span class="fa fa-edit"></span></a>
                        <button class="btn btn-danger btn-flat btn-xs" title="Delete Data" href="javascript:;" onclick="delMenu('.$arr->id.')" ><span class="fa fa-trash"></span></button>
                    </div>
                </div>';
                $init .= $this->build_menu1($arrs, $arr->id, $level+1, 0);
                $init .= '</li>';
            }
        }
        $init .= '
            </ol>';
        return $init;
    }

    public function update_sort(Request $request){
        $arrs = $request->list;
        /*echo "<pre>";
        print_r($arrs);
        echo "<pre>";
        exit();*/
        $no = 1;
        foreach ($arrs as $key => $value) {
            if($value!='null'){
                $parent_id = $value;
            }else{
                $parent_id = 0;
            }
            $sort = $no;
            $id = $key;

            $no++;
            //echo $id.'-'.$no.'-'.$parent_id."<br>";
            /*check parent*/
            $menusx = menu::where('menus.id',$parent_id)
                    ->leftJoin(DB::raw('(SELECT * FROM menus) AS b'),'menus.parent_id','=','b.id')
                    ->leftJoin(DB::raw('(SELECT * FROM menus) AS c'),'menus.parent_id','=','c.id')
                    ->select(['menus.parent_id AS parent_1','menus.depth AS depth_1','b.parent_id AS parent_2','b.depth AS depth_2','c.parent_id AS parent_3','c.depth AS depth_3'])->first();

           
            /*----parent----*/


            if(!empty($menusx)){
                $parent = "";
                if($menusx->parent_3!=0){
                    $pesan = "Maksimal Tingkat 3";
                    $result = "";
                }else{
                    $result = menu::where('id','=',$id)
                    ->update(['parent_id'=>$parent_id,'sort'=>$sort]);  
                }
            }else{
                $result = menu::where('id','=',$id)
                ->update(['parent_id'=>$parent_id,'sort'=>$sort]);  
            }
            /*----end parent----*/

            /*echo "<pre>";
            print_r($menusx);
            echo "<pre>";
            exit();*/
            /*end check parent*/
        }

        if ($result) {
            $arr = array(
                'submit'    => '1',
                
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => 'error!!!',
                'pesan'     => $pesan
            );
        }

        echo json_encode($arr);

    }

    public function getSubhead(Request $request){
        $id = $request->id;
        if(!empty($id)){
            $subHeaders = menu::where('parent_id','=',$id)->select('menu_in','id')->get();
            $select = "";
            $select .= "<option value=''>Pilih...</option>";
            foreach ($subHeaders as $key => $value) {
                $select .="<option value=".$value->id.">".$value->menu_in."</option>";
            }
        }else{
            $select = "";
        }
        echo $select;
    }

    public function getModel(Request $request){
        $id = $request->id;
        $select = "";
        if(!empty($id)){
            if($id=="kategori"){
                $subHeaders = kategori::select('kategori_in','id')->get();
                $select = "";
                $select .= "<option value=''>Pilih...</option>";
                foreach ($subHeaders as $key => $value) {
                    $select .="<option value=".$value->id.">".$value->kategori_in."</option>";
                }            
            }else if($id=="post"){
                $subHeaders = post::select('judul_in','id')->get();
                $select = "";
                $select .= "<option value=''>Pilih...</option>";
                foreach ($subHeaders as $key => $value) {
                    $select .="<option value=".$value->id.">".$value->judul_in."</option>";
                }
            }else if($id=="pages"){
                $subHeaders = page::select('judul_in','id')->get();
                $select = "";
                $select .= "<option value=''>Pilih...</option>";
                foreach ($subHeaders as $key => $value) {
                    $select .="<option value=".$value->id.">".$value->judul_in."</option>";
                }
            }else{
                $subHeaders = galeri::select('judul_in','id')->get();
                $select = "";
                $select .= "<option value=''>Pilih...</option>";
                foreach ($subHeaders as $key => $value) {
                    $select .="<option value=".$value->id.">".$value->judul_in."</option>";
                }
            }
        }else{
            $select = "";
        }
        echo $select;
    }
}
