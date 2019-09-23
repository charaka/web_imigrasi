<?php

namespace App\Http\Controllers;

use App\post;
use App\kategori_page;

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
        //lang en, in
        if(Session::get('lang')==""){
            session(['lang' => 'en']); 
        }else{

        }

        $data['kategori_page'] = kategori_page::where('parent',0)->get();

        $data['beritas'] = post::where('id_kategori',1)->limit(4)->orderBy('id','DESC')->get();
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
}
