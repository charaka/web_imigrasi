<?php

namespace App\Http\Controllers;

use App\menu;
use App\post;
use App\kategori_page;
use App\SlideShow;

use Session;
use Illuminate\Http\Request;
use Date;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // SESSION
        session(['menu' => $this->admin_gen_menu()]);


        //lang en, in
        if(Session::get('lang')==""){
            session(['lang' => 'in']); 
        }else{

        }

        $data['kategori_page'] = kategori_page::where('parent',0)->get();

        $data['beritas'] = post::where('id_kategori',1)->limit(4)->orderBy('id','DESC')->get();
        $data['pengumumans'] = post::where('id_kategori',7)->orderBy('id','DESC')->get();
        $data['slide_show'] = SlideShow::all();
        return view('front.home.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lang($id){
        // dd($id);
        // exit();
        $lang = "";
        if($id==1){
            $lang = "in";
            session(['lang'=>$lang]);
        }else{
            $lang = "en";
            $lang = session(['lang'=>$lang]);
        }
        return redirect()->intended(session('currentURL'));
    }

    public static function hari($date){
        echo $date;
    }

    public function get_layanan(Request $request){
        $get = kategori_page::where('parent',$request->id)->get();

        $htm = "";
        $kategori_lang = 'kategori_'.Session::get('lang');
        $slug_lang = 'slug_'.Session::get('lang');

        foreach ($get as $key => $value) {
            $htm .= '<div class="col-xs-6 col-sm-4 col-lg-3">
                        <a class="block block-link-hover2 text-center" href="'.url("kat_pages/".$value->$slug_lang).'">
                            <div class="block-content block-content-full bg-primary">
                                <div class="h4 font-w700"> '.$value->$kategori_lang.'</div>
                                <div class="font-w600 text-white-op push-15-t">Apply</div>
                            </div>
                        </a>
                    </div>';
        }

        echo $htm;
    }


    public function admin_gen_menu() {
        $arrs = menu::orderBy('sort','ASC')->get();
        // print_r($arrs['Menu']) ;
         return $this->build_menu1($arrs);
    }

    public function build_menu1($arrs,$parent=0, $level=0, $first=1){
        $myPage = $_SERVER['PHP_SELF'];
        
        $init = '<ul class="'.($parent==0&&$level==0?"nav-main":($parent!=0&&$level==1?"":"")).'">';
        foreach ($arrs as $key=>$arr) {
            if ($arr->parent_id == $parent) {
                $init .= '
                <li id="list_'.$arr->id.'">
                <a href="'.url((!empty($arr->model)?'/'.$arr->model.'/':(empty($arr->model)&&!empty($arr->url)?$arr->url:'')).(Session('lang')=="in"?$arr->slug_in:$arr->slug_en)).'"><i class="si '.$arr->icon.'"></i> <span class="sidebar-mini-hide">'.(Session('lang')=='in'?$arr->menu_in:$arr->menu_en).'</span></a>';
                $init .= $this->build_menu1($arrs, $arr->id, $level+1, 0);
                $init .= '</li>';
            }
        }
        $init .= '
            </ul>';
        return $init;
    }

    public function pengaduan_masyarakat(Request $request){
        return view('front.pengaduan_masyarakat.index');
    } 

    public function whistle_blowing_system(Request $request){
        return view('front.whistle_blowing_system.index');
    }
}
