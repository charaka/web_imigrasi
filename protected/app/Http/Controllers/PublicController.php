<?php

namespace App\Http\Controllers;

use App\post;

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
}
