<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('lang/{id}','PublicController@lang');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
Route::get('get_layanan', 'PublicController@get_layanan');
Route::get('/', 'PublicController@index');

Route::post('/send_mail','PublicController@send_mail');
Route::get('/pengaduan-masyarakat','PublicController@pengaduan_masyarakat');
Route::get('/whistle-blowing-system','PublicController@whistle_blowing_system');
Route::get('/galeris/{id}','GaleriController@front');
Route::get('/galeri-all','GaleriController@galeri_all');
Route::get('/faq','KategoriController@faq');
Route::get('/pages/{id}','PageController@front');
Route::get('/kat/{id}','KategoriController@front');
Route::get('/posts/{id}','PostController@front');
Route::get('/kat_pages/{id}','KategoriPageController@front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/sendFile', 'HomeController@sendFile');


#--------------- K A T E G O R I -----------------#
	

Route::get('/kategori/listing','KategoriController@listing');
Route::resource('/kategori','KategoriController');

#--------------- END K A T E G O R I -----------------#

#--------------- P A G E -----------------#
	
Route::post('/page/aktif_post','PageController@aktif_post');
Route::get('/page/listing','PageController@listing');
Route::resource('/page','PageController');

#--------------- END P A G E -----------------#


#--------------- P O S T -----------------#
	

Route::post('/post/aktif_post','PostController@aktif_post');
Route::get('/post/listing','PostController@listing');
Route::resource('/post','PostController');

#--------------- END P O S T -----------------#

#--------------- G A L E R I -----------------#
	
Route::post('/galeri/aktif_post','GaleriController@aktif_post');
Route::get('/galeri/listing','GaleriController@listing');
Route::resource('/galeri','GaleriController');

#--------------- END G A L E R I-----------------#

#--------------- S L I D E S H O W -----------------#
	
Route::post('/slide_show/aktif_post','SlideShowController@aktif_post');
Route::get('/slide_show/listing','SlideShowController@listing');
Route::resource('/slide_show','SlideShowController');

#--------------- END S L I D E S H O W-----------------#


#--------------- K A T E G O R I  P A G E  -----------------#
	

Route::get('/kategori_page/update_sort','KategoriPageController@update_sort');
Route::get('/kategori_page/gen_kategori','KategoriPageController@gen_kategori');
Route::resource('/kategori_page','KategoriPageController');

#--------------- END K A T E G O R I  P A G E -----------------#


#--------------- P O S T F I L E  -----------------#
	
Route::resource('/post_file','PostFileController');

#--------------- END P O S T F I L E -----------------#

#--------------- P A G E F I L E  -----------------#
	
Route::resource('/page_file','PageFileController');

#--------------- END P A G E F I L E -----------------#

#--------------- D E T A I L G A L E R I  -----------------#
	
Route::resource('/detail_galeri','DetailGaleriController');

#--------------- END D E T A I L G A L E R I -----------------#



#--------------- M E N U -----------------#
	

Route::get('/menu/getIcon','MenuController@getIcon');
Route::get('/menu/update_sort','MenuController@update_sort');
Route::get('/menu/gen_menu','MenuController@gen_menu');
Route::get('menu/getSubhead', 'MenuController@getSubhead');
Route::get('menu/getModel', 'MenuController@getModel');
Route::resource('/menu','MenuController');

#--------------- END M E N U-----------------#




/*master liburan*/
Route::get('/master_liburan/listing','MasterLiburanController@listing');
Route::resource('/master_liburan','MasterLiburanController');
/*end master liburan*/

/*master jenis liburan*/
Route::get('/master_jenis_libur/listing','MasterJenisLiburController@listing');
Route::resource('/master_jenis_libur','MasterJenisLiburController');
/*end master jenis liburan*/






/*rbac user*/
Route::get('/rbac_user/listing','RbacUserController@listing');
Route::resource('/rbac_user','RbacUserController');
/*end rbac user*/

/*rbac role*/
Route::post('/change_role','HomeController@change_role');
Route::post('/rbac_role/aktif_role','RbacRoleController@aktif_role');
Route::get('/rbac_role/listing','RbacRoleController@listing');
Route::resource('/rbac_role','RbacRoleController');
/*end rbac role*/

/*rbac permissions*/
Route::get('rbac_permissions/update_sort', 'RbacPermissionsController@update_sort');
Route::get('/gen_menu_admin', 'RbacPermissionsController@gen_menu_admin');
Route::get('/getIcon', 'RbacPermissionsController@getIcon');
Route::get('/get_parent', 'RbacPermissionsController@get_parent');
Route::get('/get_sub_parent', 'RbacPermissionsController@get_sub_parent');
Route::resource('/rbac_permissions','RbacPermissionsController');
/*end rbac permissions*/
