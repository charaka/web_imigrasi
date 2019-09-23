<?php

namespace App\Http\Controllers;

use App\kategori_page;
use Illuminate\Http\Request;

use DB;

class KategoriPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kategori_page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = kategori_page::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parent'] = $parent;
        $data['kategori_page'] = new kategori_page;
        $data['method'] = 'POST';
        $data['route'] = ['kategori_page.store'];

        return view('kategori_page.form')->with($data);
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
        $kategori_page = new kategori_page;
        $kategori_page->kategori_in = $request->kategori_in;
        $kategori_page->kategori_en = $request->kategori_en;
        $kategori_page->parent = $request->parent;
        $kategori_page->slug_in = str_slug($request->kategori_in);
        $kategori_page->slug_en = str_slug($request->kategori_en);
        $kategori_page->sort = kategori_page::count()+1;

        $icon = $request->file('icon');
        $path = 'protected/storage/uploads/icon_kat_pages';
        if(!empty($icon)){

            $name = uniqid('icon_').'.'.$icon->getClientOriginalExtension();
            if($icon->move($path, $name)){
                $up_cov = kategori_page::find($kategori_page->id);
                $up_cov->icon = $path.'/'.$name;
                $up_cov->save();
            }

            
        }

        if($kategori_page->save()){
            return redirect('kategori_page');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori_page  $kategori_page
     * @return \Illuminate\Http\Response
     */
    public function show(kategori_page $kategori_page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori_page  $kategori_page
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori_page $kategori_page)
    {
        //
        $parents = kategori_page::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parent'] = $parent;
        $data['kategori_page'] = $kategori_page;
        $data['method'] = 'PUT';
        $data['route'] = ['kategori_page.update',$kategori_page->id];

        return view('kategori_page.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori_page  $kategori_page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori_page $kategori_page)
    {
        //$kategori_page = new kategori_page;
        $kategori_page->kategori_in = $request->kategori_in;
        $kategori_page->kategori_en = $request->kategori_en;
        $kategori_page->parent = $request->parent;
        $kategori_page->slug_in = str_slug($request->kategori_in);
        $kategori_page->slug_en = str_slug($request->kategori_en);
        $kategori_page->sort = kategori_page::count()+1;

        $icon = $request->file('icon');
        $path = 'protected/storage/uploads/icon_kat_pages';
        if(!empty($icon)){

            $name = uniqid('icon_').'.'.$icon->getClientOriginalExtension();
            if($icon->move($path, $name)){
                $up_cov = kategori_page::find($kategori_page->id);
                $up_cov->icon = $path.'/'.$name;
                $up_cov->save();
            }

            
        }


        if($kategori_page->save()){
            return redirect('kategori_page');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori_page  $kategori_page
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori_page $kategori_page)
    {
        //
    }

    public function gen_kategori() {
        $arrs = kategori_page::orderBy('sort','ASC')->get();
        echo $this->build_menu1($arrs);
    }

    public function build_menu1($arrs,$parent=0, $level=0, $first=1){
        
        $init = '
            <ol class="'.($first==1?'sortable ui-sortable':'').'">';
        foreach ($arrs as $key=>$arr) {
            if ($arr->parent == $parent) {
                $init .= '
                <li id="list_'.$arr->id.'">
                <div>
                    <span class="disclose"><span></span></span>'.$arr->kategori_in.'<span style="float: right;margin-top:-2px"></span> 
                    <div class="btn-group pull-right" style="padding:0;border:none;margin-top:-1px">
                        <a class="btn btn-warning btn-flat btn-xs" title="Edit Data" href="javascript:;" onclick="show_form('.$arr->id.')"><span class="fa fa-edit"></span></a>
                        <button class="btn btn-danger btn-flat btn-xs" title="Delete Data" href="javascript:;" onclick="del_kat_page('.$arr->id.')" ><span class="fa fa-trash"></span></button>
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
            $menusx = kategori_page::where('kategori_pages.id',$parent_id)
                    ->leftJoin(DB::raw('(SELECT * FROM kategori_pages) AS b'),'kategori_pages.parent','=','b.id')
                    ->leftJoin(DB::raw('(SELECT * FROM kategori_pages) AS c'),'kategori_pages.parent','=','c.id')
                    ->select(['kategori_pages.parent AS parent_1','b.parent AS parent_2','c.parent AS parent_3'])->first();

           
            /*----parent----*/


            if(!empty($menusx)){
                $parent = "";
                if($menusx->parent_3!=0){
                    $pesan = "Maksimal Tingkat 3";
                    $result = "";
                }else{
                    $result = kategori_page::where('id','=',$id)
                    ->update(['parent'=>$parent_id,'sort'=>$sort]);  
                }
            }else{
                $result = kategori_page::where('id','=',$id)
                ->update(['parent'=>$parent_id,'sort'=>$sort]);  
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
}
