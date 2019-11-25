<?php

namespace App\Http\Controllers;

use App\menu;
use App\page;
use App\post;
use App\galeri;
use App\kategori_page;
use App\SlideShow;

use Session;
use Mail;
use Illuminate\Http\Request;
use Date;
use Browser;
use DB;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // insert browser
        DB::table('pengunjungs')->insert([
            'user_agent' => Browser::userAgent(),
            'is_desktop' => Browser::isDesktop(),
            'browser_name' => Browser::browserName(),
            'platform' => Browser::platformName(),
            'tgl_kunjungan' => date('Y-m-d H:i:s'),
            'ip' => $request->ip()
        ]);
        // end insert browser

        // SESSION
        session(['menu' => $this->admin_gen_menu()]);

        //lang en, in
        if(Session::get('lang')==""){
            session(['lang' => 'in']); 
        }else{

        }

        $data['kategori_page'] = kategori_page::where('parent',0)->get();

        $data['beritas'] = post::where('id_kategori',1)->limit(4)->orderBy('id','DESC')->where('status',1)->get();
        $data['pengumumans'] = post::where('id_kategori',7)->orderBy('id','DESC')->where('status',1)->get();
        $data['slide_show'] = SlideShow::where('status_id',1)->get();
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
        $kat_parent = kategori_page::where('id',$request->id)->first();
        $get = kategori_page::where('parent',$request->id)->get();

        $htm = "";
        $kategori_lang = 'kategori_'.Session::get('lang');
        $slug_lang = 'slug_'.Session::get('lang');
        $kategori_lang = 'kategori_'.Session::get('lang');

        $htm .= '
          <div class="block-header bg-primary-dark">
                <ul class="block-options">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                    </li>
                </ul>
                <h3 class="block-title" style="color:#fff">'.$kat_parent->$kategori_lang.'</h3>
            </div>
            <div class="block-content">
              <div class="row">
        ';
        foreach ($get as $key => $value) {
            $htm .= '
                <div class="col-xs-6 col-sm-4 col-lg-3">
                    <a class="block block-link-hover2 text-center" href="'.url("kat_pages/".$value->$slug_lang).'">
                        <div class="block-content block-content-full bg-primary">
                            <div class="h4 font-w700"> '.$value->$kategori_lang.'</div>
                            <div class="font-w600 text-white-op push-15-t">Apply</div>
                        </div>
                    </a>
                </div>';
        }
        $htm .='    </div>
            </div>';

        echo $htm;
    }


    public function admin_gen_menu() {
        $arrs = menu::orderBy('sort','ASC')->where('parent_id',0)->get();
        return $this->build_menu1($arrs);
    }

    public function build_menu1($arrs){  
        $menu = '';
        $menu .= '<ul class="nav-main">';
        foreach ($arrs as $key => $arr) {
            $child = menu::where('parent_id',$arr->id)->get();

            $href = "";

            if(!empty($arr->model)){
                $href = url("/".$arr->model."/".(Session('lang')=="in"?$arr->slug_in:$arr->slug_en));
            }elseif(empty($arr->model)&&!empty($arr->url)){
                $href = url($arr->url);
            }elseif(empty($arr->model)&&empty($arr->url)){
                $href = "#";
            }else{
                $href = "#";
            }

            $menu .= '<li>';
            $menu .= '<li>';
            $menu .= '<a '.(count($child)>0?"class='nav-submenu' data-toggle='nav-submenu'":"").' href="'.(count($child)>0?'#':$href).'">'.($arr->icon?'<i class="si '.$arr->icon.'"></i><span class="sidebar-mini-hide">':"").''.(Session('lang')=='in'?$arr->menu_in:$arr->menu_en).''.($arr->icon?'</span>':"").'</a>';
            $menu .= (count($child)>0?$this->build_menu1($child):'');
            $menu .= '</li>';
        }
        $menu .= '</ul>';

        return $menu;
    }

    public function pengaduan_masyarakat(Request $request){
        return view('front.pengaduan_masyarakat.index');
    } 

    public function whistle_blowing_system(Request $request){
        return view('front.whistle_blowing_system.index');
    }

    public function send_mail(Request $request){
        $data_email = array(
          'firstname' => $request->firstname?$request->firstname:'',
          'lastname' => $request->lastname?$request->lastname:'',
          'email' => $request->email,
          'subject' => $request->subject,
          'msg' => $request->msg,
          'perihal' => $request->perihal,
          'mailto' => $request->mailto
        );
        /*echo "<pre>";
        print_r($data_email);
        echo "</pre>";*/

        //pengiriman email matikan sementara jika di running lokal
        Mail::send('front.email', $data_email, function ($message) use ($request) {
            $message->from('dedekdedekdedek@gmail.com', 'Imigrasi Denpasar');
            $message->to($request->mailto)->subject($request->perihal."-".$request->subject);
        });
        /*end email*/
        if($request->perihal=="Whistle Blowing System"){
            Session::flash('message', 'Send Email Successfull');
            return redirect('/whistle-blowing-system');
        }else{
          Session::flash('message', 'Send Email Successfull');
            return redirect('/pengaduan-masyarakat');
        }
    }

    public function search(Request $request){
      // $post = post::select(['judul_in','judul_in']);
      // $page = page::select(['judul_in','judul_in']);
      $datas = DB::table(DB::raw("(SELECT
                        judul_in,
                        konten_in,
                        judul_en,
                        konten_en,
                        posts.slug_in,
                        posts.slug_en,
                        'post' AS jenis,
                        kategoris.kategori_in AS kategori_in,
                        kategoris.kategori_en AS kategori_en
                      FROM
                        posts
                        INNER JOIN kategoris
                          ON posts.id_kategori = kategoris.id
                      UNION
                      SELECT
                        judul_in,
                        konten_in,
                        judul_en,
                        konten_en,
                        pages.slug_in,
                        pages.slug_en,
                        'pages' AS jenis,
                        kategori_pages.kategori_in AS kategori_in,
                        kategori_pages.kategori_en AS kategori_en
                      FROM
                        pages
                        INNER JOIN kategori_pages
                          ON pages.id_kategori = kategori_pages.id) AS cari"))
              ->select(['judul_in','konten_in','slug_in','slug_en','konten_in','konten_en','jenis','kategori_in','kategori_en'])
              ->where('cari.judul_in','LIKE','%'.$request->q.'%')
              ->orWhere('cari.judul_en','LIKE','%'.$request->q.'%')
              ->paginate(6);

      // dd($datas);
      // exit();
      $data['berita_populer'] = post::orderBy('views','DESC')->limit(4)->get();
      $data['datas'] = $datas;
      return view('front.search.index')->with($data);
    }
}
