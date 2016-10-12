<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Controller Routes

Route::resource('/partner', 'partnerController');
Route::get('/article/edit', 'ArticleController@showEditList');
Route::post('/article/postFigures', 'ArticleController@create');
Route::resource('/article', 'ArticleController');

Route::get('/xj_news.html', 'PageShowController@newsIndex');
Route::get('/xj_article.html', 'PageShowController@articleIndex');
Route::get('/xj_partners.html', 'PageShowController@showPartners');
Route::get('/xj_agent.html', 'PageShowController@agentIndex');

Route::auth();

Route::get('/admin', 'HomeController@index');


// Static Pages

// 这里要group到一个页面
Route::get('/', function () {
    return view('index');
});

Route::get('/xj_index.html', function () {
    return view('index');
});


Route::get('/baidu_map', function () {
    return view('baidu_map');
});



Route::get('/xjxx_interact_ver.html', function () {
    return view('xjxx_interact_ver');
});

Route::get('/xjxx_pc_win_ver.html', function () {
    return view('xjxx_pc_win_ver');
});

Route::get('/xjxx_mobile_ver.html', function () {
    return view('xjxx_mobile_ver');
});


Route::get('apitest', function (){
    return view('apitest.tryon');
});


Route::group(['middleware' => 'cors'], function() {

    Route::resource('api/v1/corstryon', 'ApiTryonController');

});

Route::resource('api/v1/facepp', 'FaceppController');
Route::get('api/v1/allglass', 'FaceppController@ajaxAllGlass');
Route::get('api/v1/result', 'FaceppController@ajaxgetResult');

