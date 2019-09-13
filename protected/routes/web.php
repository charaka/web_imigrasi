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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


#--------------- K A T E G O R I -----------------#
	

Route::get('/kategori/listing','KategoriController@listing');
Route::resource('/kategori','KategoriController');

#--------------- END K A T E G O R I -----------------#

#--------------- P A G E -----------------#
	

Route::get('/page/listing','PageController@listing');
Route::resource('/page','PageController');

#--------------- END P A G E -----------------#


#--------------- P A G E -----------------#
	

Route::get('/post/listing','PostController@listing');
Route::resource('/post','PostController');

#--------------- END P A G E -----------------#




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
Route::resource('/rbac_role','RbacRoleController')->middleware(['checkpermissions']);
/*end rbac role*/

/*rbac permissions*/
Route::get('rbac_permissions/update_sort', 'RbacPermissionsController@update_sort');
Route::get('/gen_menu_admin', 'RbacPermissionsController@gen_menu_admin');
Route::get('/getIcon', 'RbacPermissionsController@getIcon');
Route::get('/get_parent', 'RbacPermissionsController@get_parent');
Route::get('/get_sub_parent', 'RbacPermissionsController@get_sub_parent');
Route::resource('/rbac_permissions','RbacPermissionsController')->middleware(['checkpermissions']);
/*end rbac permissions*/
