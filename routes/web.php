<?php

/*ROUTE CSM BACK-END*/
Route::prefix('admin')->group(function () {
	Route::resource('doitac', '\App\Http\Controllers\Admin\DoitacController');
	Route::resource('tinh', '\App\Http\Controllers\Admin\TinhController');
	Route::post('/tinh/import', '\App\Http\Controllers\Admin\TinhController@import')->name('tinh-import');
    Route::get('/search-tinh/autocomplete','\App\Http\Controllers\Admin\TinhController@autocomplete')->name('tinh-autocomplete');
    Route::get('/get-code-tinh/autocomplete','\App\Http\Controllers\Admin\TinhController@getCodeTinh')->name('get-code-tinh-autocomplete');
    Route::get('/search-huyen/autocomplete','\App\Http\Controllers\Admin\HuyenController@autocomplete')->name('huyen-autocomplete');
    Route::get('/get-code-huyen/autocomplete','\App\Http\Controllers\Admin\HuyenController@getCodeHuyen')->name('get-code-huyen-autocomplete');
    Route::get('/search-truong/autocomplete','\App\Http\Controllers\Admin\TruongController@autocomplete')->name('truong-autocomplete');
    Route::get('/get-code-truong/autocomplete','\App\Http\Controllers\Admin\TruongController@getCodeTruong')->name('get-code-truong-autocomplete');
    Route::get('/get-dia-chi/autocomplete','\App\Http\Controllers\Admin\TinhController@getDiaChi')->name('get-dia-chi-autocomplete');
	Route::resource('huyen', '\App\Http\Controllers\Admin\HuyenController');
	Route::post('/huyen/import', '\App\Http\Controllers\Admin\HuyenController@import')->name('huyen-import');
	Route::resource('truong', '\App\Http\Controllers\Admin\TruongController');
	Route::post('/truong/import', '\App\Http\Controllers\Admin\TruongController@import')->name('truong-import');
	Route::resource('tohopxt', '\App\Http\Controllers\Admin\TohopxtController');
	Route::resource('nganhxt', '\App\Http\Controllers\Admin\NganhxtController');
	Route::resource('lienthong', '\App\Http\Controllers\Admin\LienthongController');
	Route::resource('capnhat', '\App\Http\Controllers\Admin\CapnhatController');


	//Route test view
	Route::get('/bang-tin', function () {
    	return view('admin.bang-tin');
	})->name('bang-tin');
	Route::get('/', function () {
    	return view('admin.bang-tin');
	})->name('home-backend');
});
/*END ROUTE CSM BACK-END*/

/*ROUTE CRM BACK-END*/
Route::prefix('crm')->group(function () {
	Route::get('/', function () {
    	return view('admin.crm.list');
	})->name('crm-list');
	Route::get('/chinh-quy', function () {
    	return view('admin.crm.chinh-quy');
	})->name('crm-chinh-quy');
	Route::get('/lien-thong', function () {
    	return view('admin.crm.lien-thong');
	})->name('crm-lien-thong');
	Route::get('/cap-nhat-duoc', function () {
    	return view('admin.crm.cap-nhat-duoc');
	})->name('crm-cap-nhat-duoc');
	Route::get('/danh-sach', function () {
    	return view('admin.crm.list');
	})->name('crm-danh-sach');
});
/*END ROUTE CRM BACK-END*/

/* BASE ROUTE*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
