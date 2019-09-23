<?php

namespace App\Http\Controllers;

use App\post;
use App\post_file;
use App\kategori;
use Illuminate\Http\Request;

use DB;
use DataTables;
use Image;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = kategori::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parent'] = $parent;
        $data['post'] = new post;

        return view('post.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $post = new post;

        $post->judul_in = $request->judul_in;
        $post->judul_en = $request->judul_en;
        $post->slug_in = str_slug($request->judul_in);
        $post->slug_en = str_slug($request->judul_en);
        $post->konten_in = $request->konten_in;
        $post->konten_en = $request->konten_en;
        $post->id_kategori = $request->id_kategori;
        $post->tanggal_publish = $this->texttodate($request->tanggal_publish);

        $save = $post->save();

        //$deskripsi = $request->deskripsi_file;
        if($save){

            $path = 'protected/storage/uploads/post_files';
            // C O V E R
            //MENGAMBIL FILE IMAGE DARI FORM
            $file = $request->file('filename_foto');
            if(!empty($file)){

                $name = uniqid('img_').'.'.$file->getClientOriginalExtension();
                if($file->move($path, $name)){
                    $up_cov = post::find($post->id);
                    $up_cov->cover = $path.'/'.$name;
                    $up_cov->save();
                }

                
            }
            // E N D C O V E R

            $file_lampiran = $request->file('file_lampiran');
            if(!empty($file_lampiran)){
                foreach ($file_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/post_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $post_file = new post_file;
                        $post_file->id_post = $post->id;
                        $post_file->file = $filePath;
                        $post_file->jenis = 1;
                        $post_file->deskripsi = $request->deskripsi_file[$key];
                        $post_file->save();
                    }else{

                    }

                }
            }else{

            }

            $galeri_lampiran = $request->file('galeri_lampiran');
            if(!empty($galeri_lampiran)){
                foreach ($galeri_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/post_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $post_file = new post_file;
                        $post_file->id_post = $post->id;
                        $post_file->file = $filePath;
                        $post_file->jenis = 2;
                        $post_file->save();
                    }else{

                    }

                }
            }else{

            }

            $deskripsi_video = $request->deskripsi_video;
            if(!empty($deskripsi_video)){
                foreach ($deskripsi_video as $key => $value) {
                    if(!empty($value)||$value!=''){
                        $ex = explode('=',$value);
                        $post_file = new post_file;
                        $post_file->id_post = $post->id;
                        $post_file->file = $value!=NULL?$ex[1]:'';
                        $post_file->jenis = 3;
                        $post_file->save();
                    }
                }
            }else{

            }
        }

        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
        $data['post'] = $post;
        $data['file'] = post_file::where('id_post',$post->id)->where('jenis',1)->get();
        $data['galeri'] = post_file::where('id_post',$post->id)->where('jenis',2)->get();
        $data['video'] = post_file::where('id_post',$post->id)->where('jenis',3)->get();
        return view('post.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
        $parents = kategori::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parent'] = $parent;
        $data['id'] = $post->id;
        $data['post'] = $post;
        $data['file'] = post_file::where('id_post',$post->id)->where('jenis',1)->get();
        $data['galeri'] = post_file::where('id_post',$post->id)->where('jenis',2)->get();
        $data['videos'] = post_file::where('id_post',$post->id)->where('jenis',3)->get();
        return view('post.edit')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //

        $post->judul_in = $request->judul_in;
        $post->judul_en = $request->judul_en;
        $post->slug_in = str_slug($request->judul_in);
        $post->slug_en = str_slug($request->judul_en);
        $post->konten_in = $request->konten_in;
        $post->konten_en = $request->konten_en;
        $post->id_kategori = $request->id_kategori;
        $post->tanggal_publish = $this->texttodate($request->tanggal_publish);

        $save = $post->save();

        //$deskripsi = $request->deskripsi_file;
        if($save){

            $path = 'protected/storage/uploads/post_files';
            // C O V E R
            //MENGAMBIL FILE IMAGE DARI FORM
            $file = $request->file('filename_foto');
            if(!empty($file)){

                $name = uniqid('img_').'.'.$file->getClientOriginalExtension();
                if($file->move($path, $name)){
                    $up_cov = post::find($post->id);
                    $up_cov->cover = $path.'/'.$name;
                    $up_cov->save();
                }

                
            }
            


            // E N D C O V E R


            $file_lampiran = $request->file('file_lampiran');
            if(!empty($file_lampiran)){
                foreach ($file_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/post_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $post_file = new post_file;
                        $post_file->id_post = $post->id;
                        $post_file->file = $filePath;
                        $post_file->jenis = 1;
                        $post_file->deskripsi = $request->deskripsi_file[$key];
                        $post_file->save();
                    }else{

                    }

                }
            }else{

            }

            $galeri_lampiran = $request->file('galeri_lampiran');
            if(!empty($galeri_lampiran)){
                foreach ($galeri_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/post_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $post_file = new post_file;
                        $post_file->id_post = $post->id;
                        $post_file->file = $filePath;
                        $post_file->jenis = 2;
                        $post_file->save();
                    }else{

                    }

                }
            }else{

            }

            $deskripsi_video = $request->deskripsi_video;
            if(!empty($deskripsi_video)){
                foreach ($deskripsi_video as $key => $value) {
                    if(!empty($value)||$value!=''){
                        $ex = explode('=',$value);
                        $post_file = new post_file;
                        $post_file->id_post = $post->id;
                        $post_file->file = $value!=NULL?$ex[1]:'';
                        $post_file->jenis = 3;
                        $post_file->save();
                    }
                }
            }else{

            }
        }

        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
        $del = $post->delete();
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
        $data = post::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'posts.id', 'posts.judul_in', 'posts.judul_en','posts.konten_in','posts.konten_en','posts.id_kategori','a.kategori_in'])
                ->join('kategoris AS a','a.id','=','posts.id_kategori');

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('konten_in','{{ strip_tags($konten_in) }}')
        ->addcolumn('action','
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("post/$id") }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("post/$id/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->rawColumns(['konten_in','action'])
        ->make(true);
    }

    public function front($slug){
        $slug_lang = 'posts.slug_'.Session::get('lang');
        $get = post::where($slug_lang,'=',$slug)->first();
        
        $files = post_file::where('id_post',$get->id)->where('jenis', '=', 1)->get();
        $gambars = post_file::where('id_post',$get->id)->where('jenis', '=', 2)->get();
        $videos = post_file::where('id_post',$get->id)->where('jenis', '=', 3)->get();
        
        $data['data'] = $get;
        $data['files'] = $files;
        $data['gambars'] = $gambars;
        $data['videos'] = $videos;

        return view('front.post.index')->with($data);


    }
}
